$(document).ready(function(){
    
    function modal_alert_message(text_message){
        $('#modal_alert_message').modal('show');
        $('#message_text').text(text_message);        
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    $("#btn_send_message").click(function(){
        name=validate_empty('#visitor_name');
        email=validate_element('#visitor_email',"^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,4}$");
        message=validate_empty('#visitor_message');
          if(name && email && message){
            var l = Ladda.create(this);  l.start(); l.start();
            $.ajax({
                url : base_url+'index.php/welcome/message',
                data :{ 'name':$("#visitor_name").val(),
                        'company':$("#visitor_company").val(),
                        'email':$("#visitor_email").val(),
                        'telf':$("#visitor_phone").val(),
                        'message':$("#visitor_message").val()
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response['success']){                        
                        modal_alert_message(response['message']);                        
                    } else
                        modal_alert_message(response['message']);    
                    l.stop();
                    $("#visitor_name").val("");
                    $("#visitor_company").val("");
                    $("#visitor_email").val("");
                    $("#visitor_phone").val("");
                    $("#visitor_message").val(""); 
                },
                error : function(xhr, status) {
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                    l.stop();
                    
                    $("#visitor_name").val("");
                    $("#visitor_company").val("");
                    $("#visitor_email").val("");
                    $("#visitor_phone").val("");
                    $("#visitor_message").val(""); 
                }                
            });
        } else{
            modal_alert_message(T('Alguns dados incorretos'));            
        }
                             
    });
    
              
    $('#talkme_frm').keypress(function (e) {
        if (e.which == 13) {
            $("#btn_send_message").click();
            return false;
        }
    });
    
    
        
    function validate_element(element_selector,pattern){
        if(!$(element_selector).val().match(pattern)){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    } 
    
     function validate_empty(element_selector){
        if($(element_selector).val()===''){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    } 
 }); 