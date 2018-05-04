$(document).ready(function(){
    
    function modal_alert_message(text_message){
        $('#modal_alert_message').modal('show');
        $('#message_text').text(text_message);        
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    var icons_profiles={            
        0:{'ptr_img_obj':$('#img_ref_prof0'),'ptr_p_obj':$('#name_ref_prof0'),  'ptr_label_obj':$('#cnt_follows_prof0'),     'ptr_panel_obj':$('#reference_profile0'),'img_profile':'','login_profile':'','status_profile':'', 'follows_from_profile':'',  'ptr_lnk_ref_prof':$('#lnk_ref_prof0')},
        1:{'ptr_img_obj':$('#img_ref_prof1'),'ptr_p_obj':$('#name_ref_prof1'),  'ptr_label_obj':$('#cnt_follows_prof1'),     'ptr_panel_obj':$('#reference_profile1'),'img_profile':'','login_profile':'','status_profile':'', 'follows_from_profile':'',  'ptr_lnk_ref_prof':$('#lnk_ref_prof1')},
        2:{'ptr_img_obj':$('#img_ref_prof2'),'ptr_p_obj':$('#name_ref_prof2'),  'ptr_label_obj':$('#cnt_follows_prof2'),     'ptr_panel_obj':$('#reference_profile2'),'img_profile':'','login_profile':'','status_profile':'', 'follows_from_profile':'',  'ptr_lnk_ref_prof':$('#lnk_ref_prof2')}        
    };
        
    var num_profiles=0, MAX_NUM_PROFILES=3;
    var verify=false, flag=false;
    
    $('#btn_add_new_profile').mousedown(function(){
        $("#btn_add_new_profile").attr("src",base_url+"assets/images/+down.png");
    });
    
    $('#btn_add_new_profile').mouseup(function(){
        $("#btn_add_new_profile").attr("src",base_url+"assets/images/+.png");
    });
    
    $("#btn_add_new_profile").click(function(){
        if(num_profiles<MAX_NUM_PROFILES){
            $('#login_profile').val('');
            $('#reference_profile_message').text(T('Não foi possível conectar com o Instagram'));
            $('#reference_profile_message').css({'visibility':'hidden','display':'none'});
            $('#login_profile').css('border-color','gray');
            $("#MyModal").modal('show').css(
                {
                    'margin-top': function () {
                        return -($(this).height() / 2);
                    },
                    'margin-left': function () {
                        return -($(this).width() / 2);
                    }
                })
        } else
            modal_alert_message(T('Alcançou a quantidade maxima permitida'));
    });
        
    
    $("#btn_insert_profile").click(function(){
        if(validate_element('#login_profile','^[a-zA-Z0-9\._]{1,300}$')){                
            if(num_profiles<MAX_NUM_PROFILES){
                if($('#login_profile').val()!=''){
                    if ($('#login_profile').val() != client_login_profile) {
                        var l = Ladda.create(this);  l.start();
                        $.ajax({
                            url : base_url+'index.php/welcome/client_insert_profile',
                            data : {'profile':$('#login_profile').val()},
                            type : 'POST',
                            dataType : 'json',
                            success : function(response){
                                if(response['success']){
                                    inser_icons_profiles(response);
                                    $('#login_profile').val('');
                                    $("#insert_profile_form").fadeOut();
                                    $("#insert_profile_form").css({"visibility":"hidden","display":"none"});                            
                                    $('#reference_profile_message').text('');
                                    $('#reference_profile_message').css({'visibility':'hidden','display':'none'});
                                    if(num_profiles==MAX_NUM_PROFILES){
                                        $('#btn_modal_close').click();
                                        modal_alert_message(T('Otimo! Agora pode continuar e entrar no painel do cliente.'));
                                    }                                    
                                } else{
                                    $('#reference_profile_message').text(response['message']);
                                    $('#reference_profile_message').css({'visibility':'visible','display':'block'});
                                    $('#reference_profile_message').css('color','red');
                                    //modal_alert_message(response['message']);                        
                                }
                                l.stop();
                            },
                            error : function(xhr, status) {
                                $('#reference_profile_message').text(T('Não foi possível conectar com o Instagram'));
                                $('#reference_profile_message').css({'visibility':'visible','display':'block'});
                                $('#reference_profile_message').css('color','red');
                                l.stop();
                            }
                        });
                    } else {
                        $('#reference_profile_message').text(T('Não pode escolher seu próprio perfil como referência.'));
                        $('#reference_profile_message').css({'visibility':'visible','display':'block'});
                        $('#reference_profile_message').css('color', 'red');
                    }
                }
            } else{
                $('#reference_profile_message').text(T('Alcançou a quantidade maxima.'));
                $('#reference_profile_message').css({'visibility':'visible','display':'block'});
                $('#reference_profile_message').css('color','red');
                //modal_alert_message('Alcançou a quantidade maxima permitida');
            }
        } else{
            $('#reference_profile_message').text(T('* O nome do perfil só pode conter letras, números, sublinhados e pontos.'));
            $('#reference_profile_message').css({'visibility':'visible','display':'block'});
            $('#reference_profile_message').css('color','red');
            //modal_alert_message('O nome de um perfil só pode conter combinações de letras, números, sublinhados e pontos.');
        }        
    });
        
    function delete_profile_click(element){
       if(confirm(T('Deseja elimiar o perfil de referência ')+element)){
            $.ajax({
                url : base_url+'index.php/welcome/client_desactive_profiles',
                data : {'profile':element},
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response['success']){
                        delete_icons_profiles(element);
                    } else
                        modal_alert_message(response['message']);
                },
                error : function(xhr, status) {
                    modal_alert_message(T('Não foi possível conectar com o Instagram'));
                }
            });
        }
   }
    
    function init_icons_profiles(datas){
        response=jQuery.parseJSON(datas);
        prof=response['array_profiles'];
        num_profiles=response['N'];
        for(i=0;i<num_profiles;i++){
            icons_profiles[i]['img_profile']=prof[i]['img_profile'];
            icons_profiles[i]['follows_from_profile']=prof[i]['follows_from_profile'];
            icons_profiles[i]['login_profile']=prof[i]['login_profile'];
            icons_profiles[i]['status_profile']=prof[i]['status_profile'];                        
        }
        for(j=i;j<MAX_NUM_PROFILES;j++){
            icons_profiles[j]['img_profile']=base_url+'assets/images/avatar.png';
            icons_profiles[j]['follows_from_profile']='0';
            icons_profiles[j]['login_profile']='perfilderef'+(j+1);
            icons_profiles[j]['status_profile']='0';                        
        }
        display_reference_profiles();
    }
    
    function display_reference_profiles(){
        var reference_profiles_status=false;
        for(i=0;i<MAX_NUM_PROFILES;i++){
            icons_profiles[i]['ptr_img_obj'].attr("src",icons_profiles[i]['img_profile']);            
            icons_profiles[i]['ptr_img_obj'].prop('title', T('Click para eliminar ')+icons_profiles[i]['login_profile']);
            icons_profiles[i]['ptr_p_obj'].prop('title', T('Ver ')+icons_profiles[i]['login_profile']+T(' no Instagram'));
            icons_profiles[i]['ptr_label_obj'].text(icons_profiles[i]['follows_from_profile']);  
            $avatar=(icons_profiles[i]['login_profile']).match("avatar.png");
            if($avatar)
                icons_profiles[i]['ptr_p_obj'].text((icons_profiles[i]['login_profile']).replace(/(^.{9}).*$/,'$1...'));
            else
                icons_profiles[i]['ptr_p_obj'].text((icons_profiles[i]['login_profile']));
            icons_profiles[i]['ptr_lnk_ref_prof'].attr("href",'https://www.instagram.com/'+icons_profiles[i]['login_profile']+'/');                         
            
            if(icons_profiles[i]['status_profile']==='ended'){
                icons_profiles[i]['ptr_p_obj'].css({'color':'red'});
                $('#reference_profile_status_list').append('<li>'+T('O sistema já seguiu todos os seguidores do perfil de referência ')+'<b style="color:red">"'+icons_profiles[i]['login_profile']+'"</b></li>');
                reference_profiles_status=true;
            } else
            if(icons_profiles[i]['status_profile']==='privated'){
                icons_profiles[i]['ptr_p_obj'].css({'color':'red'});
                $('#reference_profile_status_list').append('<li>'+T('O perfil de referência ')+'<b style="color:red">"'+icons_profiles[i]['login_profile']+'"</b>'+T(' passou a ser privado')+'</li>');
                reference_profiles_status=true;
            } else
            if(icons_profiles[i]['status_profile']==='deleted'){
                icons_profiles[i]['ptr_p_obj'].css({'color':'red'});
                $('#reference_profile_status_list').append('<li>'+T('O perfil de referência ')+'<b style="color:red">"'+icons_profiles[i]['login_profile']+'"</b>'+T(' não existe mais no Instragram')+'</li>');
                reference_profiles_status=true;
            }else
                icons_profiles[i]['ptr_p_obj'].css({'color':'black'});
            icons_profiles[i]['ptr_panel_obj'].css({"visibility":"visible","display":"block"});
        }
        if(reference_profiles_status){
            $('#reference_profile_status_container').css({"visibility":"visible","display":"block"})
        }
        if(num_profiles){
            $('#container_present_profiles').css({"visibility":"visible","display":"block"})
            $('#container_missing_profiles').css({"visibility":"hidden","display":"none"});
        } else{
            $('#container_missing_profiles').css({"visibility":"visible","display":"block"})
            $('#container_present_profiles').css({"visibility":"hidden","display":"none"});
        }
    }
        
    function inser_icons_profiles(datas){
        icons_profiles[num_profiles]['img_profile']=datas['img_url'];
        icons_profiles[num_profiles]['login_profile']=datas['profile'];
        icons_profiles[num_profiles]['follows_from_profile']=datas['follows_from_profile'];
        icons_profiles[num_profiles]['status_profile']=datas['status_profile'];
        icons_profiles[num_profiles]['ptr_lnk_ref_prof'].attr("href",'https://www.instagram.com/'+datas['profile']+'/');         
        num_profiles=num_profiles+1;
        display_reference_profiles();
        if(num_profiles){
            $('#container_present_profiles').css({"visibility":"visible","display":"block"})
            $('#container_missing_profiles').css({"visibility":"hidden","display":"none"});
        } else{
            $('#container_missing_profiles').css({"visibility":"visible","display":"block"})
            $('#container_present_profiles').css({"visibility":"hidden","display":"none"});
        }
    }
    
    function delete_icons_profiles(name_profile){
        var i,j;
        for(i=0;i<num_profiles;i++){
            if(icons_profiles[i]['login_profile']===name_profile)
                break;
        }
        for(j=i;j<MAX_NUM_PROFILES-1;j++){
            icons_profiles[j]['img_profile']=icons_profiles[j+1]['img_profile'];
            if((icons_profiles[j+1]['login_profile']).match("perfilderef"))
                icons_profiles[j]['login_profile']='perfilderef'+(j+1);
            else
                icons_profiles[j]['login_profile']=icons_profiles[j+1]['login_profile'];            
            icons_profiles[j]['follows_from_profile']=icons_profiles[j+1]['follows_from_profile'];
            icons_profiles[j]['status_profile']=icons_profiles[j+1]['status_profile'];
            icons_profiles[j]['ptr_lnk_ref_prof'].attr("href",icons_profiles[j+1]['ptr_lnk_ref_prof'].attr("href"));                        
        }        
        icons_profiles[j]['img_profile']=base_url+'assets/images/avatar.png';
        icons_profiles[j]['login_profile']='perfilderef'+(j+1);
        icons_profiles[j]['follows_from_profile']='';
        icons_profiles[j]['ptr_lnk_ref_prof'].attr("href","");
        num_profiles=num_profiles-1;
        display_reference_profiles();
        
        if(num_profiles){
            $('#container_present_profiles').css({"visibility":"visible","display":"block"})
            $('#container_missing_profiles').css({"visibility":"hidden","display":"none"});
        } else{
            $('#container_missing_profiles').css({"visibility":"visible","display":"block"})
            $('#container_present_profiles').css({"visibility":"hidden","display":"none"});
        }
    }
    
    function validate_element(element_selector,pattern){
        if(!$(element_selector).val().match(pattern)){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
    
    $('#modal_container_add_reference_rpofile').keypress(function (e) {
        if (e.which == 13) {
            $("#btn_insert_profile").click();
            return false;
        }
    });
    
    $("#img_ref_prof0").click(function(){
        if(!(icons_profiles[0]['login_profile']).match("perfilderef"))
            delete_profile_click(icons_profiles[0]['login_profile']);
    });
    
    $("#img_ref_prof1").click(function(){
        if(!(icons_profiles[1]['login_profile']).match("perfilderef")) 
            delete_profile_click(icons_profiles[1]['login_profile']);
    });
    
    $("#img_ref_prof2").click(function(){
        if(!(icons_profiles[2]['login_profile']).match("perfilderef"))
            delete_profile_click(icons_profiles[2]['login_profile']);
    });
    
    $("#continuar_purchase").click(function(){
        if(num_profiles==0)
            modal_alert_message(T('Deve adicionar pelo menos um Perfil de Referência para continuar.'));
        else{
            var l = Ladda.create(this);  l.start();
            $(location).attr('href',base_url+'index.php/welcome/client?language='+language); 
        }
    });
    
    $("#btn_add_new_profile").hover(
        function(){
            $('#btn_add_new_profile').css('cursor', 'pointer');
        },
        function(){
            $('#btn_add_new_profile').css('cursor', 'default');
        }
    );
    
    $("#img_ref_prof0").hover(
        function(){
            str=$('#img_ref_prof0').attr('src');
            expr= "avatar.png";
            if(!str.match(expr)){
                $('#img_ref_prof0').css('cursor', 'pointer');
            }
        },
        function(){
            $('#img_ref_prof0').css('cursor', 'default');
        }
    );
    
    $("#img_ref_prof1").hover(
        function(){
            str=$('#img_ref_prof1').attr('src');
            expr= "avatar.png";
            if(!str.match(expr)){
                $('#img_ref_prof1').css('cursor', 'pointer');
            }
        },
        function(){
            $('#img_ref_prof1').css('cursor', 'default');
        }
    );
    
    $("#img_ref_prof2").hover(
        function(){
            str=$('#img_ref_prof2').attr('src');
            expr= "avatar.png";
            if(!str.match(expr)){
                $('#img_ref_prof2').css('cursor', 'pointer');
            }
        },
        function(){
            $('#img_ref_prof2').css('cursor', 'default');
        }
    );
    
    init_icons_profiles(profiles); 
    
 }); 
 
 
 