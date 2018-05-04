<!---------------------------------------------------------------------------------------->
    <script type="text/javascript">
        var profiles=<?php echo json_encode($profiles);?>; 
        var MAX_NUM_PROFILES=<?php echo $MAX_NUM_PROFILES; ?>;
        //var status_messages ='<?php// echo json_encode($messages);?>';           
    </script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/update_client_painel.js'?>"></script>
<!---------------------------------------------------------------------------------------->
   <br>
    <div class="row">
        <?php
            switch ($status['status_id']) {
                case 3:
                    echo '
                        <div id="activate_account" class="center" style="margin-left:25%; width:50%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">ATIVE SUA CONTA</b><BR>
                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">INFORME NOVAMENTE LOGIN E SENHA DE INSTAGRAM</b>             
                            <br><br>
                            <form id="usersLoginForm"  action="#" method="#"  class="form" role="form" style="margin-left:25%;margin-right:25%;"  accept-charset="UTF-8" >                                
                                <div class="form-group">                                                                
                                     <input id="userLogin" type="text" class="form-control" value="'.$my_login_profile.'" disabled="true">
                                </div>
                                <div class="form-group">                                                                
                                    <input id="userPassword" type="password" class="form-control" placeholder="Senha" required>
                                </div>                                                             
                                <div class="form-group">
                                    <button id="activate_account_by_status_3" class="btn btn-success btn-block ladda-button" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                        <span class="ladda-label">ACTIVAR AGORA</span>
                                    </button>
                                </div>
                                <div id="container_login_message" class="form-group" style="text-align:justify;visibility:hidden; font-family:sans-serif; font-size:0.9em">                                                        
                                </div>
                            </form>
                        </div>';
                    break;
                case 2:
                    echo '
                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">HABILITE SUA CONTA</b><BR>
                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">PRECISAMOS QUE VOCÊ ATUALIZE SEUS DADOS BANCÁRIOS</b>  <BR>           
                            <a id="lnk_update_data_bank" href="#lnk_update">
                                <button id="btn_update_data_bank" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                    ATUALIZAR AGORA
                                </button>
                            </a>
                        </div>';
                    break;
                case 6:
                     echo '
                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">ATIVE SUA CONTA</b><BR>
                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">PRECISAMOS QUE VOCÊ ATUALIZE SEUS DADOS BANCÁRIOS</b>  <BR>           
                            <a id="lnk_update_data_bank" href="#lnk_update">
                                <button id="btn_update_data_bank" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                    ATUALIZAR AGORA
                                </button>
                            </a>
                        </div>';
                    break;
                case 7:
                    /*echo '
                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b id="message_status1" style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">ATIVE SUA CONTA</b>
                            <b id="message_status2" style="margin:1%; font-family:sans-serif; font-size:0.8em;"><BR>PRECISAMOS QUE VOCÊ SIGA MÁXIMO 6000 PERFIS NO INSTAGRAM</b>  <BR>           
                            <b id="message_status3" style="margin:1%; font-family:sans-serif; font-size:0.8em;">DESEJA QUE O DUMBU DESSIGA ALEATÓRIAMENTE OS PERFIS NECESSÁRIOS?</b>  <BR>                                       
                            <button id="btn_unfollow_permition" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                    DESSEGIR
                                </button>                            
                        </div>';   */
                    echo '
                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b id="message_status1" style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">ATIVE SUA CONTA</b>
                            <b id="message_status2" style="margin:1%; font-family:sans-serif; font-size:0.8em;"><BR>PRECISAMOS QUE VOCÊ SIGA MÁXIMO 6000 PERFIS NO INSTAGRAM PARA INICIAR A FERRAMENTA NO SEU PERFIL</b>  <BR>           
                        </div>'; 
                    break;
                case 9:
                    if(isset($verify_account_datas)&&is_array($verify_account_datas)){
                        echo '
                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">ATIVE SUA CONTA</b><BR>
                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">PRECISAMOS QUE VOCÊ VERIFIQUE SUA CONTA DIRETAMENTE NO INSTAGRAM COMO MEDIDA DE SEGURANÇA</b>             
                            <a id="lnk_verify_account" target="_blank" style="color:black;font-size:1em;"  href="'.$verify_account_datas['verify_account_url'].'">
                                <button id="btn_verify_account" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                    ACTIVAR AGORA
                                </button>
                            </a>
                        </div>';
                    }
                    break;
            }
        ?>
    </div>
    
<!---------------------------------------------------------------------------------------->
    <div class="row">
        <br><br><p class="section-titles center" >PERFIS DE REFERÊNCIA</p> 
    </div>
    <div class="row" style="margin-bottom: 0%">
        <div class="col-xs-2" ></div>
        <div class="col-xs-8" >
            <div class="alert " role="alert" style="text-align:center">
                O Dumbu seguirá os usuários que seguem os perfis de referência que você escolher, 
                uma parte <br> desses usuários o seguirão de volta e após um determinado tempo deixaremos
                de seguir esses usuários.<br> Adicione seus perfis de referência aqui:
            </div>
        </div>
        <div class="col-xs-2" ></div>
    </div>

    

    <div class="row"  style="margin-top: 0%">
        <div class="col-md-3"></div>
        
        <div id="reference_profiles" class="col-md-7" style="background-color:blue">
            <div id="display_area" class="row" style="width:80%;background-color:red">
                <div id="reference_profile0" class="container-reference-profile" style="width:20%; display:inline-block;">
                    <br><b title="Seguidos por mim" id="cnt_follows_prof0" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                    <img id="img_ref_prof0" class="img-circle image-reference-profile" style="" src="">
                    <br><b id="name_ref_prof0" style="font-family:sans-serif; font-size:1em;"></b>
                </div>
                <div id="reference_profile1" class="container-reference-profile" style="width:20%; display:block;">
                    <br><b title="Seguidos por mim" id="cnt_follows_prof0" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                    <img id="img_ref_prof1" class="img-circle image-reference-profile" style="" src="">
                    <br><b id="name_ref_prof1" style="font-family:sans-serif; font-size:1em;"></b>
                </div>
            </div>
        </div>        
        <div class="col-md-2"></div>
    </div>
            
            <br><br><br><br><br>
            
            
    <div class="row"  style="margin-top: 0%">
        <div class="col-md-3">
            <div style="text-align:center;">
                <img id="my_img" class="my_img_profile" src="<?php echo $my_img_profile;?>"/><br>
                <b><p id="my_name" style="font-size:1.2em; font-family:sans-serif;"><?php echo $my_login_profile;?></p></b>                        
                <?php
                    if($status['status_id']==1)
                        echo '<b id="status_text" style="color:green; font-size:1.2em; font-family:sans-serif">'.$status["status_name"].'</b>';
                    else                   
                        echo '<b id="status_text" style="color:red; font-size:1.2em; font-family:sans-serif">'.$status["status_name"].'</b>';                    
                ?>
            </div>        
            <br><br>
        </div> 
        
        <div class="col-md-7">
            <div class="container-profiles">           
                <div class="row" style="padding:1%;">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-2" >
                        <div id="reference_profile0" class="container-reference-profile">
                            <br><b title="Seguidos por mim" id="cnt_follows_prof0" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                            <img id="img_ref_prof0" class="img-circle image-reference-profile" src="">
                            <br><b id="name_ref_prof0" style="font-family:sans-serif; font-size:1em;"></b>
                        </div>
                    </div>
                    <div class="col-xs-2" >
                        <div id="reference_profile1" class="container-reference-profile">
                            <br><b title="Seguidos por mim" id="cnt_follows_prof1" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                            <img id="img_ref_prof1" class="img-circle image-reference-profile" src="">
                            <br><b id="name_ref_prof1" style="font-family:sans-serif; font-size:1em;"></b>
                        </div>
                    </div>
                    <div class="col-xs-2" >
                        <div id="reference_profile2" class="container-reference-profile">
                            <br><b title="Seguidos por mim" id="cnt_follows_prof2" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                            <img id="img_ref_prof2" class="img-circle image-reference-profile" src="">
                            <br><b id="name_ref_prof2" style="font-family:sans-serif; font-size:1em;"></b>
                        </div>
                    </div>
                    <div class="col-xs-2" >
                        <div id="reference_profile3" class="container-reference-profile">
                            <br><b title="Seguidos por mim" id="cnt_follows_prof3" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                            <img id="img_ref_prof3" class="img-circle image-reference-profile" src="">
                            <br><b id="name_ref_prof3" style="font-family:sans-serif; font-size:1em;"></b>
                        </div>
                    </div>
                    
                    <div class="col-xs-1"></div>
                    <div class="col-xs-2">
                        <div id="btn_reference_profile">
                            <br><b></b>
                            <button id="adding_profile" type="button" class="btn btn-info btn-social-icon" ><b style="font-size:1.5em ">+</b></button>
                            <br><b></b>
                        </div>                    
                    </div>
                </div>
            </div>
            <div class="alert" role="alert" style="text-align:justify">
                <b>Dica:</b> Lembre-se que para garantir um bom desempenho da ferramenta você deve
                adicionar perfis de referência que combine com o seu perfil.
            </div>
            <br><br>        
        </div>

        <div class="col-md-2"> 
            <div id="insert_profile_form" class="form-insert-profile">
                <form action="#" method="#"   class="form" accept-charset="UTF-8" >
                    <div class="form-group">                   
                        <input id = "login_profile"  type="text" class="form-control"  placeholder="Perfil" onkeyup="javascript:this.value=this.value.toLowerCase();" style="text-transform:lowercase;"  required>
                    </div>                              
                    <div class="form-group">
                        <button id="btn_insert_profile"   type="button" class="btn btn-success btn-block ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                            <span class="ladda-label">Adicionar</span>
                        </button>
                    </div>
                    <div id="reference_profile_message" class="form-group" style="text-align:left;visibility:hidden; font-family:sans-serif; font-size:0.9em">
                    </div>
                 </form>
            </div>
        </div>     
    </div>

<!---------------------------------------------------------------------------------------->
    <!--<script type="text/javascript">var upgradable_datas=<?php// echo json_encode($upgradable_datas);?></script>-->
    <A name="lnk_update"></A>
    <div class="row">
       <p class="section-titles center">ATUALIZAR DADOS</p><br>
    </div>

    <div class="row">             
        <div id="data_panel" class="col-xs-12" style="width:80%; margin-left:10%; border-radius: 5px; border:1px solid silver; padding: 2%;">           
            <div class=" form-group" style="width:100%">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 filter-buttons">
                        <input id="credit_card_name" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" placeholder="Nome no cartão" required style="text-transform:uppercase;">                 
                    </div>
                    <div class="col-xs-6 col-sm-6 filter-buttons">
                        <input id="client_email" type="email" class="form-control" placeholder="E-mail" required>
                    </div>
                </div>
            </div>
            <div class=" form-group" style="width:100%">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 filter-buttons">
                        <input id="credit_card_number" type="text" class="form-control" placeholder="Número no cartão" data-mask="0000 0000 0000 0000" maxlength="20" required>
                    </div>
                    <div class="col-xs-3 col-sm-3 filter-buttons">
                        <input id="credit_card_cvc" type="text" class="form-control" placeholder="CVV" maxlength="5" required>
                    </div>                            
                    <div class="col-xs-1" style="text-align:right; margin-top:2%">
                        <label>Validade:</label>
                    </div>                    
                    <div class="col-xs-2">                        
                        <select id="credit_card_exp_month" class="form-control">
                            <option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option>
                        </select>  
                    </div>             
                    <div class="col-xs-3"> 
                        <select id="credit_card_exp_year" class="form-control">
                            <option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option><option>2026</option><option>2027</option><option>2028</option><option>2029</option><option>2030</option><option>2031</option><option>2032</option><option>2033</option><option>2034</option><option>2035</option><option>2036</option><option>2037</option><option>2038</option><option>2039</option>
                        </select>
                    </div>
                </div>            
            </div>            
            <div class="row center">
                <button id="btn_send_update_datas" type="button" style="margin-left:4%; width:30%" class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                    <span class="ladda-label">Atualizar</span>
                </button>
            </div>
        </div>     
    </div>
    <br>

<!---------------------------------------------------------------------------------------->
<div class="row">
    <div class="row">
        <br><br><p class="section-titles center">AVISOS IMPORTANTES</p><br>
    </div>    
    <div class="row">
        <div id="important_warning"  style="margin-left: 10%; margin-right:10%; padding:3%; padding-bottom:0%; padding-top: 0%;">                        
            <div id='list_warnings'>
                                    
                
                <div id='important_warnings'>
                    <div class="alert alert-default" style="background-color:#F4F4F4" role="alert"><ul id="success_warnings">
                        <li style="margin-bottom:0.7em;"> O Instagram só permite que você siga alredor de 7000 perfis. Precisamos que você siga máximo 6000 perfis para iniciar a ferramenta;
                        <li style="margin-bottom:0.7em;"> Nossa ferramenta é interligada ao Instagram, por isso, pode sofrer variações no desempenho a cada atualização feita pelo Instagram;
                        <li style="margin-bottom:0.7em;"> Casso altere seu nome de usuário ou senha no Instagram, o seviço de Dumbu será desconetado temporáriamente. Somente precisa fazer login no Dumbu para atualizar as suas credenciais e continuar recevendo o serviço;
                        <li style="margin-bottom:0.7em;"> Nunca utilice outras ferramentas junto a Dumbu. 
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
    
<br><br>