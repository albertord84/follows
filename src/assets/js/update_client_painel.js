$(document).ready(function(){  
    
    function modal_alert_message(text_message){
        $('#modal_alert_message').modal('show');
        $('#message_text').text(text_message);        
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    /*$("#credit_card_name").val(upgradable_datas['credit_card_name']);    
    $("#credit_card_number").val(upgradable_datas['credit_card_number']);
    $("#credit_card_cvc").val(upgradable_datas['credit_card_cvc']);
    $("#credit_card_exp_month").val(upgradable_datas['credit_card_exp_month']);
    $("#credit_card_exp_year").val(upgradable_datas['credit_card_exp_year']);
    $("#client_email").val(upgradable_datas['email']);*/
    
    $("#btn_cancel_update_datas").click(function() {
        $(location).attr('href',base_url+'index.php/welcome/reload_panel_client');
    });
    
    $("#btn_send_update_datas").click(function() {
        var name=validate_element('#credit_card_name', "^[A-Z ]{4,50}$");
        var email=validate_element('#client_email',"^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,4}$");        
        var number=validate_element('#credit_card_number',"^[0-9]{10,20}$");
        var cvv=validate_element('#credit_card_cvc',"^[0-9 ]{3,5}$");
        var month=validate_month('#credit_card_exp_month',"^[0-10-9]{2,2}$");
        var year=validate_year('#credit_card_exp_year',"^[2-20-01-20-9]{4,4}$");        
        if(name && email && number && cvv && month && year){
            var l = Ladda.create(this);  l.start(); l.start();
            $.ajax({
                url : base_url+'index.php/welcome/update_client_datas',
                data : {
                    'client_email':$('#client_email').val(),
                    'credit_card_number':$('#credit_card_number').val(),
                    'credit_card_cvc':$('#credit_card_cvc').val(),
                    'credit_card_name':$('#credit_card_name').val(),
                    'credit_card_exp_month':$('#credit_card_exp_month').val(),
                    'credit_card_exp_year':$('#credit_card_exp_year').val(),
                    'client_update_plane':$('#client_update_plane').val()
                },
                type : 'POST',
                dataType : 'json',
                success : function(response) {
                    if(response['success']){
                        modal_alert_message(response['message']);
                        $(location).attr('href',base_url+'index.php/welcome/client');
                    } else{
                        modal_alert_message(response['message']);
                    }
                    l.stop();
                },
                error : function(xhr, status) {
                    l.stop();
                }
            });
        } else{
            modal_alert_message(T('Erro nos dados fornecidos'));
        }
    }); 
    
    $('#data_panel').keypress(function (e) {
        if (e.which == 13) {
            $("#btn_send_update_datas").click();
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
    function validate_month(element_selector,pattern){
        if(!$(element_selector).val().match(pattern) || Number($(element_selector).val())>12){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }    
    function validate_year(element_selector,pattern){
        if(!$(element_selector).val().match(pattern) || Number($(element_selector).val())<2017){
           $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }

    $("#button_play").click(function(){
        if(state==='play' || state==='resume'){
          state = 'pause';
          $("#button_play i").attr('class', "fa fa-play"); 
        }
        else if(state==='pause'){
          state = 'resume';
          $("#button_play i").attr('class', "fa fa-pause");        
        }
        console.log("button play pressed, play was "+state);
    });
 }); 