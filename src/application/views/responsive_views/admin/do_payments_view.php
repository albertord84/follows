    <section id="" class="col-md-12 col-sm-12 col-xs-12"><br><br><hr><br><br></section>
    
    <section id="Peixe_urbano" class="col-md-12 col-sm-12 col-xs-12">
        <div  class="col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-md-8 col-sm-8 col-xs-12">
                <h3>Melhor que CURL, faça aqui!!!  (Ainda en desenvolvimento)</h3>
                <h5> 1) Verifique que o usuario esta bem no Istagram, loguee ele diretamente no Instagram</h5>
                <h5> 2) Insira login e senha do cliente e faça a solicitude</h5>
                <h5> 3) Teste o login do cliente en Dumbu e confira as cookies desse cliente no admin</h5>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <b>Perfil</b><br>
                    <input id="api_login" type="text" placeholder="Perfil">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <b>Senha</b><br>
                    <input id="api_pass" type="text" placeholder="Senha">
                </div>                
                <div class="col-md-4 col-sm-4 col-xs-12"> 
                    <input id="api_btn" class="btn btn-primary" type="button" value="Modificiar data" style="margin-top:19px">                    
                </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12"></div>  
    </section>

    <section id="" class="col-md-12 col-sm-12 col-xs-12"><br><br><hr><br><br></section>

    <section id="Peixe_urbano" class="col-md-12 col-sm-12 col-xs-12">
        <div  class="col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-md-8 col-sm-8 col-xs-12">
                <h3>O cliente é Peixe Urbano? Faça o seguinte:</h3>
                <h5> 1) Estorne o primeiro pagamento do cliente, caso já ter sido cobrado</h5>
                <h5> 2) Mude a data de pagamento para o dia do próximo pagamento:</h5>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <b>ID do cliente</b>
                    <input id="pu_user_id" type="text" placeholder="ID do cliente">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <b>Nova data pagamento</b>
                    <div >
                        <input id="pu_new_date" type="text"  placeholder="mm/dd/yyyy" class="form-control" value="<?php if (isset($form_filter) && $form_filter[date_from] != "") { echo $form_filter[date_from]; } ?>">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"> 
                    <input id="pu_change_date" class="btn btn-primary" type="button" value="Modificiar data" style="margin-top:19px">                    
                </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12"></div>  
    </section>

    <section id="Peixe_urbano" class="col-md-12 col-sm-12 col-xs-12"><br><br><hr><br><br></section>
    
    <section id="Cobrança na hora" class="col-md-12 col-sm-12 col-xs-12">
        <div  class="col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-md-8 col-sm-8 col-xs-12">
                <h3>Uma cobrança na hora, agora mesmo?:</h3>
                <h5> ATENÇÂO: Verifique se precisa cancelar alguma recorrência ativa do cliente.</h5>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <b>ID do cliente</b>
                    <input id="payment_now_client_id" type="text" placeholder="ID do cliente">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <b>Valor (en centavos)</b>
                    <input id="payment_now_value" type="text" placeholder="Ex: 23450">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"> 
                    <input id="payment_now_button" class="btn btn-primary" type="button" value="Cobrar agora" style="margin-top:19px">
                </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12"></div> 
    </section>
    
    <section id="Peixe_urbano" class="col-md-12 col-sm-12 col-xs-12"><br><br><hr><br><br></section>         
    
    <section id="Peixe_urbano" class="col-md-12 col-sm-12 col-xs-12">
        <div  class="col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-md-8 col-sm-8 col-xs-12">
                <h3>Criar uma nova recorrência? Preencha os campos seguintes:</h3>
                <h5>1) PRECAUÇÂO:  se botar a data de hoje, poderia ser realizada uma cobrança na hora. Cuidado!!</h5>
                <h5>2) Analise se deve alterar a data de pagamento do cliente e faça você mesmo se precisar no Procedimento 1 </h5>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <b>ID do cliente</b>
                    <input id="recurrency_user_id" type="text" placeholder="ID do cliente">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <b>Valor (en centavos)</b>
                    <input id="recurrency_value" type="text" placeholder="Ex: 23450">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <b>Nova data pagamento</b>
                        <input id="recurrency_date" type="text"  name="date_from" placeholder="mm/dd/yyyy" class="form-control" value="<?php if (isset($form_filter) && $form_filter[date_from] != "") { echo $form_filter[date_from]; } ?>">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <input id="recurrency_button" class="btn btn-primary" type="button" value="Criar recorrência" style="margin-top:19px">                    
                </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12"></div>  
    </section>
    
    <section id="Peixe_urbano" class="col-md-12 col-sm-12 col-xs-12"><br><br><hr><br><br></section>
    
    <section id="Peixe_urbano" class="col-md-12 col-sm-12 col-xs-12">
        <div  class="col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-md-8 col-sm-8 col-xs-12">
                <h3>Trocar status do cliente</h3>                
                <h5>Mudar o satus de um cliente pode tirar o trabalho do dia se tinha na tabela de trabalho. Confira os RP do cliente desde o admin</h5>
                <h5>Logar um usuário no Dumbu bota trabalho se estava bloqueado e não tem trabalhado o suficiente</h5>
                <h5>ATENÇÃO: analisar se precisa cancelar recorrência, e fazer diretemente na mundipagg</h5>
                
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <b>ID do cliente</b>
                    <input id="change_status_user_id" type="text" placeholder="ID do cliente">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <b>Novo status</b>
                    <select id="change_status_selected" name="local" class="btn-primeiro sel" id="local">
                        <option value="-1">Selecione ...</option>
                        <option value="3">BLOQUED BY INSTA</option>
                        <option value="9">VERIFY ACCOUNT</option>
                        <option value="2">BLOCKED BY PAYMENT</option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-12"></div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input id="change_status_button" class="btn btn-primary" type="button" value="Mudar status" style="margin-top:19px">                    
                </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12"></div>
    </section>