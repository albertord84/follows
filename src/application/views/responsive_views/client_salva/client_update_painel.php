<script type="text/javascript">var upgradable_datas=<?php echo json_encode($upgradable_datas);?></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/update_client_painel.js'?>"></script>


<br><br><p class="section-titles">ATUALIZAR DADOS</p><br>
<div class="container-fluid filter-menu">
    <div class="row">
        <div id="login_panel" class="col-xs-3 "></div>        
        <div id="data_panel" class="col-xs-6" style="width:60%; margin-left:20%; border-radius: 5px; border:1px solid silver; padding: 2%;">                      
            <label>INFORMAÇÕES DE PAGAMENTO</label><br>
            <div class="form-group" style="width:100%">
                <input id="credit_card_name" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" placeholder="Meu nome no cartão" required style="text-transform:uppercase;">                 
            </div>
            <!--<div class="form-group" style="width:100%">                                      
                <input id="client_email" type="email" class="form-control" placeholder="E-mail" required>
            </div>-->
            <div class=" form-group" style="width:100%">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 filter-buttons">
                        <input id="credit_card_number" type="text" class="form-control" placeholder="Número no cartão" data-mask="0000 0000 0000 0000" maxlength="20" required>
                    </div>
                    <div class="col-xs-2 col-sm-2 filter-buttons"></div>
                    <div class="col-xs-4 col-sm-4 filter-buttons">
                        <input id="credit_card_cvc" type="text" class="form-control" placeholder="CVV" maxlength="5" required>
                    </div>
                </div>
            </div>
            <div class=" form-group" style="width:100%">
                <div class="row">                    
                    <div class="col-xs-4" style="text-align:right; margin-top:2%">
                        <label>Validade:</label>
                    </div>                    
                    <div class="col-xs-4">
                        <div class="form-group">      
                            <select id="credit_card_exp_month" class="form-control">
                                <option>01</option><option>02</option><option>03</option>
                                <option>04</option><option>05</option><option>06</option>
                                <option>07</option><option>08</option><option>09</option>
                                <option>10</option><option>11</option><option>12</option>
                            </select>      
                        </div>
                    </div>             
                    <div class="col-xs-4">                        
                        <div class="form-group">      
                            <select id="credit_card_exp_year" class="form-control">
                                <option>2017</option><option>2018</option>
                                <option>2019</option><option>2020</option><option>2021</option>
                                <option>2022</option><option>2023</option><option>2024</option>
                                <option>2025</option><option>2026</option><option>2027</option>
                                <option>2028</option><option>2029</option><option>2030</option>
                                <option>2031</option><option>2032</option><option>2033</option>
                                <option>2034</option><option>2035</option><option>2036</option>
                                <option>2037</option><option>2038</option><option>2039</option>
                            </select>      
                        </div>
                    </div>
                </div>            
                <br>
            </div>            
            <div class="row center">
                <button id="btn_send_update_datas" type="button" style="margin-left:4%; width:40%" class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                    <span class="ladda-label">Atualizar</span>
                </button>
            </div>
        </div>   
        
        <div id="sing_in_panel" class="col-xs-3">                
        </div>        
    </div>
</div>
<br>



