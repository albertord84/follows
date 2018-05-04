<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $debugRequest = false;

    private $baseUri = 'https://i.instagram.com';
    private $initialDataUrl = 'api/v1/accounts/read_msisdn_header/';
    private $contactPointUrl = 'api/v1/accounts/contact_point_prefill/';
    private $syncDeviceUrl = 'api/v1/qe/sync/';
    private $logAttributionUrl = 'api/v1/attribution/log_attribution/';
    private $timeLineFeedUrl = 'api/v1/feed/timeline/';
    private $loginUrl = 'api/v1/accounts/login/';

    public function index() {
        echo 'Ok';
    }

    public function api() {
        try {
            $credentials = $this->params($this->input);
            $instagram = $this->instagram();
            $instagram->login($credentials['username'],
                $credentials['password'], 14400);
            echo 'logged in';
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function three_steps() {
        try {
            $initialData = $this->initialLoginData();
            $uuid = $initialData['uuid'];
            $cookies = $initialData['cookies'];
            $initialData = $this->syncDevice($uuid, $cookies);
            $cookiesArray = $initialData['cookies']->toArray();
            $csrfToken = $this->getToken($cookiesArray);
            $initialData = $this->postLoginData($uuid, $csrfToken, $cookies);
            echo json_encode($initialData['cookies']->toArray());
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function like_app() {
        try {
            $retData = $this->initialLoginData();
            
            $uuid = $retData['uuid'];
            $cookies = $retData['cookies'];
            $cookiesArray = $retData['cookies']->toArray();
            $csrf_token = $this->getToken($cookiesArray);

            $retData = $this->contactPointPrefill($uuid, $csrf_token, $cookies);
            $retData = $this->syncDevice($uuid, $cookies);
            $retData = $this->logAttribution($cookies);
            $retData = $this->postLoginData($uuid, $csrf_token, $cookies);
            $retData = $this->getTimelineFeed($uuid, $csrf_token, $uuid, $cookies);

            echo json_encode([
                'body' => $retData['body'],
                'cookies'=> $retData['cookies']->toArray()
            ]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    private function getToken(array $cookies) {
        $_cookies = array_filter($cookies, function($cookie) {
            return $cookie['Name'] === 'csrftoken';
        });
        $cookie = current($_cookies);
        return $cookie['Value'];
    }

    private function params($input) {
        return [
            'username' => $input->post_get('username'),
            'password' => $input->post_get('password')
        ];
    }

    private function instagram() {
        \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
        return new \InstagramAPI\Instagram(true, false);
    }

    private function generateUUID() {
        $uuid = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
        return $uuid;
    }

    private function deviceId() {
        $megaRandomHash = md5(number_format(microtime(true), 7, '', ''));
        return 'android-'.substr($megaRandomHash, 16);
    }

    /**
     * @return mixed initialData
     */
    private function initialLoginData() {
        $jar = new \GuzzleHttp\Cookie\CookieJar;
        $uuid = $this->generateUUID();
        $data = [
            "_csrftoken" => null,
            "device_id" => $uuid,
        ];
        $client = new \GuzzleHttp\Client([
            'cookies' => $jar,
            'base_uri' => $this->baseUri
        ]);
        $signedData = $this->signedData($data);
        $response = $client->post($this->initialDataUrl, [
            'debug' => $this->debugRequest,
            'body' => $signedData,
            'headers' => [
                'User-Agent' => 'Instagram 27.0.0.7.97 Android (24/7.0; 640dpi; 1440x2560; HUAWEI; LON-L29; HWLON; hi3660; en_US)',
                'Connection' => 'Keep-Alive',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'X-FB-HTTP-Engine' => 'Liger',
                'Accept-Encoding' => 'gzip,deflate',
                'Accept-Language' => 'en-US',
                'X-IG-App-ID' => '567067343352427',
                'X-IG-Capabilities' => '3brTBw==',
                'X-IG-Connection-Type' => 'WIFI',
                'X-IG-Connection-Speed' => '2014kbps',
                'X-IG-Bandwidth-Speed-KBPS' => '-1.000',
                'X-IG-Bandwidth-TotalBytes-B' => '0',
                'X-IG-Bandwidth-TotalTime-MS' => '0',
            ]
        ]);
        $body = $response->getBody();
        return [
            'body' => $body, 'cookies' => $jar,
            'uuid' => $uuid,
        ];
    }

    private function contactPointPrefill($uuid, $csrf_token, $cookies) {
        $data = [
            'phone_id' => $uuid,
            '_csrftoken' => $csrf_token,
            'usage' => 'prefill',
        ];
        $client = new \GuzzleHttp\Client([
            'cookies' => $cookies,
            'base_uri' => $this->baseUri
        ]);
        $signedData = $this->signedData($data);
        $response = $client->post($this->contactPointUrl, [
            'debug' => $this->debugRequest,
            'body' => $signedData,
            'headers' => [
                'User-Agent' => 'Instagram 27.0.0.7.97 Android (24/7.0; 640dpi; 1440x2560; HUAWEI; LON-L29; HWLON; hi3660; en_US)',
                'Connection' => 'Keep-Alive',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'X-FB-HTTP-Engine' => 'Liger',
                'Accept-Encoding' => 'gzip,deflate',
                'Accept-Language' => 'en-US',
                'X-IG-App-ID' => '567067343352427',
                'X-IG-Capabilities' => '3brTBw==',
                'X-IG-Connection-Type' => 'WIFI',
                'X-IG-Connection-Speed' => '2014kbps',
                'X-IG-Bandwidth-Speed-KBPS' => '-1.000',
                'X-IG-Bandwidth-TotalBytes-B' => '0',
                'X-IG-Bandwidth-TotalTime-MS' => '0',
            ]
        ]);
        $body = $response->getBody();
        return [ 'body' => $body, 'cookies' => $cookies ];
    }

    /**
     * @return mixed initialData
     */
    private function syncDevice($uuid, $cookies) {
        $LOGIN_EXPERIMENTS = 'ig_android_updated_copy_user_lookup_failed,ig_android_hsite_prefill_new_carrier,ig_android_me_profile_prefill_in_reg,ig_android_allow_phone_reg_selectable,ig_android_gmail_oauth_in_reg,ig_android_run_account_nux_on_server_cue_device,ig_android_universal_instagram_deep_links_universe,ig_android_make_sure_next_button_is_visible_in_reg,ig_android_report_nux_completed_device,ig_android_sim_info_upload,ig_android_reg_omnibox,ig_android_background_phone_confirmation_v2,ig_android_background_voice_phone_confirmation,ig_android_password_toggle_on_login_universe_v2,ig_android_skip_signup_from_one_tap_if_no_fb_sso,ig_android_refresh_onetap_nonce,ig_android_multi_tap_login,ig_android_onetaplogin_login_upsell,ig_android_jp_sms_code_extraction_fix, ig_challenge_kill_switch,ig_android_modularized_nux_universe_device,ig_android_run_device_verification,ig_android_remove_sms_password_reset_deep_link,ig_android_phone_id_email_prefill_in_reg,ig_android_typeahead_bug_fixes_universe,ig_restore_focus_on_reg_textbox_universe,ig_android_abandoned_reg_flow,ig_android_phoneid_sync_interval,ig_android_2fac_auto_fill_sms_universe,ig_android_family_apps_user_values_provider_universe,ig_android_security_intent_switchoff,ig_android_enter_to_login,ig_android_show_password_in_reg_universe,ig_android_access_redesign,ig_android_remove_icons_in_reg_v2,ig_android_ui_cleanup_in_reg_v2,ig_android_login_bad_password_autologin_universe,ig_android_editable_username_in_reg';
        $data = [
            'id' => $uuid,
            'device_id' => $uuid,
            'experiments' => $LOGIN_EXPERIMENTS,
        ];
        $client = new \GuzzleHttp\Client([
            'cookies' => $cookies,
            'base_uri' => $this->baseUri
        ]);
        $signedData = $this->signedData($data);
        $response = $client->post('api/v1/qe/sync/', [
            'debug' => $this->debugRequest,
            'body' => $signedData,
            'headers' => [
                'User-Agent' => 'Instagram 27.0.0.7.97 Android (24/7.0; 640dpi; 1440x2560; HUAWEI; LON-L29; HWLON; hi3660; en_US)',
                'Connection' => 'Keep-Alive',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'X-FB-HTTP-Engine' => 'Liger',
                'Accept-Encoding' => 'gzip,deflate',
                'Accept-Language' => 'en-US',
                'X-IG-App-ID' => '567067343352427',
                'X-IG-Capabilities' => '3brTBw==',
                'X-IG-Connection-Type' => 'WIFI',
                'X-IG-Connection-Speed' => '2014kbps',
                'X-IG-Bandwidth-Speed-KBPS' => '-1.000',
                'X-IG-Bandwidth-TotalBytes-B' => '0',
                'X-IG-Bandwidth-TotalTime-MS' => '0',
            ]
        ]);
        $body = $response->getBody();
        return [ 'body' => $body, 'cookies' => $cookies ];
    }

    private function logAttribution($cookies) {
        $data = [
            'adid' => $this->generateUUID(),
        ];
        $client = new \GuzzleHttp\Client([
            'cookies' => $cookies,
            'base_uri' => $this->baseUri
        ]);
        $signedData = $this->signedData($data);
        $response = $client->post($this->logAttributionUrl, [
            'debug' => $this->debugRequest,
            'body' => $signedData,
            'headers' => [
                'User-Agent' => 'Instagram 27.0.0.7.97 Android (24/7.0; 640dpi; 1440x2560; HUAWEI; LON-L29; HWLON; hi3660; en_US)',
                'Connection' => 'Keep-Alive',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'X-FB-HTTP-Engine' => 'Liger',
                'Accept-Encoding' => 'gzip,deflate',
                'Accept-Language' => 'en-US',
                'X-IG-App-ID' => '567067343352427',
                'X-IG-Capabilities' => '3brTBw==',
                'X-IG-Connection-Type' => 'WIFI',
                'X-IG-Connection-Speed' => '2014kbps',
                'X-IG-Bandwidth-Speed-KBPS' => '-1.000',
                'X-IG-Bandwidth-TotalBytes-B' => '0',
                'X-IG-Bandwidth-TotalTime-MS' => '0',
            ]
        ]);
        $body = $response->getBody();
        return [ 'body' => $body, 'cookies' => $cookies ];
    }

    /**
     * @return mixed successOrFailureLoginData
     */
    private function postLoginData($uuid, $csrf_token, $cookies) {
        $credentials = $this->params($this->input);
        $data = [
            'phone_id' => $uuid,
            '_csrftoken' => $csrf_token,
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'device_id' => $this->deviceId(),
            'login_attempt_count' => '0',
            'adid' => $this->generateUUID(),
            'guid' => $this->generateUUID(),
        ];
        $client = new \GuzzleHttp\Client([
            'cookies' => $cookies,
            'base_uri' => $this->baseUri
        ]);
        $signedData = $this->signedData($data);
        $response = $client->post($this->loginUrl, [
            'debug' => $this->debugRequest,
            'body' => $signedData,
            'headers' => [
                'User-Agent' => 'Instagram 27.0.0.7.97 Android (24/7.0; 640dpi; 1440x2560; HUAWEI; LON-L29; HWLON; hi3660; en_US)',
                'Connection' => 'Keep-Alive',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'X-FB-HTTP-Engine' => 'Liger',
                'Accept-Encoding' => 'gzip,deflate',
                'Accept-Language' => 'en-US',
                'X-IG-App-ID' => '567067343352427',
                'X-IG-Capabilities' => '3brTBw==',
                'X-IG-Connection-Type' => 'WIFI',
                'X-IG-Connection-Speed' => '2014kbps',
                'X-IG-Bandwidth-Speed-KBPS' => '-1.000',
                'X-IG-Bandwidth-TotalBytes-B' => '0',
                'X-IG-Bandwidth-TotalTime-MS' => '0',
            ]
        ]);
        $body = $response->getBody();
        return [ 'body' => $body, 'cookies' => $cookies ];
    }

    private function getTimelineFeed($uuid, $csrf_token, $phone_id, $cookies) {
        $data = [
            '_csrftoken' => $csrf_token,
            '_uuid' => $uuid,
            'is_prefetch' => '0',
            'phone_id' => $phone_id,
            'battery_level' => (string) (int) mt_rand(70, 100),
            'is_charging' => '1',
            'will_sound_on' => '1',
            'is_on_screen' => 'true',
            'timezone_offset' => date('Z'),
            'is_async_ads' => '0',
            'is_async_ads_double_request' => '0',
            'is_async_ads_rti' => '0'
        ];
        $client = new \GuzzleHttp\Client([
            'cookies' => $cookies,
            'base_uri' => $this->baseUri
        ]);
        $signedData = $this->signedData($data);
        $response = $client->post($this->timeLineFeedUrl, [
            'debug' => $this->debugRequest,
            'body' => $signedData,
            'headers' => [
                'User-Agent' => 'Instagram 27.0.0.7.97 Android (24/7.0; 640dpi; 1440x2560; HUAWEI; LON-L29; HWLON; hi3660; en_US)',
                'Connection' => 'Keep-Alive',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'X-Ads-Opt-Out' => '0',
                'X-Google-AD-ID' => '0',
                'X-DEVICE-ID' => $uuid,
                'X-FB-HTTP-Engine' => 'Liger',
                'Accept-Encoding' => 'gzip,deflate',
                'Accept-Language' => 'en-US',
                'X-IG-App-ID' => '567067343352427',
                'X-IG-Capabilities' => '3brTBw==',
                'X-IG-Connection-Type' => 'WIFI',
                'X-IG-Connection-Speed' => '2014kbps',
                'X-IG-Bandwidth-Speed-KBPS' => '-1.000',
                'X-IG-Bandwidth-TotalBytes-B' => '0',
                'X-IG-Bandwidth-TotalTime-MS' => '0',
            ]
        ]);
        $body = $response->getBody()->getContents();
        return [ 'body' => $body, 'cookies' => $cookies ];
    }

    private function signedData($data) {
        $signed = \InstagramAPI\Signatures::signData($data);
        $result = sprintf("signed_body=%s&ig_sig_key_version=%s",
            $signed['signed_body'], $signed['ig_sig_key_version']);
        return $result;
    }
}