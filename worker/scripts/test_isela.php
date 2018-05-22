<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../class/Worker.php';
require_once '../class/system_config.php';
require_once '../class/Gmail.php';
require_once '../class/Payment.php';
require_once '../class/Client.php';
require_once '../class/Reference_profile.php';
require_once '../class/PaymentCielo3.0.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/follows/worker/externals/utils.php';

$GLOBALS['sistem_config'] = new follows\cls\system_config();

$Robot = new \follows\cls\Robot();
$Client = (new \follows\cls\Client())->get_client(19546);
var_dump($Robot->get_reference_user(json_decode($Client->cookies), 'daylipadron'));


echo "\n<br>" . date("Y-m-d h:i:sa") . "\n\n";