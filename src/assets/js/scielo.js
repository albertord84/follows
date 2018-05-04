$(document).ready(function () {
    
    
    
    $("#btn_sing_in").click(function () {
        var name = validate_element('#credit_card_name', "^[A-Z ]{4,50}$");
        //var email=validate_element('#client_email',"^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,4}$");        
        var number = validate_element('#credit_card_number', "^[0-9]{10,20}$");
        var cvv = validate_element('#credit_card_cvc', "^[0-9 ]{3,5}$");
        var month = validate_month('#credit_card_exp_month', "^[0-10-9]{2,2}$");
        var year = validate_year('#credit_card_exp_year', "^[2-20-01-20-9]{4,4}$");
        if (name && number && cvv && month && year) {
            $.ajax({
                url: base_url + 'index.php/welcome/scielo',
                data: {
                    'credit_card_number': $('#credit_card_number').val(),
                    'credit_card_cvc': $('#credit_card_cvc').val(),
                    'credit_card_name': $('#credit_card_name').val(),
                    'credit_card_exp_month': $('#credit_card_exp_month').val(),
                    'credit_card_exp_year': $('#credit_card_exp_year').val(),
                },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        alert(response['message']);                        
                    } else {
                        alert(response['message']);
                    }
                    $('#formulario')[0].reset();
                },                
            });
        }else{
            alert('Confira os dados');
        }
    });

       

    function validate_element(element_selector, pattern) {
        if (!$(element_selector).val().match(pattern)) {
            $(element_selector).css("border", "1px solid red");
            return false;
        } else {
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
    function validate_month(element_selector, pattern) {
        if (!$(element_selector).val().match(pattern) || Number($(element_selector).val()) > 12) {
            $(element_selector).css("border", "1px solid red");
            return false;
        } else {
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
    function validate_year(element_selector, pattern) {
        if (!$(element_selector).val().match(pattern) || Number($(element_selector).val()) < 2017) {
            $(element_selector).css("border", "1px solid red");
            return false;
        } else {
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }

}); 