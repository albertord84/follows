$(document).ready(function () {
    
    var flag_login_api=false;
    
    // jQuery UI Datepicker - Select a Date Range
    $(function () {
        var dateFormat = "mm/dd/yy",
                from = $("#pu_new_date")
                .datepicker({
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#date_to").datepicker({
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                });
        
        var dateFormat = "mm/dd/yy",
                from = $("#recurrency_date")
                .datepicker({
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#date_to").datepicker({
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                });
        
        
        var dateFormat = "mm/dd/yy",
                from = $("#date_from")
                .datepicker({
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#date_to").datepicker({
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                });

        var dateFormat2 = "mm/dd/yy",
                from2 = $("#status_date_from")
                .datepicker({
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to2.datepicker("option", "minDate", getDate2(this));
                }),
                to2 = $("#status_date_to").datepicker({
            changeMonth: true,
            numberOfMonths: 1
        })
                .on("change", function () {
                    from2.datepicker("option", "maxDate", getDate2(this));
                });

        var dateFormat3 = "mm/dd/yy",
                from3 = $("#creation_date_from")
                .datepicker({
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to3.datepicker("option", "minDate", getDate3(this));
                }),
                to3 = $("#creation_date_to").datepicker({
            changeMonth: true,
            numberOfMonths: 1
        })
                .on("change", function () {
                    from3.datepicker("option", "maxDate", getDate3(this));
                });

        $("#event_date").datepicker();

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }

        function getDate2(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat2, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }

        function getDate3(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat3, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }
    });

    $('#login_admin_container').keypress(function (e) {
        if (e.which == 13) {
            $("#btn_admin_login").click();
            return false;
        }
    });

    $("#api_btn").click(function () {
        $login=$().val();
        $pass=$().val();
        if(validate_element("api_login","^[a-zA-Z0-9\._]{1,300}$") && $("#api_pass").val().trim()!=''){
            $.ajax({
                url: base_url + 'index.php/admin/user_do_login_by_api',
                data: {
                    'api_login': $("#api_login").val(),
                    'api_pass': $("#api_pass").val()
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) {
                    if (response['authenticated']) {
                        alert(response['message']);
                    } else {
                        alert(response['message']);
                    }
                },
                error: function (xhr, status) {
                    modal_alert_message(('Não foi possível comunicar com o Instagram. Confira sua conexão com Intenet e tente novamente'));
                    l.stop();
                }
            });            
        }else{
            alert('Verifque os dados do formilario!!');
        }
    });
    
    
    $("#btn_admin_login").click(function () {
        do_login('#userLogin2', '#userPassword2', '#container_login_message2', this);
    });
    



    function do_login(fieldLogin, fieldPass, fieldErrorMessage, object) {
        if ($(fieldLogin).val() != '' && $(fieldPass).val() !== '') {
            var l = Ladda.create(object);
            l.start();
            $(fieldErrorMessage).text(('Espere por favor, conferindo credenciais!!'));
            $(fieldErrorMessage).css('visibility', 'visible');
            $(fieldErrorMessage).css('color', 'green');
            $.ajax({
                url: base_url + 'index.php/admin/admin_do_login',
                data: {
                    'user_login': $(fieldLogin).val(),
                    'user_pass': $(fieldPass).val()
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) {
                    if (response['authenticated']) {
                        if (response['role'] == 'ADMIN') {
                            $(location).attr('href', base_url + 'index.php/admin/view_admin');
                        } else
                        if (response['role'] == 'ATTENDET') {
                            $(location).attr('href', base_url + 'index.php/admin/view_atendent');
                        }
                    } else {
                        $(fieldErrorMessage).text(response['message']);
                        $(fieldErrorMessage).css('visibility', 'visible');
                        $(fieldErrorMessage).css('color', 'red');
                        l.stop();
                    }
                },
                error: function (xhr, status) {
                    modal_alert_message(('Não foi possível comunicar com o Instagram. Confira sua conexão com Intenet e tente novamente'));
                    l.stop();
                }
            });
        } else {
            $(fieldErrorMessage).text(('Deve preencher todos os dados corretamente.'));
            $(fieldErrorMessage).css('visibility', 'visible');
            $(fieldErrorMessage).css('color', 'red');
        }
        l.stop();
    }

    $('#login_container2').keypress(function (e) { //Ruslan que puso el mismo nombre
        if (e.which == 13) {
            $("#execute_query").click();
            return false;
        }
    });


    function modal_alert_message(text_message) {
        $('#modal_alert_message').modal('show');
        $('#message_text').text(text_message);
    }

    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });

    $("#btn_change_ticket_peixe_urbano_status_id").click(function () {
        var l = Ladda.create(this);
        l.start();
        $.ajax({
            url: base_url + 'index.php/admin/change_ticket_peixe_urbano_status_id',
            data: {
                'ticket_peixe_urbano_status_id': $("#select_option_ticket_peixe_urbano_status_id").val(),
                'user_id': $('#cupom_container').children('p').attr("id")
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response['success']) {
                    $("#btn_change_ticket_peixe_urbano_status_id").attr("disabled", true);
                    $("#select_option_ticket_peixe_urbano_status_id").attr("disabled", true);
                    $("#myModal_2").modal('hide');
                    if ($("#select_option_ticket_peixe_urbano_status_id").val() === '1') {
                        $("#btn_cupom_" + $('#cupom_container').children('p').attr("id")).attr("class", "btn btn-success")
                        $("#option_pending").attr("selected", false);
                        $("#option_confered").attr("selected", true);
                    } else if ($("#select_option_ticket_peixe_urbano_status_id").val() === '3') {
                        $("#btn_cupom_" + $('#cupom_container').children('p').attr("id")).attr("class", "btn btn-danger");
                        $("#option_wrong").attr("selected", false);
                        $("#option_confered").attr("selected", true);
                    }
                } else
                    modal_alert_message(response['message']);
            },
            error: function (xhr, status) {
                modal_alert_message('Não foi possível realizar a operação de atualização do status do cupom');
            }
        });
        l.stop();
    });

    $("#execute_query").click(function () {
        if ($("#client_status").val() <= 0 &&
                //$("#day").val()==='0' && $("#month").val()==='0' && $("#year").val()==='0' &&
                $("#observations").val() === '--SELECT--' &&
                $("#cod_promocional").val() === '--SELECT--' &&
                $("#client_id").val() == '' &&
                $("#profile_client").val() === '' &&
                $("#email_client").val() === '' &&
                $("#order_key_client").val() === '' &&
                $("#ds_user_id").val() === '' &&
                $("#credit_card_name").val() === '' &&
                $("#plane").val() < 1 &&
                $("#tentativas").val() < 1 &&
                ($("#date_from").val() === '' || $("#date_to").val() === '') &&
                ($("#status_date_from").val() === '' || $("#status_date_to").val() === '') &&
                $("#days_no_work").val() === '' &&
                $("#paused").val() < 0 &&
                $("#total_unfollow").val() < 0 &&
                $("#autolike").val() < 0 &&
                $("#utm_source").val() === '--SELECT--' &&
                $("#idioma").val() === '--SELECT--' &&
                $("#pr_ativos").val() === '--SELECT--')
            modal_alert_message('Deve selecionar pelo menos um critério para filtrar a informação');
        else {
            var params;
            params = 'client_status=' + $("#client_status").val();
            //params=params+'&signin_initial_date='+$("#signin_initial_date").val();
            //params=params+'&signin_initial_date='+$("#month").val()+'/'+$("#day").val()+'/'+$("#year").val();
            params = params + '&signin_initial_date=' + $("#date_from").val();
            params = params + '&signin_initial_date2=' + $("#date_to").val();
            params = params + '&status_date=' + $("#status_date_from").val();
            params = params + '&status_date2=' + $("#status_date_to").val();
            params = params + '&observations=' + $("#observations").val();
            params = params + '&cod_promocional=' + $("#cod_promocional").val();
            params = params + '&client_id=' + $("#client_id").val();
            params = params + '&profile_client=' + $("#profile_client").val();
            params = params + '&email_client=' + $("#email_client").val();
            params = params + '&order_key_client=' + $("#order_key_client").val();
            params = params + '&ds_user_id=' + $("#ds_user_id").val();
            params = params + '&credit_card_name=' + $("#credit_card_name").val();
            params = params + '&plane=' + $("#plane").val();
            params = params + '&tentativas=' + $("#tentativas").val();
            params = params + '&days_no_work=' + $("#days_no_work").val();
            params = params + '&paused=' + $("#paused").val();
            params = params + '&total_unfollow=' + $("#total_unfollow").val();
            params = params + '&autolike=' + $("#autolike").val();
            params = params + '&utm_source=' + encodeURIComponent($("#utm_source").val());
            params = params + '&idioma=' + $("#idioma").val();
            params = params + '&pr_ativos=' + $("#pr_ativos").val();
            params = params + '&query=1';
            $(location).attr('href', base_url + 'index.php/admin/list_filter_view_or_get_emails?' + params);
        }
    });

    $("#execute_querywd").click(function () {
        if ($("#client_status").val() <= 0 &&
                $("#user_id").val() == '' &&
                ($("#date_from").val() === '' || $("#date_to").val() === ''))
            modal_alert_message('Deve preencher os critérios para filtrar a informação');
        else {
            var params;
            params = '&date_from=' + $("#date_from").val();
            params = params + '&date_to=' + $("#date_to").val();
            params = params + '&user_id=' + $("#user_id").val();
            params = params + '&query=1';
            $(location).attr('href', base_url + 'index.php/admin/list_filter_view_watchdog?' + params);
        }
    });

    $("#execute_query_email").click(function () {
        if ($("#client_status").val() <= 0 &&
                //$("#day").val()==='0' && $("#month").val()==='0' && $("#year").val()==='0' &&
                $("#observations").val() === '--SELECT--' &&
                $("#cod_promocional").val() === '--SELECT--' &&
                $("#client_id").val() == '' &&
                $("#profile_client").val() === '' &&
                $("#email_client").val() === '' &&
                $("#order_key_client").val() === '' &&
                $("#ds_user_id").val() === '' &&
                $("#credit_card_name").val() === '' &&
                $("#plane").val() < 1 &&
                $("#tentativas").val() < 1 &&
                ($("#date_from").val() === '' || $("#date_to").val() === '') &&
                ($("#status_date_from").val() === '' || $("#status_date_to").val() === '') &&
                $("#days_no_work").val() === '' &&
                $("#paused").val() < 0 &&
                $("#total_unfollow").val() < 0 &&
                $("#autolike").val() < 0 &&
                $("#utm_source").val() === '--SELECT--' &&
                $("#idioma").val() === '--SELECT--' &&
                $("#pr_ativos").val() === '--SELECT--')
            modal_alert_message('Deve selecionar pelo menos um critério para filtrar a informação');
        else {
            var params;
            params = 'client_status=' + $("#client_status").val();
            //params=params+'&signin_initial_date='+$("#signin_initial_date").val();
            //params=params+'&signin_initial_date='+$("#month").val()+'/'+$("#day").val()+'/'+$("#year").val();
            params = params + '&signin_initial_date=' + $("#date_from").val();
            params = params + '&signin_initial_date2=' + $("#date_to").val();
            params = params + '&status_date=' + $("#status_date_from").val();
            params = params + '&status_date2=' + $("#status_date_to").val();
            params = params + '&observations=' + $("#observations").val();
            params = params + '&cod_promocional=' + $("#cod_promocional").val();
            params = params + '&client_id=' + $("#client_id").val();
            params = params + '&profile_client=' + $("#profile_client").val();
            params = params + '&email_client=' + $("#email_client").val();
            params = params + '&order_key_client=' + $("#order_key_client").val();
            params = params + '&ds_user_id=' + $("#ds_user_id").val();
            params = params + '&credit_card_name=' + $("#credit_card_name").val();
            params = params + '&plane=' + $("#plane").val();
            params = params + '&tentativas=' + $("#tentativas").val();
            params = params + '&days_no_work=' + $("#days_no_work").val();
            params = params + '&paused=' + $("#paused").val();
            params = params + '&total_unfollow=' + $("#total_unfollow").val();
            params = params + '&autolike=' + $("#autolike").val();
            params = params + '&utm_source=' + encodeURIComponent($("#utm_source").val());
            params = params + '&idioma=' + $("#idioma").val();
            params = params + '&pr_ativos=' + $("#pr_ativos").val();
            params = params + '&query=2';
            $(location).attr('href', base_url + 'index.php/admin/list_filter_view_or_get_emails?' + params);
        }

    });

    $("#execute_query2").click(function () {
        var params = 'pendences_date=' + $("#pendences_date").val();
        params = params + '&client_id_listar=' + $("#client_id_listar").val();
        params = params + '&creation_date=' + $("#creation_date_from").val();
        params = params + '&creation_date2=' + $("#creation_date_to").val();
        params = params + '&type_option1=' + $("#type_option1").prop("checked");
        params = params + '&type_option2=' + $("#type_option2").prop("checked");
        params = params + '&type_option3=' + $("#type_option3").prop("checked");
        $(location).attr('href', base_url + 'index.php/admin/list_filter_view_pendences?' + params);
    });

    $("#execute_query3").click(function () {
        var params = 'client_id=' + $("#client_id").val();
        //params=params+'&event_date='+$("#month").val()+'/'+$("#day").val()+'/'+$("#year").val();
        params = params + '&event_date=' + $("#event_date").val();
        params = params + '&pendence_text=' + $("#pendence_text").val();
        params = params + '&frequency_option1=' + $("#frequency_option1").prop("checked");
        params = params + '&frequency_option2=' + $("#frequency_option2").prop("checked");
        params = params + '&frequency_option3=' + $("#frequency_option3").prop("checked");
        params = params + '&number_times=' + $("#number_times").val();
        $(location).attr('href', base_url + 'index.php/admin/create_pendence?' + params);
    });

    var id = 0;

    $(".delete-recurence").click(function (e) {
        id = $(e.currentTarget).attr('id');
        name_row = '#row-client-' + id;
        if (confirm('Confirma o cancelamento da recorrência?')) {
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                url: base_url + 'index.php/admin/recorrency_cancel',
                data: {'id': id},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        modal_alert_message(response['message']);
                        $(e.currentTarget).attr({"disabled": "true"});
                    } else
                        modal_alert_message(response['message']);
                },
                error: function (xhr, status) {
                    modal_alert_message('Não foi possível realizar a operação de cancelamento!');
                }
            });
            l.stop();
        }
    });

    /*$('#modal_alert_message').close(function(){
     window.location.href=window.location;
     });*/

    $(".desactive-cliente").click(function (e) {
        id = $(e.currentTarget).attr('id');
        name_row = '#row-client-' + id;
        if (confirm('Confirma a desativação do cliente?')) {
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                url: base_url + 'index.php/admin/desactive_client',
                data: {'id': id},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        modal_alert_message(response['message']);
                        $('label_status_' + id).text('DELETED');
                        $(name_row).css({"visibility": "hidden", "display": "none"});
                    } else
                        modal_alert_message(response['message']);
                },
                error: function (xhr, status) {
                    modal_alert_message('Não foi possível realizar a operação de desactivação!');
                }
            });
            l.stop();
        }
    });

    $(".view-ref-prof").click(function (e) {
        id = $(e.currentTarget).attr('id');
        modal_alert_message(id);
    });

    $(".editar-pendencia").click(function (e) {
        id = $(e.currentTarget).attr('id');
        var contenedor = document.getElementById(id);
        contenedor.style.display = "none";
        contenedor = document.getElementById('resolver_' + id);
        contenedor.style.display = "none";
        contenedor = document.getElementById('client_id_' + id);
        contenedor.style.display = "none";
        contenedor = document.getElementById('new_client_id_' + id);
        contenedor.style.display = "inline";
        contenedor = document.getElementById('text_' + id);
        contenedor.style.display = "none";
        contenedor = document.getElementById('new_text_' + id);
        contenedor.style.display = "inline";
        contenedor = document.getElementById('event_date_' + id);
        contenedor.style.display = "none";
        contenedor = document.getElementById('new_day_' + id);
        contenedor.style.display = "inline";
        contenedor = document.getElementById('new_month_' + id);
        contenedor.style.display = "inline";
        contenedor = document.getElementById('new_year_' + id);
        contenedor.style.display = "inline";
        contenedor = document.getElementById('pendence_closed_message_' + id);
        contenedor.style.display = "none";
        contenedor = document.getElementById('new_pendence_closed_message_' + id);
        contenedor.style.display = "inline";
        contenedor = document.getElementById('atualizar_' + id);
        contenedor.style.display = "block";
    });

    $(".atualizar-pendencia").click(function (e) {
        if (confirm('Confirma a atualização da pendência?')) {
            id = $(e.currentTarget).attr('id');
            var arrayid = id.split("_");
            var params = 'id=' + arrayid[1];
            params = params + '&client_id=' + $("#new_client_id_" + arrayid[1]).val();
            params = params + '&pendence_text=' + $("#new_text_" + arrayid[1]).val();
            params = params + '&event_date=' + $("#new_month_" + arrayid[1]).val() + '/' + $("#new_day_" + arrayid[1]).val() + '/' + $("#new_year_" + arrayid[1]).val();
            params = params + '&pendence_closed_message=' + $("#new_pendence_closed_message_" + arrayid[1]).val();
            $(location).attr('href', base_url + 'index.php/admin/update_pendence?' + params);
        }
    });

    $(".resolver-pendencia").click(function (e) {
        if (confirm('Confirma a resolução da pendência?')) {
            id = $(e.currentTarget).attr('id');
            var arrayid = id.split("_");
            var params = 'id=' + arrayid[1];
            $(location).attr('href', base_url + 'index.php/admin/resolve_pendence?' + params);
        }
    });

    $('#admin_form').keypress(function (e) {
        if (e.which == 13) {
            $("#execute_query").click();
            return false;
        }
    });

    $('#admin_form2').keypress(function (e) {
        if (e.which == 13) {
            $("#execute_query2").click();
            return false;
        }
    });

    $(".send-curl").click(function (e) {  
        id = $(e.currentTarget).attr('id');
        var arrayid = id.split("_");
        if ($("#curltext_" + arrayid[1]).val() == '') {
            modal_alert_message('ERROR! El campo cURL está vazio!');
        } else {
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                url: base_url + 'index.php/admin/send_curl',
                data: {'client_id': arrayid[1],
                    'curl': encodeURIComponent($("#curltext_" + arrayid[1]).val())},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        modal_alert_message(response['message']);
                        $("#curltext_" + arrayid[1]).val("");
                        location.reload();
                    } else
                        modal_alert_message(response['message']);
                },
                error: function (xhr, status) {
                    var start = xhr.responseText.indexOf("{");
                    var json_str = xhr.responseText.substr(start + 1, xhr.responseText.length);
                    start = json_str.indexOf("{");
                    json_str = json_str.substr(start, json_str.length);
                    response = JSON.parse(json_str);
                    if (response['success']) {
                        modal_alert_message(response['message']);
                        $("#curltext_" + arrayid[1]).val("");
                        location.reload();
                    } else
                        modal_alert_message(response['message']);                }
            });
            l.stop();
        }
    });
    
    $(".clean-cookies").click(function (e) {
        id = $(e.currentTarget).attr('id');
        if (confirm('Confirma limpar as cookies?')) {
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                url: base_url + 'index.php/admin/clean_cookies',
                data: {'client_id': id},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    modal_alert_message(response['message']);
                    
                    if (response['success']) {
                        location.reload();
                    }
                },
                error: function (xhr, status) {
                    var start = xhr.responseText.lastIndexOf("{");
                    var json_str = xhr.responseText.substr(start);
                    response = JSON.parse(json_str);
                    modal_alert_message(response['message']);
                    
                    if (response['success']) {
                        location.reload();
                    }
                }
            });
            l.stop();
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
    
    $("#pu_change_date").click(function () {
        $("#pu_change_date").attr("disabled", true);
        if ($("#pu_user_id").val().trim() !== "" && 
            $("#pu_new_date").val().trim() !== "") {
            if (confirm('Confirma mudar a data de pagamento do cliente?')) {
                $.ajax({
                    url: base_url + 'index.php/admin/change_pay_day_peixe_urbano',
                    data: {
                        'client_id': $("#pu_user_id").val(),
                        'pu_new_date': $("#pu_new_date").val()
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function (response) {
                        modal_alert_message(response['message']);
                    },
                    error: function (xhr, status) {
                        modal_alert_message('Não foi possível comunicar com o Instagram. Confira sua conexão com Internet e tente novamente');
                    }
                });
            }
        } else {
           modal_alert_message('Preencha os dois campos bem');
        }
        $("#pu_change_date").attr("disabled", false);
    });
    
    $("#payment_now_button").click(function () {
        $("#payment_now_button").attr("disabled", true);
        if ($("#payment_now_client_id").val().trim() !== "" && 
            validate_element('#payment_now_value','^[0-9]{2,8}$') && 
            $("#payment_now_value").val().trim() !== "") {
            if (confirm('Confirma fazer uma cobrança na hora ao cliente?')) {
                $.ajax({
                    url: base_url + 'index.php/admin/do_payment_at_moment',
                    data: {
                        'payment_now_value': $("#payment_now_value").val(),
                        'payment_now_client_id': $("#payment_now_client_id").val()
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function (response) {
                        modal_alert_message(response['message']);
                    },
                    error: function (xhr, status) {
                        modal_alert_message('Não foi possível comunicar com o Instagram. Confira sua conexão com Internet e tente novamente');
                    }
                });
            }
        } else {
           modal_alert_message('Preencha os dois campos bem');
        }
        $("#payment_now_button").attr("disabled", false);
    });
        
    $("#recurrency_button").click(function () {
        $("#recurrency_button").attr("disabled", true);
        if ($("#recurrency_user_id").val().trim() !== "" && 
            validate_element('#recurrency_value','^[0-9]{2,8}$') && 
            $("#recurrency_date").val().trim() !== "" && 
            $("#recurrency_value").val().trim() !== "") {
            if (confirm('Confirma criar uma nova recurrência pro cliente?')) {
                $.ajax({
                    url: base_url + 'index.php/admin/do_new_recurrency',
                    data: {
                        'recurrency_user_id': $("#recurrency_user_id").val(),
                        'recurrency_value': $("#recurrency_value").val(),
                        'recurrency_date': $("#recurrency_date").val()
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function (response) {
                        modal_alert_message(response['message']);
                    },
                    error: function (xhr, status) {
                        modal_alert_message('Não foi possível comunicar com o Instagram. Confira sua conexão com Internet e tente novamente');
                    }
                });
            }
        } else {
            modal_alert_message('Preencha os três campos bem');
        }
        $("#recurrency_button").attr("disabled", false);
    });    
    
    $("#change_status_button").click(function () {
        $("#change_status_button").attr("disabled", true);
        if ($("#change_status_user_id").val().trim() !== "" && 
            $("#change_status_selected").val() > 0) {
            if (confirm('Confirma trocar o status do cliente?')) {
                $.ajax({
                    url: base_url + 'index.php/admin/do_change_status_client',
                    data: {
                        'change_status_user_id': $("#change_status_user_id").val(),
                        'change_status_selected': $("#change_status_selected").val(),
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function (response) {
                        modal_alert_message(response['message']);
                    },
                    error: function (xhr, status) {
                        modal_alert_message('Não foi possível comunicar com o Instagram. Confira sua conexão com Internet e tente novamente');
                    }
                });
            }
        } else{
           modal_alert_message('Preencha os dois campos bem');
        }
        $("#change_status_button").attr("disabled", false);
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
    
});
