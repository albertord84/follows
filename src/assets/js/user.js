$(document).ready(function(){   
    
    function modal_alert_message(text_message){
        $('#modal_alert_message').modal('show');
        $('#message_text').text(text_message);        
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    $("#btn_dumbu_login1").click(function() {
        $("#btn_dumbu_login1").css({'cursor':'wait'});
        do_login('#userLogin1','#userPassword1', '#container_login_message1', 
                 '#container_login_force_login1', '#check_force_login1', '#message_force_login1',this);
        $('#btn_dumbu_login1').css({'cursor':'pointer'});
    });
    
    $("#btn_dumbu_login2").click(function() {        
        do_login('#userLogin2','#userPassword2', '#container_login_message2', 
                 '#container_login_force_login2', '#check_force_login2', '#message_force_login2',this);
    });
    
    $('#google_conversion_frame').ready(function(){        
        $('#google_conversion_frame').css({"float": "none","display":"none"});
    });
        
    function do_login(fieldLogin,fieldPass, fieldErrorMessage, fieldContainerLoginForce, fieldCheckForceLogin, fieldMessageForceLogin, object){  
        if($(fieldLogin).val()!='' && $(fieldPass).val()!==''){
            if(validate_element(fieldLogin,'^[a-zA-Z0-9\._]{1,300}$')){
                var l = Ladda.create(object);  l.start();
                $(fieldErrorMessage).text(T('Espere por favor, conferindo credenciais!!'));
                $(fieldErrorMessage).css('visibility','visible');
                $(fieldErrorMessage).css('color','green');
                var force_login = false;                
                if($(fieldCheckForceLogin).prop('checked'))
                    force_login = true;                
                $.ajax({
                    //url : base_url+'index.php/welcome/md',
                    url : base_url+'index.php/welcome/user_do_login',      
                    data : {
                        'user_login':$(fieldLogin).val(),
                        'user_pass': $(fieldPass).val(),
                        'force_login': force_login
                    },
                    type : 'POST',
                    dataType : 'json',
                    async: false,
                    success : function(response) {
                        if(response['authenticated']){
                            if(response['role']=='CLIENT'){
                                $(location).attr('href',base_url+'index.php/welcome/'+response['resource']+'');
                            }
                        } else
                        if(response['cause']=='force_login_required'){
                            $(fieldErrorMessage).text(response['message']);
                            $(fieldErrorMessage).css('visibility','visible');
                            $(fieldErrorMessage).css('color','red');
                            $(fieldMessageForceLogin).text(response['message_force_login']);                            
                            $(fieldContainerLoginForce).css('visibility','visible');
                            $(fieldContainerLoginForce).css('color','red');
                            l.stop();
                        } else{                            
                        if(response['cause']=='phone_verification_settings') {
                            $(fieldErrorMessage).text(response['message']);
                            $(fieldErrorMessage).css('visibility','visible');
                            $(fieldContainerLoginForce).css('visibility','hidden');
                            $(fieldErrorMessage).css('color','red');
                            l.stop();
                        } else
                        if(response['cause']=='empty_message'){
                            $(fieldErrorMessage).text(response['message']);
                            $(fieldErrorMessage).css('visibility','visible');
                            $(fieldContainerLoginForce).css('visibility','hidden');
                            $(fieldErrorMessage).css('color','red');
                            l.stop();
                        } else 
                        if(response['cause']=='unknow_message'){
                            $(fieldErrorMessage).text(response['message']);
                            $(fieldErrorMessage).css('visibility','visible');
                            $(fieldContainerLoginForce).css('visibility','hidden');
                            $(fieldErrorMessage).css('color','red');
                            l.stop();
                        }
                        else{
                            $(fieldErrorMessage).text(response['message']);
                            $(fieldErrorMessage).css('visibility','visible');
                            $(fieldContainerLoginForce).css('visibility','hidden');
                            $(fieldErrorMessage).css('color','red');
                            l.stop();   
                        }                                
                        }
                    },                
                    error : function(xhr, status) {
                        modal_alert_message(T('Não foi possível comunicar com o Instagram. Confira sua conexão com Intenet e tente novamente'));    
                        l.stop();
                    }
                });   
            } else{
                $(fieldErrorMessage).text(T('O nome de um perfil só pode conter combinações de letras, números, sublinhados e pontos.'));
                $(fieldErrorMessage).css('visibility','visible');
                $(fieldErrorMessage).css('color','red');
            }       
        } else{
            $(fieldErrorMessage).text(T('Deve preencher todos os dados corretamente.'));
            $(fieldErrorMessage).css('visibility','visible');
            $(fieldErrorMessage).css('color','red');
        }
    }
    
     $('#login_container1').keypress(function (e) {
        if (e.which == 13) {
            $("#btn_dumbu_login1").click();
            return false;
        }
    });
    
    $('#login_container2').keypress(function (e) {
        if (e.which == 13) {
            $("#btn_dumbu_login2").click();
            return false;
        }
    });
    
    $('.dropdown').on('shown.bs.dropdown', function(){
        document.getElementById("userLogin2").focus();
    });
        
    $(".help").click(function(){
        url=base_url+"index.php/welcome/help?language="+language;
        window.open(url, '_blank');
    });
    
    $("#lnk_faq_function1").click(function(){
        url=base_url+"index.php/welcome/FAQ_function?language="+language;
        window.open(url, '_blank');
    });
    
     $("#lnk_faq_function2").click(function(){
        url=base_url+"index.php/welcome/FAQ_function?language="+language;
        window.open(url, '_blank');
    });
    
    $("#lnk_voltar").click(function(){
        url=base_url+"?language="+language;
        window.open(url, '_blank');
    });
    
     $("#fechar_faq").click(function(){
        window.close();
    });
    
    $("#fechar_faq2").click(function(){
        window.close();
    });
    
    $(".help").hover(
        function(){
            $('.help').css('cursor', 'pointer');
        },
        function(){
            $('.help').css('cursor', 'default');
        }
    );
    
    
    $("#login").click(function(){
        $("#usersLoginForm").fadeIn();
        $("#usersLoginForm").css({"visibility":"visible","display":"block"});
    });
    
    $("#userCloseLogin").click(function(){
        $("#usersLoginForm").fadeOut();
        $("#usersLoginForm").css({"visibility":"hidden","display":"none"});
    });     
    
    $('#promotional_btn').hover(
        function () { $(this).css({"border":"1px solid silver"});}, 
        function () { $(this).css({"border":"1px solid #28BB93"});}
     ); 
    
    $('#signin_btn_insta_login').css({"color":"white"});
    
    $('#botao-assinar').hover(
        function () { 
            $(this).attr("src",base_url+"assets/img/BOTAO ASSINAR AGORA-hover.png")
            $(this).css({"cursor":"pointer"})
        }, 
        function () {$(this).attr("src",base_url+"assets/img/BOTAO ASSINAR AGORA.png")}
     ); 
     
    $('#botao-assinar').mousedown(function(){
        $("#botao-assinar").attr("src",base_url+"assets/img/BOTAO ASSINAR AGORA-mdown.png");
    });
    $('#botao-assinar').mouseup(function(){
        $("#botao-assinar").attr("src",base_url+"assets/img/BOTAO ASSINAR AGORA.png");
    });
    
     
    $('#img_to_promotional_btn').mousedown(function(){
        $("#img_to_promotional_btn").attr("src",base_url+"assets/img/black-friday/assinar_agora_black_friday_mouse_down.png");
    });
    $('#img_to_promotional_btn').mouseup(function(){
        $("#img_to_promotional_btn").attr("src",base_url+"assets/img/black-friday/assinar_agora_black_friday.png");
    });
    $('#img_to_promotional_btn').hover(
        function () { 
                $("#img_to_promotional_btn").attr("src",base_url+"assets/img/black-friday/assinar_agora_black_friday_mouse_over.png");
            }, 
        function () { 
                $("#img_to_promotional_btn").attr("src",base_url+"assets/img/black-friday/assinar_agora_black_friday.png");
            }
     ); 
    
    $('#signin_btn').hover(
        function () { $(this).css({"border":"1px solid silver"}); }, 
        function () { $(this).css({"border":"2px solid #28BB93"});}
     );
    
    
     function validate_element(element_selector,pattern){
        if(!$(element_selector).val().match(pattern)){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }    
    
    
    $("#lnk_language1").click(function () {
        //alert($('#img_language1').attr('src'));
    });
    
    $("#lnk_language2").click(function () {
//        img_tmp=$('#img_language1').attr('src');
//        txt_tmp=$('#txt_language1').text();        
//        $("#img_language1").attr("src",$("#img_language2").attr('src'));
//        $("#txt_language1").text($("#txt_language2").text());        
//        $("#img_language2").attr("src",img_tmp);
//        $("#txt_language2").text(txt_tmp);
//        $(location).attr("href",base_url+"index.php?language="+$("#txt_language1").text());
       $(location).attr("href",base_url+"index.php?language="+$("#txt_language2").text());
        
    });
    $("#lnk_language3").click(function () {
//        img_tmp=$('#img_language1').attr('src');
//        txt_tmp=$('#txt_language1').text();        
//        $("#img_language1").attr("src",$("#img_language3").attr('src'));
//        $("#txt_language1").text($("#txt_language3").text());        
//        $("#img_language3").attr("src",img_tmp);
//        $("#txt_language3").text(txt_tmp);
//        $(location).attr("href",base_url+"index.php?language="+$("#txt_language1").text()); 
        $(location).attr("href",base_url+"index.php?language="+$("#txt_language3").text()); 
    });
    

    $("#lnk_language2_cell").click(function () {
       $(location).attr("href",base_url+"index.php?language="+$("#txt_language2").text());
    });
    
    $("#lnk_language3_cell").click(function () {
       $(location).attr("href",base_url+"index.php?language="+$("#txt_language3").text());
    });
    
    $("#lnk_language1faq").click(function () {
        //alert($('#img_language1').attr('src'));
    });
    
    
    $("#lnk_language2faq").click(function () {
//        img_tmp=$('#img_language1').attr('src');
//        txt_tmp=$('#txt_language1').text();        
//        $("#img_language1").attr("src",$("#img_language2").attr('src'));
//        $("#txt_language1").text($("#txt_language2").text());        
//        $("#img_language2").attr("src",img_tmp);
//        $("#txt_language2").text(txt_tmp);
//        $(location).attr("href",base_url+"index.php?language="+$("#txt_language1").text());
       $(location).attr("href",base_url+"index.php/welcome/FAQ_function?language="+$("#txt_language2").text());
        
    });
    $("#lnk_language3faq").click(function () {
//        img_tmp=$('#img_language1').attr('src');
//        txt_tmp=$('#txt_language1').text();        
//        $("#img_language1").attr("src",$("#img_language3").attr('src'));
//        $("#txt_language1").text($("#txt_language3").text());        
//        $("#img_language3").attr("src",img_tmp);
//        $("#txt_language3").text(txt_tmp);
//        $(location).attr("href",base_url+"index.php?language="+$("#txt_language1").text()); 
        $(location).attr("href",base_url+"index.php/welcome/FAQ_function?language="+$("#txt_language3").text()); 
    });
    $("#lnk_language2_cellfaq").click(function () {
       $(location).attr("href",base_url+"index.php/welcome/FAQ_function?language="+$("#txt_language2").text());
    });
    $("#lnk_language3_cellfaq").click(function () {
       $(location).attr("href",base_url+"index.php/welcome/FAQ_function?language="+$("#txt_language3").text());
    });
    
    $(".accordion-titulo").click(function(e){
           
        e.preventDefault();
    
        var contenido=$(this).next(".accordion-content");

        if(contenido.css("display")=="none"){ //open        
          contenido.slideDown(250);         
          $(this).addClass("open");
        }
        else{ //close       
          contenido.slideUp(250);
          $(this).removeClass("open");  
        }

      });
     
    $('#check_force_login2').prop('checked', false);
    $('#check_force_login1').prop('checked', false);   
    
 }); 