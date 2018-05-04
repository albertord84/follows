<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="google-site-verification" content="0E7a5_j1eX8dCmhyUPM9-gWKQCyrBshagGL5_BqVvOc" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <meta name="description" content="Ganhar seguidores no Instagram. Aumente seus seguidores reais e qualificados de forma segmentada no Instagram. Followers, curtidas, geolocalizção, direct">
        <meta name="keywords" content="ganhar, seguidores, Instagram, seguidores segmentados, curtidas, followers, geolocalizção, direct, vendas">
        <meta name="revisit-after" content="7 days">
        <meta name="robots" content="index,follow">
        <meta name="distribution" content="global">
        
        <title>DUMBU</title>
        
        <link rel="shortcut icon" href="<?php echo base_url().'assets/img/icon.png'?>">    
        <link href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/bootstrap/css/style.css'?>" rel="stylesheet">
                
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
        <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>        
                
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript">var base_url = '<?php echo base_url();?>';</script> 
        <script type="text/javascript" src="<?php echo base_url().'assets/js/scielo.js'?>"></script>
        
        <?php include_once("pixel_facebook.php")?>
  </head>
  <body id="my_body">
    <div class="container">
        <div class="row">
            <div id="login_panel" class="col-md-4" ></div>
            <div id="data_panel" class="col-md-4" style="background-color:white">                 
                <div id="coniner_data_panel" class="center" style="padding-left:3%; padding-right: 3%">
                    <form id="formulario">
                                    <label>COMPRA $R 01.00</label><br><br>
                                    <div class="center">
                                        <img class="img-btn" style="width:13%;margin:0%" src="<?php echo base_url().'assets/img/Shape 1 copy.png'?>"/><br>
                                        <img class="img-btn" style="width:63%;margin:0%" src="<?php echo base_url().'assets/img/Informações de pagamento.png'?>"/>
                                    </div>

                                    <div class="form-group" style="width:100%;margin-top:4%;">                   
                                        <input id="credit_card_name" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" placeholder="Nome no cartão" required style="text-transform:uppercase;">                 
                                    </div>                
                                    <div class=" form-group" style="width:100%">
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-8 filter-buttons">
                                                <input id="credit_card_number" type="text" class="form-control" placeholder="Número no cartão" data-mask="0000 0000 0000 0000" maxlength="20" required>
                                            </div>
                                            <div class="col-xs-2 col-sm-2 filter-buttons"></div>
                                            <div class="col-xs-4 col-sm-4 filter-buttons">
                                                <input id="credit_card_cvc" type="text" class="form-control" placeholder="CVV/CVC" maxlength="5" required>
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
                                     <button  id="btn_sing_in" type="button" class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff" style="width: 50%">
                                        <span class="ladda-label"><div style="color:white; font-weight:bold">Enviar</div></span>
                                    </button>
                    </form>
                    <br><br>
                </div>                
            </div>

            <div id="sing_in_panel" class="col-md-4"></div>
        </div>
        
        
        
        
        
    </div>

    </body>
</html>