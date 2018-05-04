$(document).ready(function () {   
    var num_profiles, flag = false;
    var verify = false, flag_unfollow_request = false;
    unfollow_total = parseInt(unfollow_total);
    autolike = parseInt(autolike);
    play_pause = parseInt(play_pause);
    init_unfollow_type();
    init_autolike_type();
    init_play_pause_type();
    flag_black_list=false;
    flag_white_list=false;
    
        
    //typeahead INIT
    /*
    var users_source = new Bloodhound({
        initialize:false,
        sufficient:100,
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        //local: ['jose','juan','juaniquito','juancito','joaquin','j','jj','jjj','jjjjjjj']
        local: function(){
            data=$.get(
                    base_url+'index.php/welcome/get_names_by_chars',
                    {  
                        str: 'josergm',
                        profile_type: 'users'
                    }, 
                    function (data) {
                        data = $.parseJSON(data);
                        users_source.inicializate();
                        console.log(data);
                        return data;
                    }
                );
            //data=["jose","juan","juaniquito","juancito","joaquin","j","jj","jjj","jjjjjjj"];
            //console.log(data);
            return data;            
        }
    });
    
    $('#login_profile').typeahead(
        {
            hint: true,
            highlight: true, 
            minLength: 1
        },
        {
            name: 'users_datas',
            source: users_source
        }
    );
    
    
    */
    
     
   /* $.get(
        base_url+'index.php/welcome/get_names_by_chars',
        {  
            str: 'josergm',
            profile_type: 'users'
        }, 
        function (data) {
            data = $.parseJSON(data);
            console.log(data);
            return (data);
        }
    );  */
    
    
    
    /*$("#login_profile").on('keyup', function(){
        var text = $(this).val();
        if(text.length){            
            $.ajax({
                url: base_url + 'index.php/welcome/get_names_by_chars',
                data: {
                    'str':'text',
                    'profile_type':'users'
                },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    set_global_var('users_datas',response);                     
                },
                error: function (xhr, status) {
                    
                }
            });
        }
    }).keyup();      */  
    //typeahead END
    
    //----------------------------------------------------------------------------------------------------------    
        
    function modal_alert_message(text_message){
        $('#modal_alert_message').modal('show');
        $('#message_text').text(text_message);        
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    //$('#modal_ENCUESTA').modal('show');
    
    /*var confirmation=false;
    function modal_confirm_message(text_message){
        $('#modal_confirm_message').modal('show');
        $('#message_text_confirmation').text(text_message);
    }
    
    $("#accept_modal_confirm_message").click(function () {
        $('#modal_confirm_message').modal('hide');
        confirmation=true;
    });
    $("#cancel_modal_confirm_message").click(function () {
        $('#modal_confirm_message').modal('hide');
        confirmation=false;
    });*/
    
    //----------------------------------------------------------------------------------------------------------
    //PERFIS DE REFERENCIA
    var icons_profiles = {
        0: {'ptr_img_obj': $('#img_ref_prof0'), 'ptr_p_obj': $('#name_ref_prof0'), 'ptr_label_obj': $('#cnt_follows_prof0'), 'ptr_panel_obj': $('#reference_profile0'), 'img_profile': '', 'login_profile': '', 'status_profile': '', 'follows_from_profile': '', 'ptr_lnk_ref_prof': $('#lnk_ref_prof0')},
        1: {'ptr_img_obj': $('#img_ref_prof1'), 'ptr_p_obj': $('#name_ref_prof1'), 'ptr_label_obj': $('#cnt_follows_prof1'), 'ptr_panel_obj': $('#reference_profile1'), 'img_profile': '', 'login_profile': '', 'status_profile': '', 'follows_from_profile': '', 'ptr_lnk_ref_prof': $('#lnk_ref_prof1')},
        2: {'ptr_img_obj': $('#img_ref_prof2'), 'ptr_p_obj': $('#name_ref_prof2'), 'ptr_label_obj': $('#cnt_follows_prof2'), 'ptr_panel_obj': $('#reference_profile2'), 'img_profile': '', 'login_profile': '', 'status_profile': '', 'follows_from_profile': '', 'ptr_lnk_ref_prof': $('#lnk_ref_prof2')},
        3: {'ptr_img_obj': $('#img_ref_prof3'), 'ptr_p_obj': $('#name_ref_prof3'), 'ptr_label_obj': $('#cnt_follows_prof3'), 'ptr_panel_obj': $('#reference_profile3'), 'img_profile': '', 'login_profile': '', 'status_profile': '', 'follows_from_profile': '', 'ptr_lnk_ref_prof': $('#lnk_ref_prof3')},
        4: {'ptr_img_obj': $('#img_ref_prof4'), 'ptr_p_obj': $('#name_ref_prof4'), 'ptr_label_obj': $('#cnt_follows_prof4'), 'ptr_panel_obj': $('#reference_profile4'), 'img_profile': '', 'login_profile': '', 'status_profile': '', 'follows_from_profile': '', 'ptr_lnk_ref_prof': $('#lnk_ref_prof4')},
        5: {'ptr_img_obj': $('#img_ref_prof5'), 'ptr_p_obj': $('#name_ref_prof5'), 'ptr_label_obj': $('#cnt_follows_prof5'), 'ptr_panel_obj': $('#reference_profile5'), 'img_profile': '', 'login_profile': '', 'status_profile': '', 'follows_from_profile': '', 'ptr_lnk_ref_prof': $('#lnk_ref_prof5')},
    };
    
    
    $("#dicas_geoloc").click(function(){
        url=base_url+"index.php/welcome/dicas_geoloc";
        window.open(url,'_blank');
    });    
    
    $("#btn_add_new_profile").hover(
        function () {
            $('#btn_add_new_profile').css('cursor', 'pointer');
        },
        function () {
            $('#btn_add_new_profile').css('cursor', 'default');
    });
    
    $("#btn_add_new_hashtag").hover(
        function () {
            $('#btn_add_new_hashtag').css('cursor', 'pointer');
        },
        function () {
            $('#btn_add_new_hashtag').css('cursor', 'default');
    });
    
    $("#dicas_geoloc").hover(
        function(){
            $('#dicas_geoloc').css('cursor', 'pointer');
        },
        function(){
            $('#dicas_geoloc').css('cursor', 'default');
        }
    );    
    
    $("#btn_verify_account").click(function () {
        if (!verify) {
            $("#btn_verify_account").text('CONFIRMO ATIVAÇÃO');
            $("#lnk_verify_account").attr('target', '_blank');
            $("#lnk_verify_account").attr("href", 'https://www.instagram.com/challenge/');
            verify = true;
        } else {
            $("#lnk_verify_account").attr('target', '_self');
            $("#lnk_verify_account").attr("href", base_url + 'index.php/welcome/log_out');
            //$("#lnk_verify_account").attr("href", base_url + 'index.php/welcome/client');
            //$(location).attr('href',base_url+'index.php/welcome/client');
            verify = false;
        }
    });

    $(".img_profile").hover(
            function (e) {
                //modal_alert_message($(e.target).attr('id'))
                $('.img_profile').css('cursor', 'pointer');
            },
            function () {
                $('.img_profile').css('cursor', 'default');
            }
    );

    $("#my_img").hover(
            function () {
                $('#my_img').css('cursor', 'pointer');
            },
            function () {
                $('#my_img').css('cursor', 'default');
            }
    );

    $(".red_number").hover(
            function () {
                $('.red_number').css('cursor', 'pointer');
            },
            function () {
                $('.red_number').css('cursor', 'default');
            }
    );
    
    $("#my_container_toggle").hover(
            function () {
                $('#my_container_toggle').css('cursor', 'pointer');
            },
            function () {
                $('#my_container_toggle').css('cursor', 'default');
            }
    );
    
    $("#my_container_toggle_autolike").hover(
            function () {
                $('#my_container_toggle_autolike').css('cursor', 'pointer');
            },
            function () {
                $('#my_container_toggle_autolike').css('cursor', 'default');
            }
    );

    $("#btn_unfollow_permition").click(function () {
        $("#message_status1").remove();
        $("#btn_unfollow_permition").remove();
        $("#message_status2").text(T('A SOLICITACÃO ESTA SENDO PROCESSADA'));
        $("#message_status3").text(T('INMEDIATAMENTE DE TERMINAR COMEÇARÁ A RECEBER O SERVIÇO'));
    });

    $("#img_ref_prof0").click(function () {
        if (!(icons_profiles[0]['login_profile']).match("perfilderef"))
            delete_profile_click(icons_profiles[0]['login_profile']);
    });

    $("#img_ref_prof1").click(function () {
        if (!(icons_profiles[1]['login_profile']).match("perfilderef"))
            delete_profile_click(icons_profiles[1]['login_profile']);
    });

    $("#img_ref_prof2").click(function () {
        if (!(icons_profiles[2]['login_profile']).match("perfilderef"))
            delete_profile_click(icons_profiles[2]['login_profile']);
    });

    $("#img_ref_prof3").click(function () {
        if (!(icons_profiles[3]['login_profile']).match("perfilderef"))
            delete_profile_click(icons_profiles[3]['login_profile']);
    });

    $("#img_ref_prof4").click(function () {
        if (!(icons_profiles[4]['login_profile']).match("perfilderef"))
            delete_profile_click(icons_profiles[4]['login_profile']);
    });

    $("#img_ref_prof5").click(function () {
        if (!(icons_profiles[5]['login_profile']).match("perfilderef"))
            delete_profile_click(icons_profiles[5]['login_profile']);
    });

    $("#btn_insert_profile").click(function () {
        if (validate_element('#login_profile', '^[a-zA-Z0-9\._]{1,300}$')) {
            if (num_profiles < MAX_NUM_PROFILES) {
                if ($('#login_profile').val() != '') {
                    if ($('#login_profile').val() != my_login_profile) {
                        //$("#waiting_inser_profile").css({"visibility":"visible","display":"block"});
                        var l = Ladda.create(this);
                        l.start();
                        $.ajax({
                            url: base_url + 'index.php/welcome/client_insert_profile',
                            data: {'profile': $('#login_profile').val()},
                            type: 'POST',
                            dataType: 'json',
                            success: function (response) {
                                if (response['success']) {
                                    inser_icons_profiles(response);
                                    $('#login_profile').val('');
                                    $("#insert_profile_form").fadeOut();
                                    $("#insert_profile_form").css({"visibility": "hidden", "display": "none"});
                                    $('#reference_profile_message').text('');
                                    $('#reference_profile_message').css('visibility', 'hidden');
                                    if (num_profiles == MAX_NUM_PROFILES) {
                                        $('#btn_modal_close').click();
                                    }
                                } else {
                                    $('#reference_profile_message').text(response['message']);
                                    $('#reference_profile_message').css('visibility', 'visible');
                                    $('#reference_profile_message').css('color', 'red')
                                    //modal_alert_message(response['message']);                        
                                }
                                $("#waiting_inser_profile").css({"visibility": "hidden", "display": "none"});
                                l.stop();
                            },
                            error: function (xhr, status) {
                                $('#reference_profile_message').text(T('Não foi possível conectar com o Instagram'));
                                $('#reference_profile_message').css('visibility', 'visible');
                                $('#reference_profile_message').css('color', 'red');
                                //modal_alert_message('Não foi possível conectar com o Instagram');
                                l.stop();
                            }
                        });
                    } else {
                        $('#reference_profile_message').text(T('Não pode escolher seu próprio perfil como referência.'));
                        $('#reference_profile_message').css('visibility', 'visible');
                        $('#reference_profile_message').css('color', 'red');
                    }
                }
            } else {
                $('#reference_profile_message').text(T('Alcançou a quantidade máxima.'));
                $('#reference_profile_message').css('visibility', 'visible');
                $('#reference_profile_message').css('color', 'red');
                //modal_alert_message('Alcançou a quantidade maxima permitida');
            }
        } else {
            $('#reference_profile_message').text(T('* O nome do perfil só pode conter letras, números, sublinhados e pontos.'));
            $('#reference_profile_message').css('visibility', 'visible');
            $('#reference_profile_message').css('color', 'red');
            //modal_alert_message('O nome de um perfil só pode conter combinações de letras, números, sublinhados e pontos.');
        }
    });

    $("#activate_account_by_status_3").click(function () {
        if ($('#userLogin').val() != '' && $('#userPassword').val() !== '') {
            if (validate_element('#userLogin', '^[a-zA-Z0-9\._]{1,300}$')) {
                var l = Ladda.create(this);
                l.start();
                l.start();
                $.ajax({
                    url: base_url + 'index.php/welcome/user_do_login',
                    //url : base_url+'index.php/welcome/client',
                    data: {
                        'user_login': $('#userLogin').val(),
                        'user_pass': $('#userPassword').val()
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function (response) {
                        if (response['authenticated']) {
                            if (response['role'] == 'CLIENT') {
                                $(location).attr('href', base_url + 'index.php/welcome/' + response['resource'] + '');
                            }
                        } else {
                            modal_alert_message('Senha incorreta');
                        }
                        l.stop();
                    },
                    error: function (xhr, status) {
                        modal_alert_message(T('Erro encontrado. Informe para o atendimento seu caso.'));
                        l.stop();
                    }
                });
            } else {
                $('#container_login_message').text(T('O nome de um perfil só pode conter combinações de letras, números, sublinhados e pontos.'));
                $('#container_login_message').css('visibility', 'visible');
                $('#container_login_message').css('color', 'red');
            }
        } else {
            $('#container_login_message').text(T('Deve preencher todos os dados corretamente.'));
            $('#container_login_message').css('visibility', 'visible');
            $('#container_login_message').css('color', 'red');
        }
    });

    $("#accept_modal").click(function () {
        if($('#aceita_desconto').prop("checked")){
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                url: base_url + 'index.php/welcome/client_acept_discont',   
                dataType: 'json',
                async: false,
                success: function (response) {
                    if (response['success']) {
                        alert(response['message']);
                    } else {
                        alert('Desconto erro');
                    }
                    l.stop();
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Erro encontrado. Informe para o atendimento seu caso.'));
                    
                }
            });
            l.stop();
            $('#cancel_usser_account').modal('hide');
        }
        else 
        if($('#nao_aceita_desconto').prop("checked")){
            $('#cancel_usser_account').modal('hide');
            if(SERVER_NAME==='PRO')
                window.open('https://docs.google.com/a/dumbu.pro/forms/d/e/1FAIpQLSejGY19wxZXEmMy_E9zcD-vODoimwpFAt4qQ-lN7TGYjbxYjw/viewform?c=0&w=1', '_blank');
            else
                window.open('https://docs.google.com/a/dumbu.pro/forms/d/e/1FAIpQLSfHZZ-hNlUHnmsyOvRM7zDM6aMSoBk1iwxJNA0Dt_cGQKxBTw/viewform', '_blank');
        }        
    });
    
    $("#cancel_usser_account").click(function () {
        //$('#modal_cancel_account_message').modal('show');
        if(SERVER_NAME==='PRO')
                window.open('https://docs.google.com/a/dumbu.pro/forms/d/e/1FAIpQLSejGY19wxZXEmMy_E9zcD-vODoimwpFAt4qQ-lN7TGYjbxYjw/viewform?c=0&w=1', '_blank');
            else
                window.open('https://docs.google.com/a/dumbu.pro/forms/d/e/1FAIpQLSfHZZ-hNlUHnmsyOvRM7zDM6aMSoBk1iwxJNA0Dt_cGQKxBTw/viewform', '_blank');
    });

    $("#adding_profile").click(function () {
        if (num_profiles < MAX_NUM_PROFILES) {
            $("#insert_profile_form").fadeIn();
            $("#insert_profile_form").css({"visibility": "visible", "display": "block"});
        } else
            modal_alert_message(T('Alcançou a quantidade maxima permitida'));
    });

    $("#btn_RP_status").click(function () {
        $('#reference_profile_status_container').css({"visibility": "hidden", "display": "none"})
    });

    $("#my_container_toggle").click(function () {
        if (unfollow_total) {
            confirm_message = 'Confirma ativar a opção UNFOLLOW NORMAL';
            tmp_unfollow_total = 0;
        } else {
            confirm_message = 'Confirma ativar a opção UNFOLLOW TOTAL';
            tmp_unfollow_total = 1;
        }
        if (confirm(T(confirm_message))) {
            $.ajax({
                url: base_url + 'index.php/welcome/unfollow_total',
                data: {
                    'unfollow_total': tmp_unfollow_total
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) {
                    if (response['success']) {
                        //modal_alert_message(parseInt(response['unfollow_total']));
                        set_global_var('unfollow_total', parseInt(response['unfollow_total']));
                        init_unfollow_type();
                    } else {
                        modal_alert_message(T('Erro ao processar sua requisição. Tente depois...'));
                    }
                    //l.stop();
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Erro ao processar sua requisição. Tente depois...'));
                    //l.stop();
                }
            });
        }
    });

    function init_unfollow_type() {
        if (unfollow_total) {
            $('#left_toggle_buttom').css({'background-color': '#009CDE'});
            $('#right_toggle_buttom').css({'background-color': '#DFDFDF'});
        } else {
            $('#left_toggle_buttom').css({'background-color': '#DFDFDF'});
            $('#right_toggle_buttom').css({'background-color': '#009CDE'});
        }
    }

    $("#my_container_toggle_autolike").click(function () {
        if (autolike) {
            confirm_message = 'Confirma desativar o recurso AUTOLIKE';
            tmp_autolike = 0;
        } else {
            confirm_message = 'Confirma ativar o recurso AUTOLIKE';
            tmp_autolike = 1;
        }
        if (confirm(T(confirm_message))) {
            $.ajax({
                url: base_url + 'index.php/welcome/autolike',
                data: {
                    'autolike': tmp_autolike
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) {
                    if (response['success']) {
                        //modal_alert_message(parseInt(response['unfollow_total']));
                        set_global_var('autolike', !autolike);
                        init_autolike_type();
                    } else {
                        modal_alert_message(T('Erro ao processar sua requisição. Tente depois...'));
                    }
                    //l.stop();
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Erro ao processar sua requisição. Tente depois...'));
                    //l.stop();
                }
            });
        }
    });

    function init_autolike_type() {
        if (autolike){
            $('#left_toggle_buttom_autolike').css({'background-color': '#DFDFDF'});
            $('#right_toggle_buttom_autolike').css({'background-color': '#009CDE'});
        } else{
            $('#left_toggle_buttom_autolike').css({'background-color': '#009CDE'});
            $('#right_toggle_buttom_autolike').css({'background-color': '#DFDFDF'});
        }
    }
    
    $("#button_play_pause").click(function () {
        if (play_pause) {
            confirm_message = 'Confirma reativar a ferramenta?';
            tmp_play_pause = 0;
        } else {
            confirm_message = 'Confirma pausar a ferramenta?';
            tmp_play_pause = 1;
        }
        if (confirm(T(confirm_message))) {
            $.ajax({
                url: base_url + 'index.php/welcome/play_pause',
                data: {
                    'play_pause': tmp_play_pause
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) {
                    if (response['success']) {
                        //modal_alert_message(parseInt(response['unfollow_total']));
                        set_global_var('play_pause', !play_pause);
                        init_play_pause_type();
                    } else {
                        modal_alert_message(T('Erro ao processar sua requisição. Tente depois...'));
                    }
                    //l.stop();
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Erro ao processar sua requisição. Tente depois...'));
                    //l.stop();
                }
            });
        }
    });

    function init_play_pause_type() {
        if (play_pause) {
            $('#button_play_pause').css({'background-color': '#009CDE'});
            $('#button_play_pause').html('<span id="playIcon" class="glyphicon glyphicon-play" style="color:white"></span><b style="color:white"> Play</b>');
            var contenedor=document.getElementById('status_text');
            if (contenedor !== null) { contenedor.style.display="none"; }
            contenedor=document.getElementById('status_text_paused');
            if (contenedor !== null) { contenedor.style.display="inline"; }
        }
        else {
            $('#button_play_pause').css({'background-color': '#DFDFDF'});
            $('#button_play_pause').html('<span id="pauseIcon" class="glyphicon glyphicon-pause"></span><b> Pause</b>');
            var contenedor=document.getElementById('status_text_paused');
            if (contenedor !== null) { contenedor.style.display="none"; }
            contenedor=document.getElementById('status_text');
            if (contenedor !== null) { contenedor.style.display="inline"; }
        }
    }

    function delete_profile_click(element) {
        if (confirm(T('Deseja elimiar o perfil de referência ') + element)) {
            $.ajax({
                url: base_url + 'index.php/welcome/client_desactive_profiles',
                data: {'profile': element},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        delete_icons_profiles(element);
                    } else
                        modal_alert_message(response['message']);
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível conectar com o Instagram'));
                }
            });
        }
    }

    function init_icons_profiles(datas) {
        response = jQuery.parseJSON(datas);
        prof = response['array_profiles'];
        if (response['message'] !== 'Profiles unloaded by instagram failed connection') {
            num_profiles = response['N'];            
            for (i = 0; i < num_profiles; i++) {
                if (!(typeof prof[i] === 'undefined')) {
                    icons_profiles[i]['img_profile'] = prof[i]['img_profile'];
                    icons_profiles[i]['follows_from_profile'] = prof[i]['follows_from_profile'];
                    icons_profiles[i]['login_profile'] = prof[i]['login_profile'];
                    icons_profiles[i]['status_profile'] = prof[i]['status_profile'];
                }
            }
            for (j = i; j < MAX_NUM_PROFILES; j++) {
                icons_profiles[j]['img_profile'] = base_url + 'assets/images/avatar.png';
                icons_profiles[j]['follows_from_profile'] = '0';
                icons_profiles[j]['login_profile'] = 'perfilderef' + (j + 1);
                icons_profiles[j]['status_profile'] = '0';
            }
            display_reference_profiles();
        } else {
            modal_alert_message('Não foi possível comunicar com o Instagram pra verificar seus perfis de referência. Tente depois');
        }
    }

    function display_reference_profiles() {
        var reference_profiles_status = false;
        for (i = 0; i < MAX_NUM_PROFILES; i++) {
            icons_profiles[i]['ptr_img_obj'].attr("src", icons_profiles[i]['img_profile']);
            icons_profiles[i]['ptr_img_obj'].prop('title', T('Click para eliminar ') + icons_profiles[i]['login_profile']);
            icons_profiles[i]['ptr_p_obj'].prop('title', T('Ver ') + icons_profiles[i]['login_profile'] + T(' no Instagram'));
            icons_profiles[i]['ptr_label_obj'].text(icons_profiles[i]['follows_from_profile']);
            $avatar = (icons_profiles[i]['login_profile']).match("avatar.png");
            /*if($avatar){
             //icons_profiles[i]['ptr_p_obj']
             icons_profiles[i]['ptr_p_obj'].text((icons_profiles[i]['login_profile']).replace(/(^.{9}).*$/,'$1...'));
             }    
             else
             icons_profiles[i]['ptr_p_obj'].text((icons_profiles[i]['login_profile']));
             */
            icons_profiles[i]['ptr_p_obj'].text((icons_profiles[i]['login_profile']).replace(/(^.{9}).*$/, '$1...'));

            icons_profiles[i]['ptr_lnk_ref_prof'].attr("href", 'https://www.instagram.com/' + icons_profiles[i]['login_profile'] + '/');

            if (icons_profiles[i]['status_profile'] === 'ended') {
                icons_profiles[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('O sistema já seguiu todos os seguidores do perfil de referência ') + '<b style="color:red">"' + icons_profiles[i]['login_profile'] + '"</b></li>');
                reference_profiles_status = true;
            } else
            if (icons_profiles[i]['status_profile'] === 'privated') {
                icons_profiles[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('O perfil de referência ') + '<b style="color:red">"' + icons_profiles[i]['login_profile'] + '"</b>' + T(' passou a ser privado') + '</li>');
                reference_profiles_status = true;
            } else
            if (icons_profiles[i]['status_profile'] === 'deleted') {
                icons_profiles[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('O perfil de referência ') + '<b style="color:red">"' + icons_profiles[i]['login_profile'] + '"</b>' + T(' não existe mais no Instragram') + '</li>');
                reference_profiles_status = true;
            } else
            if (icons_profiles[i]['status_profile'] === 'blocked') {
                icons_profiles[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('O perfil de referência ') + '<b style="color:red">"' + icons_profiles[i]['login_profile'] + '"</b>' + T(' bloqueu você no Instagram') + '</li>');
                reference_profiles_status = true;
            } else
                icons_profiles[i]['ptr_p_obj'].css({'color': 'black'});
            icons_profiles[i]['ptr_panel_obj'].css({"visibility": "visible", "display": "block"});
        }
        if (reference_profiles_status) {
            $('#reference_profile_status_container').css({"visibility": "visible", "display": "block"})
        }
        if (num_profiles) {
            $('#container_present_profiles').css({"visibility": "visible", "display": "block"})
            $('#container_missing_profiles').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_profiles').css({"visibility": "visible", "display": "block"})
            $('#container_present_profiles').css({"visibility": "hidden", "display": "none"});
        }
    }

    function inser_icons_profiles(datas) {
        icons_profiles[num_profiles]['img_profile'] = datas['img_url'];
        icons_profiles[num_profiles]['login_profile'] = datas['profile'];
        icons_profiles[num_profiles]['follows_from_profile'] = datas['follows_from_profile'];
        icons_profiles[num_profiles]['status_profile'] = datas['status_profile'];
        icons_profiles[num_profiles]['ptr_lnk_ref_prof'].attr("href", 'https://www.instagram.com/' + datas['profile'] + '/');
        num_profiles = num_profiles + 1;
        display_reference_profiles();
        if (num_profiles) {
            $('#container_present_profiles').css({"visibility": "visible", "display": "block"})
            $('#container_missing_profiles').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_profiles').css({"visibility": "visible", "display": "block"})
            $('#container_present_profiles').css({"visibility": "hidden", "display": "none"});
        }
    }

    function delete_icons_profiles(name_profile) {
        var i, j;
        for (i = 0; i < num_profiles; i++) {
            if (icons_profiles[i]['login_profile'] === name_profile)
                break;
        }
        for (j = i; j < MAX_NUM_PROFILES - 1; j++) {
            icons_profiles[j]['img_profile'] = icons_profiles[j + 1]['img_profile'];
            if ((icons_profiles[j + 1]['login_profile']).match("perfilderef")) {
                icons_profiles[j]['login_profile'] = 'perfilderef' + (j + 1);
                icons_profiles[j]['follows_from_profile'] = 0;
            } else {
                icons_profiles[j]['login_profile'] = icons_profiles[j + 1]['login_profile'];
                icons_profiles[j]['follows_from_profile'] = icons_profiles[j + 1]['follows_from_profile'];
            }
            icons_profiles[j]['status_profile'] = icons_profiles[j + 1]['status_profile'];
            icons_profiles[j]['ptr_lnk_ref_prof'].attr("href", icons_profiles[j + 1]['ptr_lnk_ref_prof'].attr("href"));
        }
        icons_profiles[j]['img_profile'] = base_url + 'assets/images/avatar.png';
        icons_profiles[j]['login_profile'] = 'perfilderef' + (j + 1);
        icons_profiles[j]['follows_from_profile'] = 0;
        icons_profiles[j]['ptr_lnk_ref_prof'].attr("href", "");
        num_profiles = num_profiles - 1;
        display_reference_profiles();

        if (num_profiles) {
            $('#container_present_profiles').css({"visibility": "visible", "display": "block"})
            $('#container_missing_profiles').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_profiles').css({"visibility": "visible", "display": "block"})
            $('#container_present_profiles').css({"visibility": "hidden", "display": "none"});
        }
    }

    function validate_element(element_selector, pattern) {
        if (!$(element_selector).val().match(pattern)) {
            $(element_selector).css("border", "1px solid red");
            return false;
        } else {
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }

    function change_plane(new_plane_id) {
        if (new_plane_id > plane_id)
            confirm_msg = T('Ao mudar para um plano maior, vc deve pagar a diferença. Confirma mudar de plano?');
        else
            confirm_msg = T('Confirma mudar de plano?');
        if (confirm(confirm_msg)) {
            $.ajax({
                url: base_url + 'index.php/welcome/change_plane',
                data: {
                    'plane_id': plane_id,
                    'new_plane_id': new_plane_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) {
                    if (response['success'] == true) {
                        modal_alert_message(response['success']);
                        $(location).attr('href', base_url + 'index.php/welcome/client');
                    } else {
                        modal_alert_message(T('Não foi possível trocar de plano, Entre en contaco com o Atendimento'));
                    }
                    l.stop();
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Erro enviando sua solicitação. Reporte o caso para nosso Atendimento'));
                    l.stop();
                }
            });
        }
    }

    function actual_plane() {
        switch (plane_id) {
            case 1:
                $('#radio_plane_7_9990').attr('checked', true);
                $('#container_plane_7_9990').css({'border': '1px solid silver', 'box-shadow': '10px 10px 5px #ACC2BC'});
                $('#container_plane_4_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_9_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_29_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_99_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                break;
            case 2:
                $('#radio_plane_4_90').attr('checked', true);
                $('#container_plane_7_9990').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_4_90').css({'border': '1px solid silver', 'box-shadow': '10px 10px 5px #ACC2BC'});
                $('#container_plane_9_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_29_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_99_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                break;
            case 3:
                $('#radio_plane_9_90').attr('checked', true);
                $('#container_plane_7_9990').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_4_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_9_90').css({'border': '1px solid silver', 'box-shadow': '10px 10px 5px #ACC2BC'});
                $('#container_plane_29_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_99_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                break;
            case 4:
                $('#radio_plane_29_90').attr('checked', true);
                $('#container_plane_7_9990').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_4_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_9_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_29_90').css({'border': '1px solid silver', 'box-shadow': '10px 10px 5px #ACC2BC'});
                $('#container_plane_99_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                break;
            case 5:
                $('#radio_plane_99_90').attr('checked', true);
                $('#container_plane_7_9990').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_4_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_9_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_29_90').css({'border': '1px solid silver', 'box-shadow': '5px 5px 2px #888888'});
                $('#container_plane_99_90').css({'border': '1px solid silver', 'box-shadow': '10px 10px 5px #ACC2BC'});
                break;
        }
    }
    actual_plane();

    $('#modal_container_add_reference_rpofile').keypress(function (e) {
        if (e.which == 13) {
            $("#btn_insert_profile").click();
            return false;
        }
    });

    
    
    init_icons_profiles(profiles);
    
    
    //----------------------------------------------------------------------------------------------------------
    //GEOLOCALIZACAO
    
    var icons_geolocalization = {
        0: {'ptr_img_obj':$('#img_geolocalization0'), 'ptr_p_obj':$('#name_geolocalization0'), 'ptr_label_obj':$('#cnt_follows_geolocalization0'), 'ptr_panel_obj':$('#geolocalization0'), 'img_geolocalization':'', 'login_geolocalization':'', 'status_geolocalization':'', 'follows_from_geolocalization':'', 'ptr_lnk_geolocalization':$('#lnk_geolocalization0'), 'geolocalization_pk':''},
        1: {'ptr_img_obj':$('#img_geolocalization1'), 'ptr_p_obj':$('#name_geolocalization1'), 'ptr_label_obj':$('#cnt_follows_geolocalization1'), 'ptr_panel_obj':$('#geolocalization1'), 'img_geolocalization':'', 'login_geolocalization':'', 'status_geolocalization':'', 'follows_from_geolocalization':'', 'ptr_lnk_geolocalization':$('#lnk_geolocalization1'), 'geolocalization_pk':''},
        2: {'ptr_img_obj':$('#img_geolocalization2'), 'ptr_p_obj':$('#name_geolocalization2'), 'ptr_label_obj':$('#cnt_follows_geolocalization2'), 'ptr_panel_obj':$('#geolocalization2'), 'img_geolocalization':'', 'login_geolocalization':'', 'status_geolocalization':'', 'follows_from_geolocalization':'', 'ptr_lnk_geolocalization':$('#lnk_geolocalization2'), 'geolocalization_pk':''},
        3: {'ptr_img_obj':$('#img_geolocalization3'), 'ptr_p_obj':$('#name_geolocalization3'), 'ptr_label_obj':$('#cnt_follows_geolocalization3'), 'ptr_panel_obj':$('#geolocalization3'), 'img_geolocalization':'', 'login_geolocalization':'', 'status_geolocalization':'', 'follows_from_geolocalization':'', 'ptr_lnk_geolocalization':$('#lnk_geolocalization3'), 'geolocalization_pk':''},
        4: {'ptr_img_obj':$('#img_geolocalization4'), 'ptr_p_obj':$('#name_geolocalization4'), 'ptr_label_obj':$('#cnt_follows_geolocalization4'), 'ptr_panel_obj':$('#geolocalization4'), 'img_geolocalization':'', 'login_geolocalization':'', 'status_geolocalization':'', 'follows_from_geolocalization':'', 'ptr_lnk_geolocalization':$('#lnk_geolocalization4'), 'geolocalization_pk':''},
        5: {'ptr_img_obj':$('#img_geolocalization5'), 'ptr_p_obj':$('#name_geolocalization5'), 'ptr_label_obj':$('#cnt_follows_geolocalization5'), 'ptr_panel_obj':$('#geolocalization5'), 'img_geolocalization':'', 'login_geolocalization':'', 'status_geolocalization':'', 'follows_from_geolocalization':'', 'ptr_lnk_geolocalization':$('#lnk_geolocalization5'), 'geolocalization_pk':''}        
    };
    
    $("#upgrade_plane").click(function () {
        $("#myModal_geolocalization").modal('hide');    
    });    

    var num_geolocalization;
    
    $(".img_geolocalization").hover(
            function (e) {
                //modal_alert_message($(e.target).attr('id'))
                $('.img_geolocalization').css('cursor', 'pointer');
            },
            function () {
                $('.img_geolocalization').css('cursor', 'default');
            }
    );
    
    $("#btn_add_new_geolocalization").hover(
        function () {
            $('#btn_add_new_geolocalization').css('cursor', 'pointer');
        },
        function () {
            $('#btn_add_new_geolocalization').css('cursor', 'default');
    });
   
    $("#img_geolocalization0").click(function () {
        if (!(icons_geolocalization[0]['login_geolocalization']).match("geolocalization"))
            delete_geolocalization_click(icons_geolocalization[0]['login_geolocalization']);
    });

    $("#img_geolocalization1").click(function () {
        if (!(icons_geolocalization[1]['login_geolocalization']).match("geolocalization"))
            delete_geolocalization_click(icons_geolocalization[1]['login_geolocalization']);
    });

    $("#img_geolocalization2").click(function () {
        if (!(icons_geolocalization[2]['login_geolocalization']).match("geolocalization"))
            delete_geolocalization_click(icons_geolocalization[2]['login_geolocalization']);
    });

    $("#img_geolocalization3").click(function () {
        if (!(icons_geolocalization[3]['login_geolocalization']).match("geolocalization"))
            delete_geolocalization_click(icons_geolocalization[3]['login_geolocalization']);
    });

    $("#img_geolocalization4").click(function () {
        if (!(icons_geolocalization[4]['login_geolocalization']).match("geolocalization"))
            delete_geolocalization_click(icons_geolocalization[4]['login_geolocalization']);
    });

    $("#img_geolocalization5").click(function () {
        if (!(icons_geolocalization[5]['login_geolocalization']).match("geolocalization"))
            delete_geolocalization_click(icons_geolocalization[5]['login_geolocalization']);
    });
        
    $("#btn_insert_geolocalization").click(function () {        
        if (validate_element('#login_geolocalization', '^[a-zA-Z0-9\.-]{1,300}$')) {
            if(num_geolocalization < MAX_NUM_GEOLOCALIZATION) {
                if($('#login_geolocalization').val() != '') {                    
                    var l = Ladda.create(this);
                    l.start();
                    $.ajax({
                        url: base_url + 'index.php/welcome/client_insert_geolocalization',
                        data: {'geolocalization': $('#login_geolocalization').val()},
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {
                            if (response['success']) {
                                inser_icons_geolocalization(response);
                                $('#login_geolocalization').val('');
                                $("#insert_geolocalization_form").fadeOut();
                                $("#insert_geolocalization_form").css({"visibility": "hidden", "display": "none"});
                                $('#geolocalization_message').text('');
                                $('#geolocalization_message').css('visibility', 'hidden');
                                if (num_geolocalization === MAX_NUM_GEOLOCALIZATION) {
                                    $('#btn_modal_close').click();
                                }
                            } else {
                                $('#geolocalization_message').text(response['message']);
                                $('#geolocalization_message').css('visibility', 'visible');
                                $('#geolocalization_message').css('color', 'red');   
                            }                            
                            l.stop();
                        },
                        error: function (xhr, status) {
                            $('#geolocalization_message').text(T('Não foi possível conectar com o Instagram'));
                            $('#geolocalization_message').css('visibility', 'visible');
                            $('#geolocalization_message').css('color', 'red');
                            l.stop();
                        }
                    });
                }
            } else {
                $('#geolocalization_message').text(T('Alcançou a quantidade máxima.'));
                $('#geolocalization_message').css('visibility', 'visible');
                $('#geolocalization_message').css('color', 'red');            
            }
        } else {
            $('#geolocalization_message').text(T('* O nome da geolocalização só pode conter letras, números, sublinhados e pontos.'));
            $('#geolocalization_message').css('visibility', 'visible');
            $('#geolocalization_message').css('color', 'red');
        }
    });
      
    function delete_geolocalization_click(element) {
        if (confirm(T('Deseja elimiar a geolocalização ') + element)) {
            $.ajax({
                url: base_url + 'index.php/welcome/client_desactive_geolocalization',
                data: {'geolocalization': element},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        delete_icons_geolocalization(element);
                    } else
                        modal_alert_message(response['message']);
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível conectar com o Instagram'));
                }
            });
        }
    }

    function init_icons_geolocalization(datas) {
        response = jQuery.parseJSON(datas);
        prof = response['array_geolocalization'];
        //prof = response['array_profiles'];
        if (response['message'] !== 'Geolocalizations unloaded by Instagram failed connection') {
            num_geolocalization = response['N_geolocalization'];
            for (i = 0; i < num_geolocalization; i++) {
                //if (!(typeof prof[i]==='undefined')) {
                    icons_geolocalization[i]['img_geolocalization'] = prof[i]['img_geolocalization'];
                    icons_geolocalization[i]['follows_from_geolocalization'] = prof[i]['follows_from_geolocalization'];
                    icons_geolocalization[i]['login_geolocalization'] = prof[i]['login_geolocalization'];
                    xxx=prof[i]['geolocalization_pk'];
                    icons_geolocalization[i]['geolocalization_pk'] = prof[i]['geolocalization_pk'];
                    icons_geolocalization[i]['status_geolocalization'] = prof[i]['status_geolocalization'];
                    
                    /*icons_geolocalization[i]['img_geolocalization'] = prof[i]['img_profile'];
                    icons_geolocalization[i]['follows_from_geolocalization'] = prof[i]['follows_from_profile'];
                    icons_geolocalization[i]['login_geolocalization'] = prof[i]['login_profile'];
                    icons_geolocalization[i]['status_geolocalization'] = prof[i]['status_profile'];*/
                //}
            }
            for (j = i; j < MAX_NUM_GEOLOCALIZATION; j++) {
                icons_geolocalization[j]['img_geolocalization'] = base_url + 'assets/images/avatar_geolocalization.jpg';
                icons_geolocalization[j]['follows_from_geolocalization'] = '0';
                icons_geolocalization[j]['login_geolocalization'] = 'geolocalization' + (j + 1);
                icons_geolocalization[j]['status_geolocalization'] = '0';
            }
            display_geolocalization();
        } else {
            modal_alert_message('Não foi possível comunicar com o Instagram pra verificar seus perfis de referência. Tente depois');
        }
    }

    function display_geolocalization() {
        var geolocalization_status = false;
        for (i = 0; i < MAX_NUM_GEOLOCALIZATION; i++) {
            icons_geolocalization[i]['ptr_img_obj'].attr("src", icons_geolocalization[i]['img_geolocalization']);
            icons_geolocalization[i]['ptr_img_obj'].prop('title', T('Click para eliminar ') + icons_geolocalization[i]['login_geolocalization']);
            icons_geolocalization[i]['ptr_p_obj'].prop('title', T('Ver ') + icons_geolocalization[i]['login_geolocalization'] + T(' no Instagram'));
            icons_geolocalization[i]['ptr_label_obj'].text(icons_geolocalization[i]['follows_from_geolocalization']);
            $avatar = (icons_geolocalization[i]['login_geolocalization']).match("avatar_geolocalization.jpg");            
             
            icons_geolocalization[i]['ptr_p_obj'].text((icons_geolocalization[i]['login_geolocalization']).replace(/(^.{9}).*$/, '$1...'));

            //icons_geolocalization[i]['ptr_lnk_geolocalization'].attr("href", 'https://www.instagram.com/' + icons_geolocalization[i]['login_geolocalization'] + '/');
            icons_geolocalization[i]['ptr_lnk_geolocalization'].attr("href", 'https://www.instagram.com/explore/locations/'+icons_geolocalization[i]['geolocalization_pk']+'/'+ icons_geolocalization[i]['login_geolocalization'] + '/');

            if (icons_geolocalization[i]['status_geolocalization'] === 'ended') {
                icons_geolocalization[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('O sistema já seguiu todas as pessoas que postaram fotos na geolocalização ') + '<b style="color:red">"' + icons_geolocalization[i]['login_geolocalization'] + '"</b></li>');
                geolocalization_status = true;
            } else
            if (icons_geolocalization[i]['status_geolocalization'] === 'privated') {
                icons_geolocalization[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('A geolocalização ') + '<b style="color:red">"' + icons_geolocalization[i]['login_geolocalization'] + '"</b>' + T(' passou a ser privado') + '</li>');
                geolocalization_status = true;
            } else
            if (icons_geolocalization[i]['status_geolocalization'] === 'deleted') {
                icons_geolocalization[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('A geolocalização ') + '<b style="color:red">"' + icons_geolocalization[i]['login_geolocalization'] + '"</b>' + T(' não existe mais no Instragram') + '</li>');
                geolocalization_status = true;
            } else
                icons_geolocalization[i]['ptr_p_obj'].css({'color': 'black'});
            icons_geolocalization[i]['ptr_panel_obj'].css({"visibility": "visible", "display": "block"});
        }
        if (geolocalization_status) {
            $('#reference_profile_status_container').css({"visibility": "visible", "display": "block"})
        }
        if (num_geolocalization) {
            $('#container_present_geolocalization').css({"visibility": "visible", "display": "block"})
            $('#container_missing_geolocalization').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_geolocalization').css({"visibility": "visible", "display": "block"})
            $('#container_present_geolocalization').css({"visibility": "hidden", "display": "none"});
        }
    }

    function inser_icons_geolocalization(datas) {
        icons_geolocalization[num_geolocalization]['img_geolocalization'] = datas['img_url'];
        icons_geolocalization[num_geolocalization]['login_geolocalization'] = datas['profile'];
        icons_geolocalization[num_geolocalization]['follows_from_geolocalization'] = datas['follows_from_profile'];//datas['follows_from_geolocalization'];
        icons_geolocalization[num_geolocalization]['status_geolocalization'] = datas['status_profile'];//datas['status_geolocalization'];
        icons_geolocalization[num_geolocalization]['geolocalization_pk'] = datas['geolocalization_pk'];
        
        icons_geolocalization[num_geolocalization]['ptr_lnk_geolocalization'].attr("href", 'https://www.instagram.com/' + datas['profile'] + '/');
        
        num_geolocalization = num_geolocalization + 1;
        display_geolocalization();
        if (num_geolocalization) {
            $('#container_present_geolocalization').css({"visibility": "visible", "display": "block"})
            $('#container_missing_geolocalization').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_geolocalization').css({"visibility": "visible", "display": "block"})
            $('#container_present_geolocalization').css({"visibility": "hidden", "display": "none"});
        }
    }
    
    function delete_icons_geolocalization(name_localization) {
        var i, j;
        for (i = 0; i < num_geolocalization; i++) {
            if (icons_geolocalization[i]['login_geolocalization'] === name_localization)
                break;
        }
        for (j = i; j < MAX_NUM_GEOLOCALIZATION - 1; j++) {
            icons_geolocalization[j]['img_geolocalization'] = icons_geolocalization[j + 1]['img_geolocalization'];
            if ((icons_geolocalization[j + 1]['login_geolocalization']).match("geolocalization")) {
                icons_geolocalization[j]['login_geolocalization'] = 'geolocalization' + (j + 1);
                icons_geolocalization[j]['follows_from_geolocalization'] = 0;
            } else {
                icons_geolocalization[j]['login_geolocalization'] = icons_geolocalization[j + 1]['login_geolocalization'];
                icons_geolocalization[j]['follows_from_geolocalization'] = icons_geolocalization[j + 1]['follows_from_geolocalization'];
            }
            icons_geolocalization[j]['status_geolocalization'] = icons_geolocalization[j + 1]['status_geolocalization'];
            icons_geolocalization[j]['ptr_lnk_geolocalization'].attr("href", icons_geolocalization[j + 1]['ptr_lnk_geolocalization'].attr("href"));
            icons_geolocalization[j]['geolocalization_pk'] = icons_geolocalization[j+1]['geolocalization_pk'];
        }
        icons_geolocalization[j]['img_geolocalization'] = base_url + 'assets/images/avatar_geolocalization.jpg';
        icons_geolocalization[j]['login_geolocalization'] = 'geolocalization' + (j + 1);
        icons_geolocalization[j]['follows_from_geolocalization'] = 0;
        icons_geolocalization[j]['ptr_lnk_geolocalization'].attr("href", "");
        icons_geolocalization[j]['geolocalization_pk']='';
        num_geolocalization = num_geolocalization - 1;
        display_geolocalization();

        if (num_geolocalization) {
            $('#container_present_geolocalization').css({"visibility": "visible", "display": "block"})
            $('#container_missing_geolocalization').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_geolocalization').css({"visibility": "visible", "display": "block"})
            $('#container_present_geolocalization').css({"visibility": "hidden", "display": "none"});
        }
    }
    
    $('#modal_container_add_geolocalization').keypress(function (e) {
        if (e.which == 13) {
            $("#btn_insert_geolocalization").click();
            return false;
        }
    });
    
    
    //black list funcionalities
    $("#black_list").click(function(){
        var l = Ladda.create(this); l.start();
        $.ajax({
                url: base_url + 'index.php/welcome/client_black_list',
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        set_global_var('client_black_list',response['client_black_list']);
                        aaa=response['client_black_list'];
                        $("#table_black_list").empty();
                        for(i=0;i<response['cnt'];i++){
                            $("#table_black_list").append("<tr class='row_"+aaa[i].profile+"'>");
                                $("#table_black_list").append("<td class='text-center row_"+aaa[i].profile+"'><a title='"+T("Ver no Instagram")+"' target='_blank' href='https://www.instagram.com/"+aaa[i].profile+"'><img class='img_profile m-t20 row_"+aaa[i].profile+"' style='width:45px;height:45px;border-radius:25px' src='"+aaa[i].url_foto+"'></a></td>");
                                $("#table_black_list").append("<td class='text-left row_"+aaa[i].profile+"'><a class='row_"+aaa[i].profile+"' title='"+T("Ver no Instagram")+"' target='_blank' href='https://www.instagram.com/"+aaa[i].profile+"'><p class='m-t30 row_"+aaa[i].profile+"' style='color:black'>"+(aaa[i].profile)+"</p></a></td>");
                                $("#table_black_list").append("<td class='text-right row_"+aaa[i].profile+"'>"
                                        +"<button onclick='myFunction();' id='"+aaa[i].profile+"' type='button' class='btn btn-default ladda-button m-t30 delete-btn row_"+aaa[i].profile+"' data-style='expand-left' data-spinner-color='#ffffff'>"
                                            +"<span class='ladda-label row_"+aaa[i].profile+"'>"+T('Eliminar')+"</span>"
                                        +"</button></td>");
                            $("#table_black_list").append("</tr>");                        
                        }                        
                        $("#table_black_list").on("click", ".delete-btn", function(e){
                            delete_profile_from_black_list(e);
                        });                   

                        $('#modal_black_list').modal('show');
                        l.stop();
                    } 
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível conectar com o Instagram'));
                }
        });
    });    
           
    $("#add_profile_in_black_list").click(function(){
        var l = Ladda.create(this);l.start();
        $.ajax({
                url: base_url + 'index.php/welcome/insert_profile_in_black_list',
                data:{'profile':$("#text_profile_black_list").val()},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        $("#table_black_list").prepend(
                                "<tr class='m-t20 row_"+$("#text_profile_black_list").val()+"'><td class='text-center row_"+$("#text_profile_black_list").val()+"'><a class='row_"+$("#text_profile_black_list").val()+"' title='"+T("Ver no Instagram")+"' target='_blank' href='https://www.instagram.com/"+$("#text_profile_black_list").val()+"'><img class='img_profile m-t20 row_"+$("#text_profile_black_list").val()+"' style='width:45px;height:45px;border-radius:25px' src='"+response['url_foto']+"'></a></td>"
                                    +"<td class='text-left row_"+$("#text_profile_black_list").val()+"'><a class='row_"+$("#text_profile_black_list").val()+"' title='"+T("Ver no Instagram")+"' target='_blank' href='https://www.instagram.com/"+$("#text_profile_black_list").val()+"'><p class='m-t30 row_"+$("#text_profile_black_list").val()+"' style='color:black'>"+$("#text_profile_black_list").val()+"</p></a></td>"
                                    +"<td class='text-right row_"+$("#text_profile_black_list").val()+"'>"
                                        +"<button id='"+$("#text_profile_black_list").val()+"' type='button' class='btn btn-default ladda-button m-t30 delete-btn row_"+$("#text_profile_black_list").val()+"' data-style='expand-left' data-spinner-color='#ffffff'>"
                                            +"<span class='ladda-label row_"+$("#text_profile_black_list").val()+"'>"+T('Eliminar')+"</span>"
                                        +"</button></td>"
                                +"</tr>");                            
                        $("#text_profile_black_list").val('');
                        $("#insert_black_list_msg_error").css({'visibility':'hidden',"display":"none"});
                        $("#table_black_list").on("click", ".delete-btn", function(e){
                            delete_profile_from_black_list(e);
                        });                        
                    } else{
                        $("#insert_black_list_msg_error").text(response['message']);
                        $("#insert_black_list_msg_error").css({"visibility":"visible","display":"block"});
                    }
                     l.stop();
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível realizar a operação'));
                    l.stop();
                }            
        });
    });
    
    function delete_profile_from_black_list(e){
        profile=$(e.currentTarget).attr('id');
        $.ajax({
                url: base_url + 'index.php/welcome/delete_client_from_black_list',
                type: 'POST',
                dataType: 'json',
                data: {'profile': profile},
                success: function (response) {
                    if (response['success']) {
                        $(".row_"+profile).remove();
                    }
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível conectar com o Instagram'));
                    l.stop();
                }
        });
    }
    
    $('#text_profile_black_list').keypress(function (e) {
        if (e.which == 13) {
            $("#add_profile_in_black_list").click();
            return false;
        }
    });
    
    $('#add_profile_in_black_list').keypress(function (e) {
        if (e.which == 13) {
            $("#add_profile_in_black_list").click();
            return false;
        }
    });
    
    
    //white list funcionalities
    $("#white_list").click(function(){
        flag_white_list=false;
        var l = Ladda.create(this); l.start();
        $.ajax({
                url: base_url + 'index.php/welcome/client_white_list',
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        set_global_var('client_white_list',response['client_white_list']);
                        aaa=response['client_white_list'];
                        $("#table_white_list").empty();
                        for(i=0;i<response['cnt'];i++){
                            if(aaa[i].url_foto==='missing_profile')
                                url_foto=base_url+'assets/images/profile_deleted.jpg';
                            else
                                url_foto=aaa[i].url_foto;
                            $("#table_white_list").append("<tr class='row_"+aaa[i].profile+"'>");
                                $("#table_white_list").append("<td class='text-center row_"+aaa[i].profile+"'><a title='"+T("Ver no Instagram")+"' target='_blank' href='https://www.instagram.com/"+aaa[i].profile+"'><img class='img_profile m-t20 row_"+aaa[i].profile+"' style='width:45px;height:45px;border-radius:25px' src='"+url_foto+"'></a></td>");
                                $("#table_white_list").append("<td class='text-left row_"+aaa[i].profile+"'><a class='row_"+aaa[i].profile+"' title='"+T("Ver no Instagram")+"' target='_blank' href='https://www.instagram.com/"+aaa[i].profile+"'><p class='m-t30 row_"+aaa[i].profile+"' style='color:black'>"+(aaa[i].profile)+"</p></a></td>");
                                $("#table_white_list").append("<td class='text-right row_"+aaa[i].profile+"'>"
                                        +"<button onclick='myFunction();' id='"+aaa[i].profile+"' type='button' class='btn btn-default ladda-button m-t30 delete-btn row_"+aaa[i].profile+"' data-style='expand-left' data-spinner-color='#ffffff'>"
                                            +"<span class='ladda-label row_"+aaa[i].profile+"'>"+T('Eliminar')+"</span>"
                                        +"</button></td>");
                            $("#table_white_list").append("</tr>");                        
                        }                        
                        $("#table_white_list").on("click", ".delete-btn", function(e){
                            delete_profile_from_white_list(e);
                        });                   

                        $('#modal_white_list').modal('show');
                        l.stop();
                    } 
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível conectar com o Instagram'));
                }
        });
    });    
           
    $("#add_profile_in_white_list").click(function(){
        var l = Ladda.create(this);l.start();
        $.ajax({
                url: base_url + 'index.php/welcome/insert_profile_in_white_list',
                data:{'profile':$("#text_profile_white_list").val()},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        $("#table_white_list").prepend(
                                "<tr class='m-t20 row_"+$("#text_profile_white_list").val()+"'><td class='text-center row_"+$("#text_profile_white_list").val()+"'><a class='row_"+$("#text_profile_white_list").val()+"' title='"+T("Ver no Instagram")+"' target='_blank' href='https://www.instagram.com/"+$("#text_profile_white_list").val()+"'><img class='img_profile m-t20 row_"+$("#text_profile_white_list").val()+"' style='width:45px;height:45px;border-radius:25px' src='"+response['url_foto']+"'></a></td>"
                                    +"<td class='text-left row_"+$("#text_profile_white_list").val()+"'><a class='row_"+$("#text_profile_white_list").val()+"' title='"+T("Ver no Instagram")+"' target='_blank' href='https://www.instagram.com/"+$("#text_profile_white_list").val()+"'><p class='m-t30 row_"+$("#text_profile_white_list").val()+"' style='color:black'>"+$("#text_profile_white_list").val()+"</p></a></td>"
                                    +"<td class='text-right row_"+$("#text_profile_white_list").val()+"'>"
                                        +"<button id='"+$("#text_profile_white_list").val()+"' type='button' class='btn btn-default ladda-button m-t30 delete-btn row_"+$("#text_profile_white_list").val()+"' data-style='expand-left' data-spinner-color='#ffffff'>"
                                            +"<span class='ladda-label row_"+$("#text_profile_white_list").val()+"'>"+T('Eliminar')+"</span>"
                                        +"</button></td>"
                                +"</tr>");                            
                        $("#text_profile_white_list").val('');
                        $("#insert_white_list_msg_error").css({'visibility':'hidden',"display":"none"});
                        $("#table_white_list").on("click", ".delete-btn", function(e){
                            delete_profile_from_white_list(e);
                        });                        
                    } else{
                        $("#insert_white_list_msg_error").text(response['message']);
                        $("#insert_white_list_msg_error").css({"visibility":"visible","display":"block"});
                    }
                     l.stop();
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível realizar a operação'));
                    l.stop();
                }
        });
    });
    
    function delete_profile_from_white_list(e){
        profile=$(e.currentTarget).attr('id');
        $.ajax({
                url: base_url + 'index.php/welcome/delete_client_from_white_list',
                type: 'POST',
                dataType: 'json',
                data: {'profile': profile},
                success: function (response) {
                    if (response['success']) {
                        $(".row_"+profile).remove();
                    }
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível conectar com o Instagram'));
                    l.stop();
                }
        });
    }
    
    $('#text_profile_white_list').keypress(function (e) {
        if (e.which == 13) {
            $("#add_profile_in_white_list").click();
            return false;
        }
    });
    
    $('#add_profile_in_white_list').keypress(function (e) {
        if (e.which == 13) {
            $("#add_profile_in_white_list").click();
            return false;
        }
    });
    
    function set_global_var(str, value) {
        switch (str) {
            case 'unfollow_total':
                unfollow_total = value;
                break;
            case 'autolike':
                autolike = value;
                break;
            case 'play_pause':
                play_pause = value;
                break;
            case 'users_datas':
                users_datas = value;
                break;
            case 'places':
                places = value;
                break;
            case 'client_black_list':
                client_black_list = value;
                break;
            case 'client_white_list':
                client_white_list = value;
                break;
        }
    }
    
    
    init_icons_geolocalization(profiles);
    
    $("#lnk_language1").click(function () {
        //alert($('#img_language1').attr('src'));
    });
    
    $("#lnk_language2").click(function () {
       $(location).attr("href",base_url+"index.php/welcome/client?language="+$("#txt_language2").text());
        
    });
    $("#lnk_language3").click(function () {
        $(location).attr("href",base_url+"index.php/welcome/client?language="+$("#txt_language3").text()); 
    });
    
    $("#lnk_security_code_request").hover(
            function () {
                $('#lnk_security_code_request').css('cursor', 'pointer');
            },
            function () {
                $('#lnk_security_code_request').css('cursor', 'default');
            }
    );
    
    $("#lnk_security_code_request").click(function () {
        $("#lnk_security_code_request").hide();
        $.ajax({
            url: base_url + 'index.php/welcome/security_code_request',
            data: {
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                modal_alert_message(response['message']);
                $("#lnk_security_code_request").show();
                
                if (response['success']) {
                    $("#security_code").prop("disabled", false);
                    $("#btn_confirm_new").prop("disabled", false);
                }
                
            },
            error: function (xhr, status) {
                var start = xhr.responseText.lastIndexOf("{");
                var json_str = xhr.responseText.substr(start);
                response = JSON.parse(json_str);
                modal_alert_message(response['message']);
                $("#lnk_security_code_request").show();
                
                if (response['success']) {
                    $("#security_code").prop("disabled", false);
                    $("#btn_confirm_new").prop("disabled", false);
                }
            }
        });
    });
    
    $("#btn_confirm_new").click(function () {
        if ($("#security_code").val() !== '') {
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                url: base_url + 'index.php/welcome/security_code_confirmation',
                data: {
                    'security_code': $('#security_code').val()
                },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    l.stop();
                    modal_alert_message(response['message']);
                    
                    if (response['success']) {
                        $(location).attr('href',base_url+'index.php/welcome/client');
                    }
                },
                error: function (xhr, status) {                  
                    l.stop();
                    var start = xhr.responseText.lastIndexOf("{");
                    var json_str = xhr.responseText.substr(start);
                    response = JSON.parse(json_str);
                    modal_alert_message(response['message']);
                    
                    if (response['success']) {
                        $(location).attr('href',base_url+'index.php/welcome/client');
                    }
                }
            });
        } else {
            modal_alert_message(T('Deve preencher o campo com o código de segurança de 6 dígitos.'));  
        }
    });
    
    //----------------------------------------------------------------------------------------------------------
    //HASHTAG
    
    var icons_hashtag = {
        0: {'ptr_img_obj':$('#img_hashtag0'), 'ptr_p_obj':$('#name_hashtag0'), 'ptr_label_obj':$('#cnt_follows_hashtag0'), 'ptr_panel_obj':$('#hashtag0'), 'img_hashtag':'', 'login_hashtag':'', 'status_hashtag':'', 'follows_from_hashtag':'', 'ptr_lnk_hashtag':$('#lnk_hashtag0'), 'hashtag_pk':''},
        1: {'ptr_img_obj':$('#img_hashtag1'), 'ptr_p_obj':$('#name_hashtag1'), 'ptr_label_obj':$('#cnt_follows_hashtag1'), 'ptr_panel_obj':$('#hashtag1'), 'img_hashtag':'', 'login_hashtag':'', 'status_hashtag':'', 'follows_from_hashtag':'', 'ptr_lnk_hashtag':$('#lnk_hashtag1'), 'hashtag_pk':''},
        2: {'ptr_img_obj':$('#img_hashtag2'), 'ptr_p_obj':$('#name_hashtag2'), 'ptr_label_obj':$('#cnt_follows_hashtag2'), 'ptr_panel_obj':$('#hashtag2'), 'img_hashtag':'', 'login_hashtag':'', 'status_hashtag':'', 'follows_from_hashtag':'', 'ptr_lnk_hashtag':$('#lnk_hashtag2'), 'hashtag_pk':''},
        3: {'ptr_img_obj':$('#img_hashtag3'), 'ptr_p_obj':$('#name_hashtag3'), 'ptr_label_obj':$('#cnt_follows_hashtag3'), 'ptr_panel_obj':$('#hashtag3'), 'img_hashtag':'', 'login_hashtag':'', 'status_hashtag':'', 'follows_from_hashtag':'', 'ptr_lnk_hashtag':$('#lnk_hashtag3'), 'hashtag_pk':''},
        4: {'ptr_img_obj':$('#img_hashtag4'), 'ptr_p_obj':$('#name_hashtag4'), 'ptr_label_obj':$('#cnt_follows_hashtag4'), 'ptr_panel_obj':$('#hashtag4'), 'img_hashtag':'', 'login_hashtag':'', 'status_hashtag':'', 'follows_from_hashtag':'', 'ptr_lnk_hashtag':$('#lnk_hashtag4'), 'hashtag_pk':''},
        5: {'ptr_img_obj':$('#img_hashtag5'), 'ptr_p_obj':$('#name_hashtag5'), 'ptr_label_obj':$('#cnt_follows_hashtag5'), 'ptr_panel_obj':$('#hashtag5'), 'img_hashtag':'', 'login_hashtag':'', 'status_hashtag':'', 'follows_from_hashtag':'', 'ptr_lnk_hashtag':$('#lnk_hashtag5'), 'hashtag_pk':''}        
    };
    
    $("#upgrade_plane").click(function () {
        $("#myModal_hashtag").modal('hide');    
    });    

    var num_hashtag;
    
    $(".img_hashtag").hover(
            function (e) {
                //modal_alert_message($(e.target).attr('id'))
                $('.img_hashtag').css('cursor', 'pointer');
            },
            function () {
                $('.img_hashtag').css('cursor', 'default');
            }
    );
    
    $("#btn_add_new_hashtag").hover(
        function () {
            $('#btn_add_new_hashtag').css('cursor', 'pointer');
        },
        function () {
            $('#btn_add_new_hashtag').css('cursor', 'default');
    });
   
    $("#img_hashtag0").click(function () {
        if (!(icons_hashtag[0]['login_hashtag']).match("hashtag"))
            delete_hashtag_click(icons_hashtag[0]['login_hashtag']);
    });

    $("#img_hashtag1").click(function () {
        if (!(icons_hashtag[1]['login_hashtag']).match("hashtag"))
            delete_hashtag_click(icons_hashtag[1]['login_hashtag']);
    });

    $("#img_hashtag2").click(function () {
        if (!(icons_hashtag[2]['login_hashtag']).match("hashtag"))
            delete_hashtag_click(icons_hashtag[2]['login_hashtag']);
    });

    $("#img_hashtag3").click(function () {
        if (!(icons_hashtag[3]['login_hashtag']).match("hashtag"))
            delete_hashtag_click(icons_hashtag[3]['login_hashtag']);
    });

    $("#img_hashtag4").click(function () {
        if (!(icons_hashtag[4]['login_hashtag']).match("hashtag"))
            delete_hashtag_click(icons_hashtag[4]['login_hashtag']);
    });

    $("#img_hashtag5").click(function () {
        if (!(icons_hashtag[5]['login_hashtag']).match("hashtag"))
            delete_hashtag_click(icons_hashtag[5]['login_hashtag']);
    });
        
    $("#btn_insert_hashtag").click(function () {        
        if (validate_element('#login_hashtag', '^[a-zA-Z0-9\.-]{1,300}$')) {
            if(num_hashtag < MAX_NUM_HASHTAG) {
                if($('#login_hashtag').val() != '') {                    
                    var l = Ladda.create(this);
                    l.start();
                    $.ajax({
                        url: base_url + 'index.php/welcome/client_insert_hashtag',
                        data: {'hashtag': $('#login_hashtag').val()},
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {
                            if (response['success']) {
                                inser_icons_hashtag(response);
                                $('#login_hashtag').val('');
                                $("#insert_hashtag_form").fadeOut();
                                $("#insert_hashtag_form").css({"visibility": "hidden", "display": "none"});
                                $('#hashtag_message').text('');
                                $('#hashtag_message').css('visibility', 'hidden');
                                if (num_hashtag === MAX_NUM_HASHTAG) {
                                    $('#btn_modal_close').click();
                                }
                            } else {
                                $('#hashtag_message').text(response['message']);
                                $('#hashtag_message').css('visibility', 'visible');
                                $('#hashtag_message').css('color', 'red');   
                            }                            
                            l.stop();
                        },
                        error: function (xhr, status) {
                            $('#hashtag_message').text(T('Não foi possível conectar com o Instagram'));
                            $('#hashtag_message').css('visibility', 'visible');
                            $('#hashtag_message').css('color', 'red');
                            l.stop();
                        }
                    });
                }
            } else {
                $('#hashtag_message').text(T('Alcançou a quantidade máxima.'));
                $('#hashtag_message').css('visibility', 'visible');
                $('#hashtag_message').css('color', 'red');            
            }
        } else {
            $('#hashtag_message').text(T('* O nome do hashtag só pode conter letras, números, sublinhados e pontos.'));
            $('#hashtag_message').css('visibility', 'visible');
            $('#hashtag_message').css('color', 'red');
        }
    });
      
    function delete_hashtag_click(element) {
        if (confirm(T('Deseja eliminar o #') + element + ' ?')) {
            $.ajax({
                url: base_url + 'index.php/welcome/client_desactive_hashtag',
                data: {'hashtag': element},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        delete_icons_hashtag(element);
                    } else
                        modal_alert_message(response['message']);
                },
                error: function (xhr, status) {
                    modal_alert_message(T('Não foi possível conectar com o Instagram'));
                }
            });
        }
    }

    function init_icons_hashtag(datas) {
        response = jQuery.parseJSON(datas);
        prof = response['array_hashtag'];
        //prof = response['array_profiles'];
        if (response['message'] !== 'Hashtags unloaded by Instagram failed connection') {
            num_hashtag = response['N_hashtag'];
            for (i = 0; i < num_hashtag; i++) {
                //if (!(typeof prof[i]==='undefined')) {
                    icons_hashtag[i]['img_hashtag'] = prof[i]['img_hashtag'];
                    icons_hashtag[i]['follows_from_hashtag'] = prof[i]['follows_from_hashtag'];
                    icons_hashtag[i]['login_hashtag'] = prof[i]['login_hashtag'];
                    xxx=prof[i]['hashtag_pk'];
                    icons_hashtag[i]['hashtag_pk'] = prof[i]['hashtag_pk'];
                    icons_hashtag[i]['status_hashtag'] = prof[i]['status_hashtag'];
                    
                    /*icons_hashtag[i]['img_hashtag'] = prof[i]['img_profile'];
                    icons_hashtag[i]['follows_from_hashtag'] = prof[i]['follows_from_profile'];
                    icons_hashtag[i]['login_hashtag'] = prof[i]['login_profile'];
                    icons_hashtag[i]['status_hashtag'] = prof[i]['status_profile'];*/
                //}
            }
            for (j = i; j < MAX_NUM_HASHTAG; j++) {
                icons_hashtag[j]['img_hashtag'] = base_url + 'assets/images/avatar_hashtag_deleted.png';
                icons_hashtag[j]['follows_from_hashtag'] = '0';
                icons_hashtag[j]['login_hashtag'] = 'hashtag' + (j + 1);
                icons_hashtag[j]['status_hashtag'] = '0';
            }
            display_hashtag();
        } else {
            modal_alert_message('Não foi possível comunicar com o Instagram pra verificar seus perfis de referência. Tente depois');
        }
    }

    function display_hashtag() {
        var hashtag_status = false;
        for (i = 0; i < MAX_NUM_HASHTAG; i++) {
            icons_hashtag[i]['ptr_img_obj'].attr("src", icons_hashtag[i]['img_hashtag']);
            icons_hashtag[i]['ptr_img_obj'].prop('title', T('Click para eliminar ') + icons_hashtag[i]['login_hashtag']);
            icons_hashtag[i]['ptr_p_obj'].prop('title', T('Ver ') + icons_hashtag[i]['login_hashtag'] + T(' no Instagram'));
            icons_hashtag[i]['ptr_label_obj'].text(icons_hashtag[i]['follows_from_hashtag']);
            $avatar = (icons_hashtag[i]['login_hashtag']).match("avatar_hashtag_deleted.png");            
             
            icons_hashtag[i]['ptr_p_obj'].text((icons_hashtag[i]['login_hashtag']).replace(/(^.{9}).*$/, '$1...'));

            icons_hashtag[i]['ptr_lnk_hashtag'].attr("href", 'https://www.instagram.com/explore/tags/' + icons_hashtag[i]['login_hashtag'] + '/');

            if (icons_hashtag[i]['status_hashtag'] === 'ended') {
                icons_hashtag[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('O sistema já seguiu todas as pessoas que postaram fotos com o #') + '<b style="color:red">"' + icons_hashtag[i]['login_hashtag'] + '"</b></li>');
                hashtag_status = true;
            } else
            if (icons_hashtag[i]['status_hashtag'] === 'privated') {
                icons_hashtag[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('O #') + '<b style="color:red">"' + icons_hashtag[i]['login_hashtag'] + '"</b>' + T(' passou a ser privado') + '</li>');
                hashtag_status = true;
            } else
            if (icons_hashtag[i]['status_hashtag'] === 'deleted') {
                icons_hashtag[i]['ptr_p_obj'].css({'color': 'red'});
                $('#reference_profile_status_list').append('<li>' + T('O #') + '<b style="color:red">"' + icons_hashtag[i]['login_hashtag'] + '"</b>' + T(' não existe mais no Instragram') + '</li>');
                hashtag_status = true;
            } else
                icons_hashtag[i]['ptr_p_obj'].css({'color': 'black'});
            icons_hashtag[i]['ptr_panel_obj'].css({"visibility": "visible", "display": "block"});
        }
        if (hashtag_status) {
            $('#reference_profile_status_container').css({"visibility": "visible", "display": "block"})
        }
        if (num_hashtag) {
            $('#container_present_hashtag').css({"visibility": "visible", "display": "block"})
            $('#container_missing_hashtag').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_hashtag').css({"visibility": "visible", "display": "block"})
            $('#container_present_hashtag').css({"visibility": "hidden", "display": "none"});
        }
    }

    function inser_icons_hashtag(datas) {
        icons_hashtag[num_hashtag]['img_hashtag'] = datas['img_url'];
        icons_hashtag[num_hashtag]['login_hashtag'] = datas['profile'];
        icons_hashtag[num_hashtag]['follows_from_hashtag'] = datas['follows_from_profile'];//datas['follows_from_hashtag'];
        icons_hashtag[num_hashtag]['status_hashtag'] = datas['status_profile'];//datas['status_hashtag'];
        icons_hashtag[num_hashtag]['hashtag_pk'] = datas['hashtag_pk'];
        
        icons_hashtag[num_hashtag]['ptr_lnk_hashtag'].attr("href", 'https://www.instagram.com/explore/tags/' + datas['profile'] + '/');
        
        num_hashtag = num_hashtag + 1;
        display_hashtag();
        if (num_hashtag) {
            $('#container_present_hashtag').css({"visibility": "visible", "display": "block"})
            $('#container_missing_hashtag').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_hashtag').css({"visibility": "visible", "display": "block"})
            $('#container_present_hashtag').css({"visibility": "hidden", "display": "none"});
        }
    }
    
    function delete_icons_hashtag(name_tag) {
        var i, j;
        for (i = 0; i < num_hashtag; i++) {
            if (icons_hashtag[i]['login_hashtag'] === name_tag)
                break;
        }
        for (j = i; j < MAX_NUM_HASHTAG - 1; j++) {
            icons_hashtag[j]['img_hashtag'] = icons_hashtag[j + 1]['img_hashtag'];
            if ((icons_hashtag[j + 1]['login_hashtag']).match("hashtag")) {
                icons_hashtag[j]['login_hashtag'] = 'hashtag' + (j + 1);
                icons_hashtag[j]['follows_from_hashtag'] = 0;
            } else {
                icons_hashtag[j]['login_hashtag'] = icons_hashtag[j + 1]['login_hashtag'];
                icons_hashtag[j]['follows_from_hashtag'] = icons_hashtag[j + 1]['follows_from_hashtag'];
            }
            icons_hashtag[j]['status_hashtag'] = icons_hashtag[j + 1]['status_hashtag'];
            icons_hashtag[j]['ptr_lnk_hashtag'].attr("href", icons_hashtag[j + 1]['ptr_lnk_hashtag'].attr("href"));
            icons_hashtag[j]['hashtag_pk'] = icons_hashtag[j+1]['hashtag_pk'];
        }
        icons_hashtag[j]['img_hashtag'] = base_url + 'assets/images/avatar_hashtag_deleted.png';
        icons_hashtag[j]['login_hashtag'] = 'hashtag' + (j + 1);
        icons_hashtag[j]['follows_from_hashtag'] = 0;
        icons_hashtag[j]['ptr_lnk_hashtag'].attr("href", "");
        icons_hashtag[j]['hashtag_pk']='';
        num_hashtag = num_hashtag - 1;
        display_hashtag();

        if (num_hashtag) {
            $('#container_present_hashtag').css({"visibility": "visible", "display": "block"})
            $('#container_missing_hashtag').css({"visibility": "hidden", "display": "none"});
        } else {
            $('#container_missing_hashtag').css({"visibility": "visible", "display": "block"})
            $('#container_present_hashtag').css({"visibility": "hidden", "display": "none"});
        }
    }
    
    $('#modal_container_add_hashtag').keypress(function (e) {
        if (e.which == 13) {
            $("#table_search_hashtag").empty();
            $("#btn_insert_hashtag").click();
            return false;
        }
    });
    
    init_icons_hashtag(profiles);
    
    $('#login_hashtag').keyup(function() {
        $.ajax({
            url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=%23' + $('#login_hashtag').val(),
            data: {},
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#table_search_hashtag").empty();
                $('#hashtag_message').css('visibility', 'hidden');
                if (response['has_more']) {
                    var i = 0;
                    var hashtag_name;
                    while (response['hashtags'][i]) {
                        hashtag_name = response['hashtags'][i]['hashtag']['name'];
                        $("#table_search_hashtag").append("<tr class='row' id='row_tag_"+i+"'>");
                        $("#table_search_hashtag").append("<td class='col' id='col_tag_"+i+"' style='text-align: left'><div class='tt-suggestion' onclick='select_hashtag_from_search(\"" + hashtag_name + "\");'>" +
                            "<strong>#" + hashtag_name+"</strong><br><span style='color: gray;'>"+
                            response['hashtags'][i]['hashtag']['media_count'] + T(' publicações') + "</span></div></td></tr>");
                        i++;
                    }
                    
                } else {
                    if ($('#login_hashtag').val() !== '') {
                        $("#table_search_hashtag").append("<tr class='row'><td class='col'>"+T('Nenhum resultado encontrado.')+"</td></tr>");
                        $('#hashtag_message').css('visibility', 'hidden');
//                        $('#hashtag_message').text('Nenhum resultado encontrado.');
//                        $('#hashtag_message').css('visibility', 'visible');
//                        $('#hashtag_message').css('color', 'red');  
                    }
                }
            },
            error: function (xhr, status) {
                $('#hashtag_message').text(T('Não foi possível conectar com o Instagram'));
                $('#hashtag_message').css('visibility', 'visible');
                $('#hashtag_message').css('color', 'red');
            }
        });
    });
    
    $('#login_geolocalization').keyup(function() {
        $.ajax({
            url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $('#login_geolocalization').val(),
            data: {},
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#table_search_geolocalization").empty();
                $('#geolocalization_message').css('visibility', 'hidden');
                if (response['places'].length !== 0) {
                    var i = 0;
                    var location_name, location_address, location_city, place_slug;
                    while (response['places'][i]) {
                        location_name = response['places'][i]['place']['location']['name'];
                        location_address = response['places'][i]['place']['location']['address'];
                        location_city = response['places'][i]['place']['location']['city'];
                        place_slug = response['places'][i]['place']['slug'];
                        $("#table_search_geolocalization").append("<tr class='row' id='row_geo_"+i+"'>");
                        $("#table_search_geolocalization").append("<td class='col' id='col_1_geo_"+i+"'>"+
                            "<div><span style='font-size: 30px; color:gray; margin-top: 10px;' class='glyphicon glyphicon-map-marker'></span></div></td>");
                        $("#table_search_geolocalization").append("<td class='col' id='col_2_geo_"+i+"' style='text-align: left; vertical-align: middle;'>" +
                            "<div class='tt-suggestion' style='text-align: left; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 50px;' onclick='select_geolocalization_from_search(\"" + place_slug + "\");'>" +
                                "<strong>" + location_name + "</strong><br><span style='color: gray;'>"+
                                location_address +
                                ((location_address && location_city) ? ", " : "") +
                                location_city + "</span></div></td></tr>");
                        i++;
                    }
                    
                } else {
                    if ($('#login_geolocalization').val() !== '') {
                        $("#table_search_geolocalization").append("<tr class='row'><td class='col'>"+T('Nenhum resultado encontrado.')+"</td></tr>");
                        $('#geolocalization_message').css('visibility', 'hidden');
                    }
                }
            },
            error: function (xhr, status) {
                $('#geolocalization_message').text(T('Não foi possível conectar com o Instagram'));
                $('#geolocalization_message').css('visibility', 'visible');
                $('#geolocalization_message').css('color', 'red');
            }
        });
    });
    
    $('#login_profile').keyup(function() {
        $.ajax({
            url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $('#login_profile').val(),
            data: {},
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#table_search_profile").empty();
                $('#reference_profile_message').css('visibility', 'hidden');
                if (response['users'].length !== 0) {
                    var i = 0;
                    var username, full_name, profile_pic_url, is_verified;
                    while (response['users'][i]) {
                        username = response['users'][i]['user']['username'];
                        full_name = response['users'][i]['user']['full_name'];
                        profile_pic_url = response['users'][i]['user']['profile_pic_url'];
                        is_verified = response['users'][i]['user']['is_verified'];
                        $("#table_search_profile").append("<tr class='row' id='row_prof_"+i+"'>");
                        $("#table_search_profile").append("<td class='col' id='col_1_prof_"+i+"'>"+
                            "<img style='border: solid 1px #efefef; border-radius: 40px; height: 40px; width: 40px; margin: 10px 0 0 0;' src='" + profile_pic_url + "' onclick='select_profile_from_search(\"" + username + "\");'>");
                        $("#table_search_profile").append("<td class='col' id='col_2_prof_"+i+"' style='text-align: left;'>"+
                            "<div class='tt-suggestion' style='text-align: left; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 50px;' onclick='select_profile_from_search(\"" + username + "\");'>"+
                                "<div><span><strong>" + username + "</strong></span>" +
                                ((is_verified) ? "<span style='color: blue' class='glyphicon glyphicon-certificate'></span>" : "") +
                                "</div><span style='color: gray;'>" + full_name + "</span></div></td></tr>");
                        i++;
                    }
                    
                } else {
                    if ($('#login_profile').val() !== '') {
                        $("#table_search_profile").append("<tr class='row'><td class='col'>"+T('Nenhum resultado encontrado.')+"</td></tr>");
                        $('#reference_profile_message').css('visibility', 'hidden');
                    }
                }
            },
            error: function (xhr, status) {
                $('#reference_profile_message').text(T('Não foi possível conectar com o Instagram'));
                $('#reference_profile_message').css('visibility', 'visible');
                $('#reference_profile_message').css('color', 'red');
            }
        });
    });
}); 

function select_hashtag_from_search(tag_name) {
    $('#login_hashtag').val(tag_name);
    $("#table_search_hashtag").empty();
}

function select_geolocalization_from_search(geo_name) {
    $('#login_geolocalization').val(geo_name);
    $("#table_search_geolocalization").empty();
}

function select_profile_from_search(prof_name) {
    $('#login_profile').val(prof_name);
    $("#table_search_profile").empty();
}