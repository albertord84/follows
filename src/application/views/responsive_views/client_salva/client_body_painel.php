<!---------------------------------------------------------------------------------------->
    <?php
    echo '<script type="text/javascript">';
        if(isset($profiles))
            echo 'var profiles='.json_encode($profiles).';';
        else
             echo 'var profiles='.json_encode(array()).';';
        if(isset($MAX_NUM_PROFILES))
            echo 'var MAX_NUM_PROFILES='.$MAX_NUM_PROFILES.';';
    echo '</script>' ;
    ?>
    
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
                     /*echo '
                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">ATIVE SUA CONTA</b><BR>
                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">PRECISAMOS QUE VOCÊ ATUALIZE SEUS DADOS BANCÁRIOS</b>  <BR>           
                            <a id="lnk_update_data_bank" href="#lnk_update">
                                <button id="btn_update_data_bank" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                    ATUALIZAR AGORA
                                </button>
                            </a>
                        </div>';*/
                    break;
                case 7:
                    /*echo '
                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b id="message_status1" style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">ATIVE SUA CONTA</b>
                            <b id="message_status2" style="margin:1%; font-family:sans-serif; font-size:0.8em;"><BR>PRECISAMOS QUE VOCÊ SIGA MÁXIMO 6000 PERFIS NO INSTAGRAM</b>  <BR>           
                            <b id="message_status3" style="margin:1%; font-family:sans-serif; font-size:0.8em;">DESEJA QUE O DUMBU DESSIGA ALEATORIAMENTE OS PERFIS NECESSÁRIOS?</b>  <BR>                                       
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
                        if($verify_account_datas['verify_account_url']!="")
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
                        else
                            echo '
                            <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">ATIVE SUA CONTA</b><BR>
                                <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">PRECISAMOS QUE VOCÊ VERIFIQUE SUA CONTA DIRETAMENTE NO INSTAGRAM COMO MEDIDA DE SEGURANÇA</b>                                             
                            </div>';
                    }
                    break;
                case 10:
                    echo '
                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                            <b id="message_status2" style="margin:1%; font-family:sans-serif; font-size:0.8em;">SUA CONTA ESTA TEMPORÁRIAMENTE LIMITADA NO DUMBU DEVIDO A RESTRIÇÕES DE TEMPO COM O INSTRAGRAM</b>  <BR>           
                            <b id="message_status2" style="margin:1%; font-family:sans-serif; font-size:0.8em;">EM POUCO TEMPO SERÁ RESTABELECIDO O SERVIÇO PARA VOCÊ </b><BR>           
                        </div>'; 
                    break;
            }
        ?>
    </div>
    
    <div id="reference_profile_status_container" class="row" style="visibility:hidden;display:none">        
        <div id="reference_profile_status_message" class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
            <div class="center">
                <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">PERFIS DE REFERÊNCIA COM PROBLEMA. CONSIDERE TROCAR!!!</b>
                <hr><BR>
            </div>
            
            <div style="text-align:left">
                <ul id="reference_profile_status_list">

                </ul>
            </div>
            <div class="center">
                <button id="btn_RP_status" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                    ACEITAR                    
                </button>
            </div>            
        </div>
    </div>
    
    
<!---------------------------------------------------------------------------------------->
    <br>
    <div class="row">
        <br><br><p class="section-titles center" >RESULTADOS</p> 
    </div>
    
    
    
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <br><br>
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-6">
                    <div style="text-align: center">
                        <b id="initial_date_text" style="padding-top:5px; padding-bottom:5px; padding-left:20px; padding-right:20px;  text-align:center; width:100%; color:#087AB9; font-size:0.85em; border-radius: 25px; border:1px solid #087AB9;">
                            Início <?php echo $my_sigin_date;?>
                        </b>
                    </div>
                </div>
                <div class="col-xs-3"></div>
            </div>
            <div class="row"><br></div>
            <div class="row">
                <div class="col-xs-6">
                    <div style="float:right;text-align: center"">
                        <b id="initial_date_followings" style="text-align:center; width:100%; font-size:1.4em;">
                            <?php echo $my_initial_followings;?>
                        </b>
                        <br>
                        <b style="text-align:center; width:100%; font-size:1em;">
                            Seguindo
                        </b>
                    </div>
                </div>
                <div class="col-xs-2"></div>
                <div class="col-xs-6">
                    <div style="float:left;text-align: center">
                        <b id="initial_date_follwers" style="text-align:center; width:100%; font-size:1.4em;">
                            <?php echo $my_initial_followers;?>
                        </b>
                        <br>
                        <b style="text-align:center; width:100%; font-size:1em;">
                            Seguidores
                        </b>
                    </div>
                </div>
            </div>
        </div> 
        
        
        
        
        
        <div class="col-md-5">
            <br><br>
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-6">
                    <div style="text-align: center">
                        <b id="now_date_text" style="padding-top:5px; padding-bottom:5px; padding-left:20px; padding-right:20px;   text-align:center; width:100%; color:#087AB9; font-size:0.85em; border-radius: 25px; border:1px solid #087AB9;">
                            Agora <?php echo $today;?>
                        </b>
                    </div>
                </div>
                <div class="col-xs-3"></div>
            </div>
            <div class="row"><br></div>
            <div class="row">
                <div class="col-xs-6">
                    <div style="float:right;text-align: center"">
                        <b id="now_date_followings" style="text-align:center; width:100%; font-size:1.4em;">
                            <?php echo $my_actual_followings;?>
                        </b>
                        <br>
                        <b style="text-align:center; width:100%; font-size:1em;">
                            Seguindo
                        </b>
                    </div>
                </div>
                <div class="col-xs-2"></div>
                <div class="col-xs-6">
                    <div style="float:left;text-align: center">
                        <b id="now_date_follwers" style="text-align:center; width:100%; font-size:1.4em;">
                            <?php echo $my_actual_followers;?>
                        </b>
                        <br>
                        <b style="text-align:center; width:100%; font-size:1em;">
                            Seguidores
                        </b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
        
    <br><br>
    
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-6">
            <div style="text-align: center">
                <b id="now_date_follwers_gains" style="text-align:center; font-size:1.8em;  width:100%; color:#00A569; ">
                    <?php echo $my_actual_followers - $my_initial_followers;?>
                </b>
                <br>
                <b style="text-align:center; width:100%; color:#00A569; font-size:0.85em; padding-top:5px; padding-bottom:5px; padding-left:20px; padding-right:20px; border-radius: 25px; border:1px solid #00A569;">
                    Seguidores ganhos
                </b>
            </div>
        </div>
        <div class="col-xs-3"></div>
    </div>
    
    <br><br>
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-xs-6">
                    <div style="text-align: center"">
                        <b id="now_date_followings" style="text-align:center; width:100%; font-size:1.4em;">
                            <?php echo $total_amount_reference_profile_today;?>
                        </b>
                        <br>
                        <b style="text-align:center; width:100%; font-size:1em;">
                            Perfis de referências<br>utilizados até hoje
                        </b>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div style="text-align: center"">
                        <b id="now_date_followings" style="text-align:center; width:100%; font-size:1.4em;">
                            <?php echo $total_amount_followers_today;?>
                        </b>
                        <br>
                        <b style="text-align:center; width:100%; font-size:1em;">
                            Seguidos até<br>hoje
                        </b>
                    </div>
                </div>
                
            </div>
            <br><br><hr>
        </div>
        <div class="col-md-3"></div>
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
        <div class="col-md-2">
            <div style="text-align:center;">
                <img id="my_img" class="my_img_profile" src="<?php echo $my_img_profile;?>"/><br>
                <b><p id="my_name" style="font-size:1.2em; font-family:sans-serif;"><?php echo $my_login_profile;?></p></b>                        
                <?php
                    if($status['status_id']==1 ||$status['status_id']==6 || $status['status_id']==10)
                        echo '<b id="status_text" style="color:green; font-size:1.2em; font-family:sans-serif">'.$status["status_name"].'</b>';
                    else                   
                        echo '<b id="status_text" style="color:red; font-size:1.2em; font-family:sans-serif">'.$status["status_name"].'</b>';                    
                ?>
            </div>        
            <br><br>
        </div> 
        <div class="col-md-8">
            <div class="container-profiles">           
                <div class="row" style="padding:1%;">
                    <div  class="col-xs-10"> 
                        <div id="container_present_profiles" style="visibility:hidden; display:none">
                            <div class="col-xs-2" >
                                <div id="reference_profile0" class="container-reference-profile">
                                    <br><b title="Seguidos por mim para este perfil" class="red_number" id="cnt_follows_prof0" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                                    <img id="img_ref_prof0" class="img-circle image-reference-profile" src="">
                                    <br>
                                    <a id="lnk_ref_prof0" target="_blank" href="">
                                        <b id="name_ref_prof0" title="Ver no Instagram" style="font-family:sans-serif; font-size:1em;">                                    
                                        </b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-2" >
                                <div id="reference_profile1" class="container-reference-profile">
                                    <br><b title="Seguidos por mim para este perfil" class="red_number" id="cnt_follows_prof1" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                                    <img id="img_ref_prof1" class="img-circle image-reference-profile" src="">
                                    <br>
                                    <a id="lnk_ref_prof1" target="_blank" href="">
                                        <b id="name_ref_prof1" title="Ver no Instagram" style="font-family:sans-serif; font-size:1em;">                                
                                        </b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-2" >
                                <div id="reference_profile2" class="container-reference-profile">
                                    <br><b title="Seguidos por mim para este perfil" class="red_number" id="cnt_follows_prof2" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                                    <img id="img_ref_prof2" class="img-circle image-reference-profile" src="">
                                    <br>
                                    <a id="lnk_ref_prof2" target="_blank" href="">
                                        <b id="name_ref_prof2" title="Ver no Instagram" style="font-family:sans-serif; font-size:1em;">                                    
                                        </b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-2" >
                                <div id="reference_profile3" class="container-reference-profile">
                                    <br><b title="Seguidos por mim para este perfil" class="red_number" id="cnt_follows_prof3" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                                    <img id="img_ref_prof3" class="img-circle image-reference-profile" src="">
                                    <br>
                                    <a id="lnk_ref_prof3" target="_blank" href="">
                                        <b id="name_ref_prof3" title="Ver no Instagram" style="font-family:sans-serif; font-size:1em;">                                    
                                        </b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-2" >
                                <div id="reference_profile4" class="container-reference-profile">
                                    <br><b title="Seguidos por mim para este perfil" class="red_number" id="cnt_follows_prof4" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                                    <img id="img_ref_prof4" class="img-circle image-reference-profile" src="">
                                    <br>
                                    <a id="lnk_ref_prof4" target="_blank" href="">
                                        <b id="name_ref_prof4" title="Ver no Instagram" style="font-family:sans-serif; font-size:1em;">                                    
                                        </b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-2" >
                                <div id="reference_profile5" class="container-reference-profile">
                                    <br><b title="Seguidos por mim para este perfil" class="red_number" id="cnt_follows_prof5" style="color:red;font-family:sans-serif; font-size:1em;"></b>
                                    <img id="img_ref_prof5" class="img-circle image-reference-profile" src="">
                                    <br>
                                    <a id="lnk_ref_prof5" target="_blank" href="">
                                        <b id="name_ref_prof5" title="Ver no Instagram" style="font-family:sans-serif; font-size:1em;">                                    
                                        </b>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="container_missing_profiles" style="visibility:hidden; display:none">
                            <br><br>
                            <img style="margin-left:15%;width:12%;opacity: 0.7;border-radius:40px" src="<?php echo base_url().'assets/img/add_reference_profiles.jpg'?>"/>
                            <b style="color:gray; font-size:1.3em;">Adicione seus Perfis de Referência aqui...</b>
                        </div>
                    </div>                    
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
                        <input id="credit_card_name" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" placeholder="Meu nome no cartão" required style="text-transform:uppercase;">                 
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
                        <li style="margin-bottom:0.7em;"> O Instagram só permite que você siga alredor de 7500 perfis. Precisamos que você siga máximo 6500 perfis para iniciar a ferramenta;
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