<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <?php $CI = & get_instance(); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="<?php echo $CI->T("Ganhar seguidores no Instagram | Ganhar ou Comprar Seguidores Reais e Ativos no Instagram", array(), $language); ?>">
        <meta name="description" content="<?php echo $CI->T("Ganhe seguidores no Instagram. www.dumbu.pro te permite ganhar seguidores no Instagram 100% reais e qualificados. Ganhe mais seguidores.", array(), $language); ?>">
        <meta name="keywords" content="<?php echo $CI->T("ganhar, seguidores, Instagram, seguidores segmentados, curtidas, followers, geolocalizção, direct, vendas", array(), $language); ?>">
        <meta name="revisit-after" content="7 days">
        <meta name="robots" content="index,follow">
        <meta name="distribution" content="global">        
        <title><?php echo $CI->T("Get Followers on Instagram | Gain or Buy Real & Active Instagram Followers", array(), $language); ?></title>
        
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/icon.png' ?>"> 
        <link href="<?php echo base_url() . 'assets/css/typeahead.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'assets/css/loading.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'assets/css/style.css'; ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/default.css?'.$SCRIPT_VERSION; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/component.css?'.$SCRIPT_VERSION; ?>" />
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/ladda-themeless.min.css?'.$SCRIPT_VERSION; ?>">
        
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>      
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/typeahead.js'; ?>"></script>      
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/modernizr.custom.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/spin.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/ladda.min.js' ?>"></script>
        
        <script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script> 
        <script type="text/javascript">var language = '<?php echo $language; ?>';</script>
        <script type="text/javascript">var SERVER_NAME = '<?php echo $SERVER_NAME; ?>';</script>
        <script type="text/javascript">var unfollow_total = '<?php echo $unfollow_total; ?>';</script>        
        <script type="text/javascript">var autolike = '<?php echo $autolike; ?>';</script>
        <script type="text/javascript">var play_pause = '<?php echo $play_pause; ?>';</script>
        <script type="text/javascript">var my_login_profile = '<?php echo $my_login_profile; ?>';</script>
        <script type="text/javascript">followings_data= jQuery.parseJSON('<?php echo $followings; ?>');</script>
        <script type="text/javascript">followers_data= jQuery.parseJSON('<?php echo $followers; ?>'); </script>
        
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/' . $language . '/internalization.js?'.$SCRIPT_VERSION; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/client_painel.js?'.$SCRIPT_VERSION; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/talkme_painel.js?'.$SCRIPT_VERSION; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/update_client_painel.js?'.$SCRIPT_VERSION; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/canvasjs-1.9.6/canvasjs.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/chart.js?'.$SCRIPT_VERSION; ?>"></script>
         
        <?php //para SEO 
            if($SERVER_NAME=="ONE"){
                echo '<link rel="canonical" href="https://www.dumbu.one" />';
            }                              
        ?>
        
        <?php include_once("pixel_facebook.php") ?>
        
        <!--Start of Zendesk Chat Script-->
        <?php if ($SERVER_NAME == "PRO") { ?>
                <script type="text/javascript" src="<?php echo base_url() . 'assets/js/zendesk_chat_client.js'; ?>"></script>
        <?php } ?>
        <!--End of Zendesk Chat Script-->
    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>
        <?php if($SERVER_NAME=='ONE'){  include_once("anlaytics_only_one.php"); }   ?> 
        <?php include_once("remarketing.php") ?>
        <?php include_once("retargeting.php") ?>
        <div class="windows8">
            <div class="wBall" id="wBall_1">
                <div class="wInnerBall"></div>
            </div>
            <div class="wBall" id="wBall_2">
                <div class="wInnerBall"></div>
            </div>
            <div class="wBall" id="wBall_3">
                <div class="wInnerBall"></div>
            </div>
            <div class="wBall" id="wBall_4">
                <div class="wInnerBall"></div>
            </div>
            <div class="wBall" id="wBall_5">
                <div class="wInnerBall"></div>
            </div>
        </div>
        <header class="bk-black">
            <div class="container">
                <nav class="navbar navbar-default navbar-static-top">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="logo pabsolute fleft100 text-center">	
                        <a class="navbar-brand i-block" href="#">
                            <img alt="Brand" src="<?php echo base_url() . 'assets/images/logo.png'; ?>">
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url() . 'index.php/welcome/log_out' ?>"><img src="<?php echo base_url() . 'assets/images/user.png'; ?>" class="wauto us" alt=""><?php echo $CI->T("SAIR", array(), $language); ?></a></li>
                        
                        <?php
                        if($SERVER_NAME==='ONE'){                           
                        
                            echo '<li id="locales" class="dropdown">
                                <a  id="lnk_language1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
                                    if($language==='EN')
                                            echo '<img id="img_language1" src="'.base_url().'assets/images/en_flag.png" class="wauto us" alt="EN">
                                            <span id="txt_language1">EN</span>
                                            <span  class="caret"></span>';
                                        elseif($language==='PT') 
                                            echo '<img id="img_language1" alt="PT" src="'.base_url().'assets/images/pt_flag.png" class="wauto us"/>
                                                <span id="txt_language1">PT</span>
                                                <span  class="caret"></span>';
                                        else 
                                            echo '<img id="img_language1" alt="ES" src="'.base_url().'assets/images/es_flag.png" class="wauto us"/>
                                                <span id="txt_language1">ES</span>
                                                <span  class="caret"></span>';
                                 
                                echo '</a>
                                <ul class="dropdown-menu" style="min-width: 50px">
                                    <li>';
                                       
                                        if($language==='EN')
                                            echo '<a id="lnk_language2" href="#">
                                                <img id="img_language2" alt="PT" src="'.base_url().'assets/images/pt_flag.png" class="wauto us"/>
                                                <span id="txt_language2">PT</span>
                                            </a>';
                                        elseif($language==='PT') 
                                            echo '<a id="lnk_language2" href="#">
                                                    <img id="img_language2" alt="ES" src="'.base_url().'assets/images/es_flag.png" class="wauto us"/>
                                                    <span id="txt_language2">ES</span>
                                                </a>';
                                        else 
                                            echo '<a id="lnk_language2" href="#">
                                                    <img id="img_language2" alt="EN" src="'.base_url().'assets/images/en_flag.png" class="wauto us"/>
                                                    <span id="txt_language2">EN</span>
                                                </a>';
                                       
                                    echo '</li>
                                    <li>';
                                         if($language==='EN')
                                                echo '<a id="lnk_language3" href="#">
                                                    <img id="img_language3" alt="ES" src="'.base_url().'assets/images/es_flag.png" class="wauto us"/>
                                                    <span id="txt_language3">ES</span>
                                                </a>';
                                            elseif($language==='PT') 
                                                echo '<a id="lnk_language3" href="#">
                                                        <img id="img_language3" alt="EN" src="'.base_url().'assets/images/en_flag.png" class="wauto us"/>
                                                        <span id="txt_language3">EN</span>
                                                    </a>';
                                            else 
                                                echo '<a id="lnk_language3" href="#">
                                                        <img id="img_language3" alt="PT" src="'.base_url().'assets/images/pt_flag.png" class="wauto us"/>
                                                        <span id="txt_language3">PT</span>
                                                    </a>';
                                    echo '</li>
                                </ul>
                            </li>';
                        
                        }
                        ?>
                        
                        
                    </ul>
                </nav>
            </div>
        </header>

        <section id="perfil" class="fleft100">
            <div class="container">	


                <!---------------------------------------------------------------------------------------->
                <?php
                echo '<script type="text/javascript">';
                echo 'var plane_id=' . $plane_id . ';';
                if (isset($profiles))
                    echo 'var profiles=' . json_encode($profiles) . ';';
                else
                    echo 'var profiles=' . json_encode(array()) . ';';
                
                if (isset($MAX_NUM_PROFILES)){
                    echo 'var MAX_NUM_PROFILES=' . $MAX_NUM_PROFILES . ';';
                    echo 'var MAX_NUM_GEOLOCALIZATION=' . $MAX_NUM_PROFILES . ';';
                    echo 'var MAX_NUM_HASHTAG=' . $MAX_NUM_PROFILES . ';';
                }
                echo '</script>';
                ?>
                <!---------------------------------------------------------------------------------------->
                <br>
                <div class="row">
                    <?php
                    switch ($status['status_id']) {
                        case 3:
                            echo '
                                        <div id="activate_account" class="center" style="margin-left:25%; width:50%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">' . $CI->T("HABILITE SUA CONTA", array(), $language) . '</b><BR>
                                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("INFORME NOVAMENTE LOGIN E SENHA DE INSTAGRAM", array(), $language) . '</b>             
                                            <br><br>
                                            <form id="usersLoginForm"  action="#" method="#"  class="form" role="form" style="margin-left:25%;margin-right:25%;"  accept-charset="UTF-8" >                                
                                                <div class="form-group">                                                                
                                                     <input id="userLogin" type="text" class="form-control" value="' . $my_login_profile . '" disabled="true">
                                                </div>
                                                <div class="form-group">                                                                
                                                    <input id="userPassword" type="password" class="form-control" placeholder="' . $CI->T("Senha", array(), $language) . '" required>
                                                </div>                                                             
                                                <div class="form-group">
                                                    <button id="activate_account_by_status_3" class="btn btn-success btn-block ladda-button" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                                        <span class="ladda-label">' . $CI->T("ATIVAR AGORA", array(), $language) . '</span>
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
                                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">' . $CI->T("HABILITE SUA CONTA", array(), $language) . '</b><BR>
                                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("PRECISAMOS QUE VOCÊ ATUALIZE SEUS DADOS BANCÁRIOS", array(), $language) . '</b>  <BR>           
                                            <a id="lnk_update_data_bank" href="#lnk_update">
                                                <button id="btn_update_data_bank" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                                    ' . $CI->T("ATUALIZAR AGORA", array(), $language) . '
                                                </button>
                                            </a>
                                        </div>';
                            break;
                        case 6:
                            echo '
                                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">' . $CI->T("MANTENHA ATIVA SUA CONTA", array(), $language) . '</b><BR>
                                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("PRECISAMOS QUE VOCÊ ATUALIZE SEUS DADOS BANCÁRIOS", array(), $language) . '</b>  <BR>           
                                            <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("NÃO FOI POSSIVEL REALIZAR O PAGAMENTO NA DATA CORRESPONTE", array(), $language) . '</b><BR>
                                            <a id="lnk_update_data_bank" href="#lnk_update">
                                                <button id="btn_update_data_bank" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                                    ' . $CI->T("ATUALIZAR AGORA", array(), $language) . '
                                                </button>
                                            </a>
                                        </div>';
                            break;
                        case 7:
                            echo '
                                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                            <b id="message_status1" style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">' . $CI->T("ATENÇÂO", array(), $language) . '</b>
                                            <b id="message_status2" style="margin:1%; font-family:sans-serif; font-size:0.8em;"><BR>' . $CI->T("PRECISAMOS QUE VOCÊ SIGA MÁXIMO 6500 PERFIS NO INSTAGRAM PARA INICIAR A FERRAMENTA NO SEU PERFIL", array(), $language) . '</b><BR>
                                        </div>';
                            break;
                        case 9:
                            if (isset($verify_account_datas) && is_array($verify_account_datas)) {
                                if ($verify_account_datas['verify_account_url'] != "") {
                                    
                                    echo '
                                            <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                                <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">' . $CI->T("ATIVE SUA CONTA", array(), $language) . '</b><br>
                                                <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("PRECISAMOS QUE VOCÊ VERIFIQUE SUA CONTA", array(), $language) . '</b> <br><br>
                                                <label>' . $CI->T("PASSO 1: Solicite seu código de segurança ", array(), $language) . '</label>
                                                <a id="lnk_security_code_request" style="color:blue;font-size:1em;">' . $CI->T("AQUÍ", array(), $language) . '</a>
                                                <label>' . $CI->T("PASSO 2: Agora insira o código de 6 dígitos que foi enviado ao seu email cadastrado em Instagram", array(), $language) . '</label> <br>
                                                <label>' . $CI->T("ATENÇÂO: O envío do código poder demorar um poquinho. Procure bem na caixa de Recebidos, Social, ou Promoções", array(), $language) . '</label> <br>
                                                <input id="security_code" class="text-center" type="text" minlength="6" maxlength="6" size="6" placeholder="______" disabled> <br>
                                                <button id="btn_confirm_new" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff" disabled>
                                                    ' . $CI->T("CONFIRMAR", array(), $language) . '
                                                </button>
                                            </div>';
                                            
                                    /*echo '
                                            <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                                <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">' . $CI->T("ATIVE SUA CONTA", array(), $language) . '</b><br>
                                                <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("PRECISAMOS QUE VOCÊ VERIFIQUE SUA CONTA", array(), $language) . '</b> <br><br>
                                                <label>' . $CI->T("PASSO 1: Ative sua conta diretamente no Indtagram ", array(), $language) . '</label>                                               
                                                <label>' . $CI->T("PASSO 2: Contate nosso atendimento para resolver o problema", array(), $language) . '</label> <br>                                                
                                            </div>';*/

                                    /*echo '  <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                                <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">' . $CI->T("ATIVE SUA CONTA", array(), $language) . '</b><BR>
                                                <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("PRECISAMOS QUE VOCÊ VERIFIQUE SUA CONTA DIRETAMENTE NO INSTAGRAM COMO MEDIDA DE SEGURANÇA", array(), $language) . '</b>  <br>           
                                                <a id="lnk_verify_account" target="_blank" style="color:black;font-size:1em;"  href="' . $verify_account_datas['verify_account_url'] . '">
                                                    <button id="btn_verify_account" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                                        ' . $CI->T("ATIVAR AGORA", array(), $language) . '
                                                    </button>
                                                </a>
                                            </div>';*/ 
                                } else
                                    echo '
                                            <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                                <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;">' . $CI->T("ATIVE SUA CONTA", array(), $language) . '</b><BR>
                                                <b style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("PRECISAMOS QUE VOCÊ VERIFIQUE SUA CONTA DIRETAMENTE NO INSTAGRAM COMO MEDIDA DE SEGURANÇA", array(), $language) . '</b>                                             
                                            </div>';
                            }
                            break;
                        case 10:
                            echo '
                                        <div class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                                            <b id="message_status2" style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("SUA CONTA ESTA TEMPORÁRIAMENTE LIMITADA NO DUMBU DEVIDO A RESTRIÇÕES DE TEMPO COM O INSTRAGRAM", array(), $language) . '</b>  <BR>           
                                            <b id="message_status2" style="margin:1%; font-family:sans-serif; font-size:0.8em;">' . $CI->T("EM POUCO TEMPO SERÁ RESTABELECIDO O SERVIÇO PARA VOCÊ", array(), $language) . '</b><BR>           
                                        </div>';
                            break;
                    }
                    ?>
                </div>

                <div id="reference_profile_status_container" class="row" style="visibility:hidden;display:none">        
                    <div id="reference_profile_status_message" class="center" style="margin-left:20%; width:60%; padding: 2%;  border:1px solid red; border-radius:5px ">
                        <div class="center">
                            <b style="margin:1%; font-family:sans-serif; font-size:1em; color:red;"><?php echo $CI->T("PERFIS DE REFERÊNCIA COM PROBLEMA. CONSIDERE TROCAR", array(), $language); ?></b>
                            <hr><BR>
                        </div>

                        <div style="text-align:center">
                            <ul id="reference_profile_status_list">

                            </ul>
                        </div>
                        <div class="center">
                            <button id="btn_RP_status" type="button" style="margin:1%; color:white;font-size:1em; " class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                <?php echo $CI->T("ACEITAR", array(), $language); ?>
                            </button>
                        </div>            
                    </div>
                </div>
<!---------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------->

                <!-- Single button -->
                <div class="btn-group fleft100 m-tb20">
                    <button type="button" class="btn btn-drop fleft100 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b><?php echo $CI->T("AVISOS IMPORTANTES", array(), $language); ?></b> <img src="<?php echo base_url() . 'assets/images/seta.png'; ?>" alt="" class="wauto fright">
                    </button>
                    <ul class="dropdown-menu drop-lista bk-cinza fleft100">
                        <li><?php echo $CI->T("O Instagram só permite que você siga 7.500 perfis no total. Se você segue entre 6.000 e 7.500, precisarémos desseguir perfis para iniciar a ferramenta;", array(), $language); ?></li>
                        <li><?php echo $CI->T("Nossa ferramenta é integrada ao instagram, por isso, pode sofrer variações no desempenho a cada atualização feita pelo instagram;", array(), $language); ?></li>
                        <li><?php echo $CI->T("Caso altere sua senha ou usuário, não se preocupe, basta você efetuar login em nosso site e pronto! Sua conta será atualizada automatcamente;", array(), $language); ?></li>
                        <li><?php echo $CI->T("Nunca deixe sua conta privada, você conseguirá captar mais seguidores se eles puderem ver seu conteúdo e se identificarem com seu perfil;", array(), $language); ?></li>
                        <li><?php echo $CI->T("Nunca escolha perfis privados ou com poucos seguidores.", array(), $language); ?></li>
                    </ul>
                </div>
                
                
                <div class="col-md-12 col-sm-12 col-xs-12 m-t20">
                    <div class="col-md-1 col-sm-1 col-xs-12"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12"></div>
                    
                     <!--<<div style="font-size:0.9rem" class="col-md-4 col-sm-4 col-xs-12 bk-cinza pf-novidades m-t20 text-justify">
                       span>
                            <img src="<?php //echo base_url() . 'assets/images/ESTRELA.png'; ?>" width="20px" class="wauto" alt="">
                            <?php //echo $CI->T('Novidades', array(), $language); ?>
                        </span>
                        <br>
                        <p >
                            <?php //echo $CI->T('Agora a Dumbu disponibiliza dois novos recursos: ', array(), $language); ?><br>
                        </p>
                        <p class="m-t10">
                            <b><?php //echo $CI->T('AutoLike - ', array(), $language); ?></b> <?php //echo $CI->T('Permite que sua conta, além de seguir, interaja com as contas através de um like na ultima foto postada.', array(), $language); ?><br>
                        </p> 
                        <p class="m-t10">
                            <b><?php //echo $CI->T('Geolocalização - ', array(), $language); ?></b> <?php //echo $CI->T('Agora você pode captar seguidores a partir de qualquer região, é só adicionar um local e pronto!', array(), $language); ?><br>
                        </p>
                    </div>-->                    
                    <div class="col-md-2 col-sm-2 col-xs-12 text-center bloco m-t20">
                            <img id="my_img" src="<?php echo $my_img_profile; ?>" class="img50" alt="">
                            <b><p id="my_name" style="font-size:1.2em; font-family:sans-serif;"><?php echo $my_login_profile; ?></p></b> 
                            <!--<span class="fleft100 m-t10">@pedropetti</span>-->
                            <span class="fleft100 cl-green">
                                <?php
                                if ($status['status_id'] == 1 || $status['status_id'] == 6 || $status['status_id'] == 10) {
                                    if ($play_pause) {
                                        echo '<b id="status_text_paused" >' . $CI->T('PAUSADO', array(), $language) . '</b>';
                                        echo '<b id="status_text" style="font-family:sans-serif; display:none">' . $CI->T($status["status_name"], array(), $language) . '</b>';
                                    }
                                    else {
                                        echo '<b id="status_text" style="font-family:sans-serif">' . $CI->T($status["status_name"], array(), $language) . '</b>';
                                        echo '<b id="status_text_paused" style="display:none">' . $CI->T('PAUSADO', array(), $language) . '</b>';
                                    }
                                }
                                else
                                    echo '<b id="status_text" ">' . $CI->T($status["status_name"], array(), $language) . '</b>';
                                ?>
                            </span>
                    </div>
                    <!--<div class="col-md-5 col-sm-5 col-xs-12 text-center bloco ">
                        <div class="btn-group fleft100">
                            <button type="button" class="btn btn-drop fleft100 dropdown-toggle bk-cinza pf-novidades" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <b><?php //echo $CI->T("AVISOS IMPORTANTES", array(), $language); ?></b> <img src="<?php //echo base_url() . 'assets/images/seta.png'; ?>" alt="" class="wauto fright">
                            </button>
                            <ul class="dropdown-menu drop-lista bk-cinza pf-novidades fleft100">
                                <p class="m-t10 text-justify pf-avisos"><b><?php //echo $CI->T("O Instagram só permite que você siga 7.500 perfis no total. Se você segue entre 6.000 e 7.500, precisarémos desseguir perfis para iniciar a ferramenta;", array(), $language); ?></b></p>
                                <p class="m-t10 text-justify pf-avisos"><b><?php //echo $CI->T("Nossa ferramenta é integrada ao instagram, por isso, pode sofrer variações no desempenho a cada atualização feita pelo instagram;", array(), $language); ?></b></p>
                                <p class="m-t10 text-justify pf-avisos"><b><?php //echo $CI->T("Caso altere sua senha ou usuário, não se preocupe, basta você efetuar login em nosso site e pronto! Sua conta será atualizada automatcamente;", array(), $language); ?></b></p>
                                <p class="m-t10 text-justify pf-avisos"><b><?php //echo $CI->T("Nunca deixe sua conta privada, você conseguirá captar mais seguidores se eles puderem ver seu conteúdo e se identificarem com seu perfil;", array(), $language); ?></b></p>
                                <p class="m-t10 text-justify pf-avisos"><b><?php //echo $CI->T("Nunca escolha perfis privados ou com poucos seguidores.", array(), $language); ?></p>
                            </ul>
                        </div>
                    </div>-->
                        <?php if($plane_id=='5'){?>
                            <div style="font-size:0.9rem" class="col-md-4 col-sm-4 col-xs-12 bk-cinza pf-novidades m-t20 text-justify">
                                <span>
                                    <img src="<?php echo base_url() . 'assets/images/ESTRELA.png'; ?>" width="20px" class="wauto" alt="">
                                    <?php echo $CI->T('Novidades', array(), $language); ?>
                                </span>
                                <br>
                                <p >
                                    <b>WhatsApp - </b><?php echo $CI->T('A Dumbu oferece atendimento por Whatsapp para os assinante do plano TURBO', array(), $language); ?><br>
                                </p>
                                <p class="text-center m-t10">                                
                                    <img src="<?php echo base_url().'assets/images/watsapp.png'?>" style="width:30px" alt=""><b> <?php echo ' '.$WHATSAPP_PHONE;?>   </b> 
                                </p> 
                            </div>  
                    <?php } ?>
                </div>
                
                <?php if ($status['status_id'] == 1 || $status['status_id'] == 6 || $status['status_id'] == 10) { ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 m-t20">
                        <div class="col-md-3 col-sm-3 col-xs-12"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 text-center bloco m-t20">
                            <p style="text-align:center"> <?php echo $CI->T('Play/Pause da ferramenta.', array(), $language); ?>
                            </p>
                            <?php
                            if ($play_pause) {
                                echo '<button type="button" id="button_play_pause" class="btn" style="width:80px; height:40px; background-color:#009CDE; border-radius:20px; padding-top:5px">
                                        <span id="playIcon" class="glyphicon glyphicon-play" style="color:white"></span><b style="color:white"> Play</b>
                                      </button>';
                            }
                            else {
                                echo '<button type="button" id="button_play_pause" class="btn" style="width:80px; height:40px; background-color:#DFDFDF; border-radius:20px; padding-top:5px">
                                        <span id="pauseIcon" class="glyphicon glyphicon-pause"></span><b> Pause</b>
                                      </button>';
                            } ?>
                            <p style="text-align:center"> <?php echo $CI->T('ATENÇÃO: A reativação da ferramenta pode demorar até 24 horas no máximo.', array(), $language); ?>
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12"></div>
                    </div>
                <?php } ?>
                
                <!--<div class="text-center m-t30">
                    <img id="my_img" src="<?php //echo $my_img_profile; ?>" class="img50" alt="">
                    <b><p id="my_name" style="font-size:1.2em; font-family:sans-serif;"><?php //echo $my_login_profile; ?></p></b> 
                    
                    <span class="fleft100 cl-green">
                        <?php
                        /*if ($status['status_id'] == 1 || $status['status_id'] == 6 || $status['status_id'] == 10)
                            echo '<b id="status_text" style="font-family:sans-serif">' . $CI->T($status["status_name"], array(), $language) . '</b>';
                        else
                            echo '<b id="status_text" ">' . $CI->T($status["status_name"], array(), $language) . '</b>';
                        */?>
                    </span>
                </div>-->
                
                
                <!----------------------------------------------------------------------------------------------------------------------------------->
                <!--REFERENCES PROFILES-->
                <div class="pf fleft100 text-center m-t30">
                    <div class="m-t60 text-center">
                        <ul>
                            <li>
                                <img src="<?php echo base_url() . 'assets/images/perfis.png'; ?>" class="wauto"/>                            
                            </li>
                            <li></li>
                            <li>
                                <h4 class="m-t10"><b><?php echo $CI->T("PERFIS DE REFERÊNCIA", array(), $language); ?></b></h4>
                            </li>
                        </ul>    
                    </div>                

                    <div class="m-t10 text-center">
                        <p class="fleft100"><?php echo $CI->T("O Dumbu seguirá os usuários que seguem os perfis de referência que você escolher, uma parte <br>desses usuários o seguirão de volta e após um determinado tempo deixaremos de <br>seguir esses usuários. Adicione seus perfis de referência aqui:", array(), $language); ?></p>
                    </div>                

                    <br>
                    <div class="col-md-1 col-sm-1 col-xs-12 text-center"></div>
                    <div class="col-md-10 col-sm-10 col-xs-12 text-center ">
                        <div class="m-t60 text-center">
                            <div class="num">
                                <span class="fleft">
                                    <img src="<?php echo base_url() . 'assets/images/bol-g.png'; ?>" class="wauto" alt="">
                                    <?php echo $CI->T('Número de perfis já seguidos ', array(), $language) . ' ' . $amount_followers_by_reference_profiles; ?>
                                </span>
                                <span class="fright">
                                    <?php echo $reference_profile_used . ' ' . $CI->T('Perfis de referência utilizados até hoje', array(), $language); ?>
                                </span>
                            </div>
                            <div class="fleft100 bk-cinza pf-painel">
                                <ul class="add-perfil text-center">
                                    <li>
                                        <div id="reference_profile0" class="container-reference-profile"> 
                                                <img id="img_ref_prof0" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>">                                             
                                            <br>
                                            <a id="lnk_ref_prof0" target="_blank" href="#">
                                                <small id="name_ref_prof0" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_prof0" title='<?php echo $CI->T("Seguidos por mim para este perfil", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="reference_profile1" class="container-reference-profile">                                                                    
                                            <img id="img_ref_prof1" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_ref_prof1" target="_blank" href="#">
                                                <small id="name_ref_prof1" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_prof1" title='<?php echo $CI->T("Seguidos por mim para este perfil", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="reference_profile2" class="container-reference-profile">                                                                    
                                            <img id="img_ref_prof2" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_ref_prof2" target="_blank" href="#">
                                                <small id="name_ref_prof2" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_prof2" title='<?php echo $CI->T("Seguidos por mim para este perfil", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="reference_profile3" class="container-reference-profile">                                                                    
                                            <img id="img_ref_prof3" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_ref_prof3" target="_blank" href="#">
                                                <small id="name_ref_prof3" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_prof3" title='<?php echo $CI->T("Seguidos por mim para este perfil", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="reference_profile4" class="container-reference-profile">                                                                    
                                            <img id="img_ref_prof4" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_ref_prof4" target="_blank" href="#">
                                                <small id="name_ref_prof4" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_prof4" title='<?php echo $CI->T("Seguidos por mim para este perfil", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="reference_profile5" class="container-reference-profile">                                                                    
                                            <img id="img_ref_prof5" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_ref_prof5" target="_blank" href="#">
                                                <small id="name_ref_prof5" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_prof5" title='<?php echo $CI->T("Seguidos por mim para este perfil", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li class="add"><img id="btn_add_new_profile" src="<?php echo base_url() . 'assets/images/+.png'; ?>" class="wauto" alt="" type="button" data-toggle="modal" data-target="#myModal"></li>
                                </ul>
                            </div>
                            <!--<div class="num fleft100"><b>Dica:</b><?php //echo $CI->T("Lembre-se que para garantir um bom desempenho da ferramenta você deve adicionar perfis de referência que combine com o seu perfil. Para mais informação, consulte nossa ", array(), $language); ?><a href="<?php //echo base_url() . 'index.php/welcome/help' ?>" style="color:green" target="_blank"><?php //echo $CI->T("Ajuda!", array(), $language); ?></a></div>-->
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-12 text-center"></div>
                    
                    <!-- Modal -->
                    <div class="modal fade" style="top:10%" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div id="modal_container_add_reference_rpofile" class="modal-dialog modal-sm" role="document">                                                          
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <img src="<?php echo base_url() . 'assets/images/FECHAR.png'; ?>"> <!--<span aria-hidden="true">&times;</span>-->
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo $CI->T("Perfil de referência", array(), $language); ?></h4>
                                </div>
                                <div class="modal-body text-left">  
                                    <div class="row">
                                        <!--<input id = "login_profile"  type="text" style="text-transform:lowercase" class="typeahead form-control tt-query" placeholder="<?php echo $CI->T("Perfil", array(), $language); ?>" onkeyup="javascript:this.value = this.value.toLowerCase();"  autocomplete="off" spellcheck="false"  required> -->
                                        <div class="col-sm-12">
                                            <input id = "login_profile"  type="text" style="text-transform:lowercase;" class="form-control" placeholder="<?php echo $CI->T("Perfil", array(), $language); ?>" autocomplete="off" spellcheck="false" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="container_search_profile" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                            <table id="table_search_profile" class="table">                                
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="reference_profile_message" class="form-group m-t10" style="text-align:left;visibility:hidden; font-family:sans-serif; font-size:0.9em"> </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn_insert_profile" type="button" class="btn btn-primary text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                        <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("Adicionar", array(), $language); ?></div></span>
                                    </button>
                                </div>
                            </div>
                        </div>                                                        
                    </div> 
                </div> 

               
                <!----------------------------------------------------------------------------------------------------------------------------------->
                <!--GEOLOCALIZACION-->
                
                    <div style="z-index:1;" class="pf fleft100 text-center m-t30">
                            <div class="m-t60 text-center">
                                <ul>  
                                    <li>
                                        <img src="<?php echo base_url() . 'assets/images/geolocalizacao.png'; ?>" class="wauto"/>                            
                                    </li>
                                    <li></li>
                                    <li>
                                        <h4 class="m-t10"><b><?php echo $CI->T("GEOLOCALIZAÇÃO", array(), $language); ?></b></h4>
                                    </li>
                                </ul>    
                            </div>

                            <div class="m-t10 text-center">
                                <p class="fleft100">
                                    <?php echo $CI->T("Adicione localizações e melhore seu desempenho! Agora você pode adicionar locais estratégicos e aumentar a qualidade da sua captação acertando seu público alvo pela geolocalização.", array(), $language); ?> 
                                     <?php
                                        //if ($language==='PT')
                                            echo '<a id="dicas_geoloc" style="color:green; margin-top:7%">                                                    
                                                        '.$CI->T("Veja dicas aqui", array(), $language).'.
                                                </a>';
                                        ?>                                
                                </p>
                            </div>                

                            <br>
                            <div class="col-md-1 col-sm-1 col-xs-12 text-center"></div>
                            <div class="col-md-10 col-sm-10 col-xs-12 text-center ">
                                <div class="m-t60 text-center">
                                    <div class="num">
                                        <span class="fleft">
                                            <img src="<?php echo base_url() . 'assets/images/bol-g.png'; ?>" class="wauto" alt="">
                                            <?php echo $CI->T('Número de perfis já seguidos ', array(), $language) . ' ' . $amount_followers_by_geolocalization; ?>
                                        </span>
                                        <span class="fright">
                                            <?php echo $geolocalization_used . ' ' . $CI->T('Localizações utilizadas até hoje', array(), $language); ?>
                                        </span>
                                    </div>
                                    <div class="fleft100 bk-cinza pf-painel">
                                        <ul class="add-perfil text-center">
                                            <li>
                                                <div id="geolocalization0" class="container-geolocalization">                                                                    
                                                    <img id="img_geolocalization0" class="img_geolocalization wauto" src="<?php echo base_url() . 'assets/images/avatar_geolocalization.jpg'; ?>"> 
                                                    <br>
                                                    <a id="lnk_geolocalization0" target="_blank" href="#">
                                                        <small id="name_geolocalization0" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                                    </a>
                                                    <b id="cnt_follows_geolocalization0" title='<?php echo $CI->T("Seguidos por mim para esta localização", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                                </div>
                                            </li>

                                            <li>
                                                <div id="geolocalization1" class="container-geolocalization">                                                                    
                                                    <img id="img_geolocalization1" class="img_geolocalization wauto" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar_geolocalization.jpg'; ?>"> 
                                                    <br>
                                                    <a id="lnk_geolocalization1" target="_blank" href="#">
                                                        <small id="name_geolocalization1" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                                    </a>
                                                    <b id="cnt_follows_geolocalization1" title='<?php echo $CI->T("Seguidos por mim para essa localização", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                                </div>
                                            </li>

                                            <li>
                                                <div id="geolocalization2" class="container-geolocalization">                                                                    
                                                    <img id="img_geolocalization2" class="img_geolocalization wauto" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar_geolocalization.jpg'; ?>"> 
                                                    <br>
                                                    <a id="lnk_geolocalization2" target="_blank" href="#">
                                                        <small id="name_geolocalization2" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                                    </a>
                                                    <b id="cnt_follows_geolocalization2" title='<?php echo $CI->T("Seguidos por mim para essa localização", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                                </div>
                                            </li>

                                            <li>
                                                <div id="geolocalization3" class="container-geolocalization">                                                                    
                                                    <img id="img_geolocalization3" class="img_geolocalization wauto" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar_geolocalization.jpg'; ?>"> 
                                                    <br>
                                                    <a id="lnk_geolocalization3" target="_blank" href="#">
                                                        <small id="name_geolocalization3" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                                    </a>
                                                    <b id="cnt_follows_geolocalization3" title='<?php echo $CI->T("Seguidos por mim para essa localização", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                                </div>
                                            </li>

                                            <li>
                                                <div id="geolocalization4" class="container-geolocalization">                                                                    
                                                    <img id="img_geolocalization4" class="img_geolocalization wauto" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar_geolocalization.jpg'; ?>"> 
                                                    <br>
                                                    <a id="lnk_geolocalization4" target="_blank" href="#">
                                                        <small id="name_geolocalization4" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                                    </a>
                                                    <b id="cnt_follows_geolocalization4" title='<?php echo $CI->T("Seguidos por mim para essa localização", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                                </div>
                                            </li>

                                            <li>
                                                <div id="geolocalization5" class="container-geolocalization">                                                                    
                                                    <img id="img_geolocalization5" class="img_geolocalization wauto" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar_geolocalization.jpg'; ?>"> 
                                                    <br>
                                                    <a id="lnk_geolocalization5" target="_blank" href="#">
                                                        <small id="name_geolocalization5" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                                    </a>
                                                    <b id="cnt_follows_geolocalization5" title='<?php echo $CI->T("Seguidos por mim para essa localização", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                                </div>
                                            </li>

                                            <li class="add"><img id="btn_add_new_geolocalization" src="<?php echo base_url() . 'assets/images/+.png'; ?>" class="wauto" alt="" type="button" data-toggle="modal" data-target="#myModal_geolocalization"></li>
                                        </ul>
                                    </div>
                                    <!--<div class="num fleft100"><b>Dica:</b><?php //echo $CI->T("Lembre-se que para garantir um bom desempenho da ferramenta você deve adicionar perfis de referência que combine com o seu perfil. Para mais informação, consulte nossa ", array(), $language); ?><a href="<?php //echo base_url() . 'index.php/welcome/help' ?>" style="color:green" target="_blank"><?php //echo $CI->T("Ajuda!", array(), $language); ?></a></div>-->
                                </div>
                            <div class="col-md-1 col-sm-1 col-xs-12 text-center"></div>
                            <?php if($plane_id==1 || $plane_id>3){?>
                            <!-- Modal -->
                            <div class="modal fade" style="top:10%" id="myModal_geolocalization" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div id="modal_container_add_geolocalization" class="modal-dialog modal-sm" role="document">                                                          
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="<?php echo base_url() . 'assets/images/FECHAR.png'; ?>"> <!--<span aria-hidden="true">&times;</span>-->
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $CI->T("Geolocalização", array(), $language); ?></h4>
                                        </div>
                                        <div class="modal-body">  
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input id = "login_geolocalization" type="text" class="form-control" placeholder="<?php echo $CI->T("Localização", array(), $language); ?>" style="text-transform:lowercase;" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div id="container_search_geolocalization" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                    <table id="table_search_geolocalization" class="table">                                
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div id="geolocalization_message" class="form-group m-t10" style="text-align:left;visibility:hidden; font-family:sans-serif; font-size:0.9em"> </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="btn_insert_geolocalization" type="button" class="btn btn-primary text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                                <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("Adicionar", array(), $language); ?></div></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>                                                        
                            </div>   
                            <?php } else { ?>
                            
                            <!-- Modal -->
                            <div class="modal fade" style="top:30%" id="myModal_geolocalization" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div id="modal_container_add_geolocalization" class="modal-dialog modal-sm" role="document">                                                          
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="<?php echo base_url() . 'assets/images/FECHAR.png'; ?>"> <!--<span aria-hidden="true">&times;</span>-->
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("DISPONÍVEL PARA OS", array(), $language); ?></b></h4>
                                            <h4 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("PLANOS RÁPIDO E TURBO", array(), $language); ?></b></h4>
                                        </div>
                                        <div class="modal-body">                                            
                                            <p class="modal-title" id="myModalLabel"><?php echo $CI->T("Migre agora mesmo sua conta para uma dessas velocidades e disfrute deste recurso", array(), $language); ?></p>
                                            <p class="modal-title" id="myModalLabel"><?php echo $CI->T("", array(), $language); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#lnk_update"><button id="upgrade_plane" type="button" class="btn btn-success text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                                <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("MIGRAR DE VELOCIDADE", array(), $language); ?></div></span>
                                            </button></a>
                                        </div>
                                    </div>
                                </div>                                                        
                            </div>       
                            <?php }?>
                    </div>
               
                <!----------------------------------------------------------------------------------------------------------------------------------->        
                <!--HASHTAG-->     
                
                <div class="pf fleft100 text-center m-t30">
                    <div class="m-t60 text-center">
                        <ul>
                            <li>
                                <img src="<?php echo base_url() . 'assets/images/avatar_hashtag.png'; ?>" class="wauto"/>                            
                            </li>
                            <li></li>
                            <li>
                                <h4 class="m-t10"><b>HASHTAG</b></h4>
                            </li>
                        </ul>    
                    </div>                

                    <div class="m-t10 text-center">
                        <p class="fleft100"><?php echo $CI->T("Adicione hashtags para aprimorar sua captação de seguidores e qualificar seu desempenho. Sempre escolha hashtags que tenham relação com seu negócio ou perfil, assim você irá acertar o público alvo que mais lhe interessa. Você pode pesquisar por hashtags na área de busca do Instagram e escolher quais você deseja utilizar.", array(), $language); ?></p>
                    </div>                

                    <br>
                    <div class="col-md-1 col-sm-1 col-xs-12 text-center"></div>
                    <div class="col-md-10 col-sm-10 col-xs-12 text-center ">
                        <div class="m-t60 text-center">
                            <div class="num">
                                <span class="fleft">
                                    <img src="<?php echo base_url() . 'assets/images/bol-g.png'; ?>" class="wauto" alt="">
                                    <?php echo $CI->T('Número de perfis já seguidos ', array(), $language) . ' ' . $amount_followers_by_hashtag; ?>
                                </span>
                                <span class="fright">
                                    <?php echo $hashtag_used . ' ' . $CI->T('Hashtags utilizados até hoje', array(), $language); ?>
                                </span>
                            </div>
                            <div class="fleft100 bk-cinza pf-painel">
                                <ul class="add-perfil text-center">
                                    <li>
                                        <div id="hashtag0" class="container-reference-profile"> 
                                                <img id="img_hashtag0" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>">                                             
                                            <br>
                                            <a id="lnk_hashtag0" target="_blank" href="#">
                                                <small id="name_hashtag0" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_hashtag0" title='<?php echo $CI->T("Seguidos por mim para esse hashtag", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="hashtag1" class="container-reference-profile">                                                                    
                                            <img id="img_hashtag1" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_hashtag1" target="_blank" href="#">
                                                <small id="name_hashtag1" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_prof1" title='<?php echo $CI->T("Seguidos por mim para esse hashtag", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="hashtag2" class="container-reference-profile">                                                                    
                                            <img id="img_hashtag2" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_hashtag2" target="_blank" href="#">
                                                <small id="name_hashtag2" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_hashtag2" title='<?php echo $CI->T("Seguidos por mim para esse hashtag", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="hashtag3" class="container-reference-profile">                                                                    
                                            <img id="img_hashtag3" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_hashtag3" target="_blank" href="#">
                                                <small id="name_hashtag3" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_hashtag3" title='<?php echo $CI->T("Seguidos por mim para esse hashtag", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="hashtag4" class="container-reference-profile">                                                                    
                                            <img id="img_hashtag4" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_hashtag4" target="_blank" href="#">
                                                <small id="name_hashtag4" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_hashtag4" title='<?php echo $CI->T("Seguidos por mim para esse hashtag", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li>
                                        <div id="hashtag5" class="container-reference-profile">                                                                    
                                            <img id="img_hashtag5" class="img_profile" style="width:70px" src="<?php echo base_url() . 'assets/images/avatar.png'; ?>"> 
                                            <br>
                                            <a id="lnk_hashtag5" target="_blank" href="#">
                                                <small id="name_hashtag5" title="<?php echo $CI->T("Ver no Instagram", array(), $language); ?>" style="color:black" class="fleft100 m-t10"></small>
                                            </a>
                                            <b id="cnt_follows_hashtag5" title='<?php echo $CI->T("Seguidos por mim para esse hashtag", array(), $language); ?>' class="cl-green fleft100 red_number">0</b>
                                        </div>
                                    </li>

                                    <li class="add"><img id="btn_add_new_hashtag" src="<?php echo base_url() . 'assets/images/+.png'; ?>" class="wauto" alt="" type="button" data-toggle="modal" data-target="#myModal_hashtag"></li>
                                </ul>
                            </div>
                            <!--<div class="num fleft100"><b>Dica:</b><?php //echo $CI->T("Lembre-se que para garantir um bom desempenho da ferramenta você deve adicionar perfis de referência que combine com o seu perfil. Para mais informação, consulte nossa ", array(), $language); ?><a href="<?php //echo base_url() . 'index.php/welcome/help' ?>" style="color:green" target="_blank"><?php //echo $CI->T("Ajuda!", array(), $language); ?></a></div>-->
                        </div>
                    </div>

                    <div class="col-md-1 col-sm-1 col-xs-12 text-center"></div>
                    <?php if ($plane_id == 1 || $plane_id > 3) { ?>
                    <!-- Modal -->
                    <div class="modal fade" style="top:10%" id="myModal_hashtag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div id="modal_container_add_hashtag" class="modal-dialog modal-sm" role="document">                                                          
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <img src="<?php echo base_url() . 'assets/images/FECHAR.png'; ?>"> <!--<span aria-hidden="true">&times;</span>-->
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Hashtag</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-1" style="padding-right: 5px">
                                                <label for="login_hashtag" style="text-align: right;">#</label>
                                            </div>
                                            <div class="col-sm-11" style="padding-left: 5px">
                                                <input id = "login_hashtag" type="text" class="form-control" style="text-transform:lowercase; font-size: 14px;" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="container_search_hashtag" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                <table id="table_search_hashtag" class="table">                                
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="hashtag_message" class="form-group m-t10" style="text-align:left;visibility:hidden; font-family:sans-serif; font-size:0.9em"> </div>
                                        </div>
                                    </div>
                                </div>
<!--                                <div style="width:100%; min-height:120px; max-height:150px; overflow-y: scroll;" class="modal-body">
                                    
                                </div>-->
                                <div class="modal-footer">
                                    <button id="btn_insert_hashtag" type="button" class="btn btn-primary text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                        <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("Adicionar", array(), $language); ?></div></span>
                                    </button>
                                </div>
                            </div>
                        </div>                                                        
                    </div>   
                    <?php } else { ?>
                    <!-- Modal -->
                    <div class="modal fade" style="top:30%" id="myModal_hashtag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div id="modal_container_add_hashtag" class="modal-dialog modal-sm" role="document">                                                          
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <img src="<?php echo base_url() . 'assets/images/FECHAR.png'; ?>"> <!--<span aria-hidden="true">&times;</span>-->
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("DISPONÍVEL PARA OS", array(), $language); ?></b></h4>
                                    <h4 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("PLANOS RÁPIDO E TURBO", array(), $language); ?></b></h4>
                                </div>
                                <div class="modal-body">                                            
                                    <p class="modal-title" id="myModalLabel"><?php echo $CI->T("Migre agora mesmo sua conta para uma dessas velocidades e disfrute deste recurso", array(), $language); ?></p>
                                    <p class="modal-title" id="myModalLabel"><?php echo $CI->T("", array(), $language); ?></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#lnk_update"><button id="upgrade_plane" type="button" class="btn btn-success text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                        <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("MIGRAR DE VELOCIDADE", array(), $language); ?></div></span>
                                    </button></a>
                                </div>
                            </div>
                        </div>                                                        
                    </div>       
                    <?php }?> 
                </div>
                
                <!----------------------------------------------------------------------------------------------------------------------------------->        
                <!--PERFOMANCE-->                                 

                <div class="pf fleft100 text-center m-t45">
                    <img src="<?php echo base_url() . 'assets/images/perf.png'; ?>" class="wauto" alt="">
                    <h4 class="fleft100"><b><?php echo $CI->T("PERFOMANCE", array(), $language); ?></b></h4>
                </div>

                <!--
                <div class="col-md-6 col-sm-6 col-xs-12 m-t20">
                        <div class="col-md-5 col-sm-5 col-xs-12 bk-cinza text-center bloco">
                            <h3 class="fleft100 m-t10"><b>INÍCIO <?php //echo date("j", $my_sigin_date).'/'.date("n", $my_sigin_date); ?></b></h3>
                            <div class="col-md-6 col-sm-6 col-xs-12 border pd-r15"><h3 class="no-mg"><b><?php //echo $my_initial_followings; ?></b></h3><small class="fleft100">Seguindo</small></div>
                            <div class="col-md-6 col-sm-6 col-xs-12 pd-l15"><h3 class="no-mg"><b><?php //echo $my_initial_followers; ?></b></h3><small class="fleft100">Seguidores</small></div>
                        </div>

                        <div class="col-md-1 col-sm-1 col-xs-12"><br></div>

                        <div class="col-md-5 col-sm-5 col-xs-12 bk-cinza text-center bloco cl-blue">
                            <h3 class="fleft100 m-t10"><b>AGORA</b></h3>
                            <div class="col-md-6 col-sm-6 col-xs-12 border pd-r15"><h3 class="no-mg"><b><?php //echo $my_actual_followings; ?></b></h3><small class="fleft100">Seguindo</small></div>
                            <div class="col-md-6 col-sm-6 col-xs-12 pd-l15"><h3 class="no-mg"><b><?php //echo $my_actual_followers; ?></b></h3><small class="fleft100">Seguidores</small></div>
                        </div>


                        <div class="col-md-4 col-sm-4 col-xs-12 cl-blue m-t30 no-pd center-mobile">
                            <b class="cl-black">Ganho hoje</b>
                            <h1 class="no-mg fleft100 fsize60"><b>256</b></h1>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-12 cl-green m-t30 no-pd center-mobile">
                            <b class="cl-black fleft100 m-b10">Conversão</b>
                            <div class="cv fleft">56%</div>
                            <img src="<?php //echo base_url().'assets/images/s-top.png'; ?>" class="wauto fleft st" alt="">
                        </div>

                        <div class="fleft100 m-t45">
                            <div class="col-md-4 col-sm-4 col-xs-12 no-pd center-mobile m-b10">
                                <b class="cl-black">Ganho semanal</b>
                                <h1 class="no-mg fleft100"><b>892</b></h1>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 no-pd center-mobile m-b10">
                                <b class="cl-black">Ganho Mensal</b>
                                <h1 class="no-mg fleft100"><b>37822</b></h1>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 no-pd center-mobile m-b10">
                                <b class="cl-black">Ganho desde o início</b>
                                <h1 class="no-mg fleft100"><b>10.522</b></h1>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 no-pd m-t30 center-mobile m-b10">
                            <b class="cl-black">Seguidas até hoje</b>
                            <h1 class="no-mg fleft100"><b>37005</b></h1>
                        </div>  
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 m-t20">
                        <div class="col-md-6 col-sm-6 col-xs-12 pd-r5">
                            <div class='input-group date'>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <input type='text' class="form-control" id='datetimepicker1' placeholder="Selecione o período" />		                    
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 pd-l5">
                            <div class='input-group date'>
                                <input type='text' class="form-control" id='datetimepicker2' placeholder="Selecione o período" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <b class="cl-black m-t20 fleft100">Gráfico de desempenho</b>
                        <div class="grafico fleft100 m-tb20">
                            <img src="<?php //echo base_url().'assets/images/grafico.jpg'; ?>" alt="">
                        </div>
                        <span class="fleft100"><b style="color:#2f61c5;">▬Seguidores ganhos</b> <b style="color:#ea4018;">▬Seguidores iniciais</b></span>

                        <b class="cl-black fleft100 m-t30 center-mobile">Melhores Perfis de referência:</b>
                        <div class="fleft100 pf-melhor pf-painel m-t30">
                            <ul class="add-perfil text-center">
                                <li><a href=""><span>1º</span><img src="<?php //echo base_url().'assets/images/avatar.png'; ?>" class="wauto" alt=""></a><small class="fleft100 m-t10">@perfilderef <b class="cl-green fleft100 m-t20">25% <br><small>seguiu você</small></b></small></li>
                                <li><a href=""><span>2º</span><img src="<?php //echo base_url().'assets/images/avatar.png'; ?>" class="wauto" alt=""></a><small class="fleft100 m-t10">@perfilderef <b class="cl-green fleft100 m-t20">25% <br><small>seguiu você</small></b></small></li>
                                <li><a href=""><span>3º</span><img src="<?php //echo base_url().'assets/images/avatar.png'; ?>" class="wauto" alt=""></a><small class="fleft100 m-t10">@perfilderef <b class="cl-green fleft100 m-t20">25% <br><small>seguiu você</small></b></small></li>							
                            </ul>
                        </div>
                </div>
                
                <div class="fleft100">
                        <div class="col-md-6 col-sm-6 col-xs-12 bk text-center pd-r15 m-t30">
                            <div class="fleft100 bk-cinza">
                                <img src="<?php //echo base_url().'assets/images/direct.png'; ?>" class="wauto" alt="">
                                <h2 class="no-mg"><b>DIRECT</b></h2>
                                <div class="breve">EM BREVE</div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 bk text-center pd-l15 m-t30">
                            <div class="fleft100 bk-cinza">
                                <img src="<?php //echo base_url().'assets/images/viu.png'; ?>" class="wauto" alt="">
                                <h2 class="no-mg"><b>QUEM VIU SEU PERFIL</b></h2>
                                <div class="breve">EM BREVE</div>
                            </div>
                        </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 bk text-center no-pd m-t30">
                        <div class="fleft100 bk-cinza local">
                            <img src="<?php //echo base_url().'assets/images/local.png'; ?>" class="wauto" alt="">
                            <h2 class="no-mg"><b>GEOLOCALIZAÇÃO</b></h2>
                            <div class="breve"><a href="" data-toggle="modal" data-target=".bs-simular">EM BREVE</a></div>

                <!-- Modal --><!--
                <div class="modal fade bs-simular bs-example-ligar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-lg ligar" role="document">
                        <div class="modal-content text-center pd-20">
                            <h4 class="m-tb30 cl-green"><b>MUITAS NOVIDADES!</b></h4>
                            <p class="">EM BREVE A DUMBU DISBONIBILIZARÁ NOVAS FUNÇÕES, CLIQUE EM OK SE QUISER <br>PARTICIPAR DA VERSÃO DE TESTES E SER UM DOS PRIMEROS A TER ACESSO.</p>
                            <div class="text-center m-b20"><button class="btn-primary w40 btn-green m-t20">QUERO PARTICIPAR</button></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    
    <div class="fleft100">
        <div class="col-md-6 col-sm-6 col-xs-12 bk text-center pd-r15 m-t30">
            <div class="fleft100 bk-cinza">
                <img src="<?php //echo base_url().'assets/images/direct.png'; ?>" class="wauto" alt="">
                <h2 class="no-mg"><b>DIRECT</b></h2>
                <div class="breve">EM BREVE</div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 bk text-center pd-l15 m-t30">
            <div class="fleft100 bk-cinza">
                <img src="<?php //echo base_url().'assets/images/viu.png'; ?>" class="wauto" alt="">
                <h2 class="no-mg"><b>QUEM VIU SEU PERFIL</b></h2>
                <div class="breve">EM BREVE</div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 bk text-center no-pd m-t30">
        <div class="fleft100 bk-cinza local">
            <img src="<?php //echo base_url().'assets/images/local.png'; ?>" class="wauto" alt="">
            <h2 class="no-mg"><b>GEOLOCALIZAÇÃO</b></h2>
            <div class="breve"><a href="" data-toggle="modal" data-target=".bs-simular">EM BREVE</a></div>

                <!-- Modal --><!--
                <div class="modal fade bs-simular bs-example-ligar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-lg ligar" role="document">
                        <div class="modal-content text-center pd-20">
                            <h4 class="m-tb30 cl-green"><b>MUITAS NOVIDADES!</b></h4>
                            <p class="">EM BREVE A DUMBU DISBONIBILIZARÁ NOVAS FUNÇÕES, CLIQUE EM OK SE QUISER <br>PARTICIPAR DA VERSÃO DE TESTES E SER UM DOS PRIMEROS A TER ACESSO.</p>
                            <div class="text-center m-b20"><button class="btn-primary w40 btn-green m-t20">QUERO PARTICIPAR</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                -->

                <div class="col-md-6 col-sm-6 col-xs-12 m-t40">                            
                    <div class="col-md-5 col-sm-5 col-xs-12 bk-cinza text-center bloco">
                        <h3 class="fleft100 m-t10"><b><?php echo $CI->T("INÍCIO ", array(), $language); ?><?php echo date("j", $my_sigin_date) . '/' . date("n", $my_sigin_date); ?></b></h3>
                        <div class="col-md-6 col-sm-6 col-xs-12 border pd-r15"><h3 class="no-mg"><b><?php echo $my_initial_followings; ?></b></h3><small class="fleft100"><?php echo $CI->T("Seguindo", array(), $language); ?></small></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pd-l15"><h3 class="no-mg"><b><?php echo $my_initial_followers; ?></b></h3><small class="fleft100"><?php echo $CI->T("Seguidores", array(), $language); ?></small></div>
                    </div>

                    <div class="col-md-1 col-sm-1 col-xs-12"><br></div>

                    <div class="col-md-5 col-sm-5 col-xs-12 bk-cinza text-center bloco cl-blue">
                        <h3 class="fleft100 m-t10"><b><?php echo $CI->T("AGORA", array(), $language); ?></b></h3>
                        <div class="col-md-6 col-sm-6 col-xs-12 border pd-r15"><h3 class="no-mg"><b><?php echo $my_actual_followings; ?></b></h3><small class="fleft100"><?php echo $CI->T("Seguindo", array(), $language); ?></small></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pd-l15"><h3 class="no-mg"><b><?php echo $my_actual_followers; ?></b></h3><small class="fleft100"><?php echo $CI->T("Seguidores", array(), $language); ?></small></div>
                    </div>

                    <div class="fleft100 m-t45">
                        <div class="col-md-6 col-sm-6 col-xs-12 no-pd text-center center-mobile m-b10">
                            <b class="cl-black"><?php echo $CI->T("Seguidos até hoje", array(), $language); ?></b>
                            <h1 class="no-mg fleft100"><b><?php echo ($amount_followers_by_reference_profiles+$amount_followers_by_geolocalization+$amount_followers_by_hashtag); ?></b></h1>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 no-pd text-center center-mobile m-b10">
                            <b class="cl-black"><?php echo $CI->T("Ganho desde o início", array(), $language); ?></b>
                            <h1 class="no-mg fleft100"><b><?php echo ($my_actual_followers - $my_initial_followers); ?></b></h1>
                        </div>
                    </div>                    
                </div>


                <!--
                <div class="col-md-4 col-sm-4 col-xs-12 cl-blue m-t30 no-pd center-mobile">
                    <b class="cl-black">Ganho hoje</b>
                    <h1 class="no-mg fleft100 fsize60"><b>256</b></h1>
                </div>

                <div class="col-md-8 col-sm-8 col-xs-12 cl-green m-t30 no-pd center-mobile">
                    <b class="cl-black fleft100 m-b10">Conversão</b>
                    <div class="cv fleft">56%</div>
                    <img src="<?php //echo base_url().'assets/images/s-top.png'; ?>" class="wauto fleft st" alt="">
                </div>

                <div class="fleft100 m-t45">
                    <div class="col-md-4 col-sm-4 col-xs-12 no-pd center-mobile m-b10">
                        <b class="cl-black">Ganho semanal</b>
                        <h1 class="no-mg fleft100"><b>892</b></h1>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 no-pd center-mobile m-b10">
                        <b class="cl-black">Ganho Mensal</b>
                        <h1 class="no-mg fleft100"><b>37822</b></h1>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 no-pd center-mobile m-b10">
                        <b class="cl-black">Ganho desde o início</b>
                        <h1 class="no-mg fleft100"><b>10.522</b></h1>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 no-pd m-t30 center-mobile m-b10">
                    <b class="cl-black">Seguidas até hoje</b>
                    <h1 class="no-mg fleft100"><b>37005</b></h1>
                </div> 
                -->



                <div class="col-md-6 col-sm-6 col-xs-12 m-t20">
                    <!--<div class="col-md-6 col-sm-6 col-xs-12 pd-r5">
                        <div class='input-group date'>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input type='text' class="form-control" id='datetimepicker1' placeholder="Selecione o período" />		                    
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 pd-l5">
                        <div class='input-group date'>
                            <input type='text' class="form-control" id='datetimepicker2' placeholder="Selecione o período" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>-->

                    <b class="cl-black fleft100"><?php echo $CI->T("Gráfico de desempenho", array(), $language); ?></b>
                    <div class="grafico fleft100 m-tb20  text-center">
                        <!--<img src="<?php //echo base_url().'assets/images/grafico.jpg'; ?>" alt="">-->
                        <div id="chartContainer" style="height: 300px; width: 90%;"></div>
                    </div>
                    <!--<span class="fleft100">
                        <b style="color:#2f61c5;">▬Seguidores ganhos</b> 
                        <b style="color:#ea4018;">▬Seguidores iniciais</b>
                    </span>-->

                    <!--<b class="cl-black fleft100 m-t30 center-mobile">Melhores Perfis de referência:</b>
                    <div class="fleft100 pf-melhor pf-painel m-t30">
                        <ul class="add-perfil text-center">
                            <li><a href=""><span>1º</span><img src="<?php //echo base_url().'assets/images/avatar.png'; ?>" class="wauto" alt=""></a><small class="fleft100 m-t10">@perfilderef <b class="cl-green fleft100 m-t20">25% <br><small>seguiu você</small></b></small></li>
                            <li><a href=""><span>2º</span><img src="<?php //echo base_url().'assets/images/avatar.png'; ?>" class="wauto" alt=""></a><small class="fleft100 m-t10">@perfilderef <b class="cl-green fleft100 m-t20">25% <br><small>seguiu você</small></b></small></li>
                            <li><a href=""><span>3º</span><img src="<?php //echo base_url().'assets/images/avatar.png'; ?>" class="wauto" alt=""></a><small class="fleft100 m-t10">@perfilderef <b class="cl-green fleft100 m-t20">25% <br><small>seguiu você</small></b></small></li>							
                        </ul>
                    </div>-->
                </div>    
                
                <?php if ($status['status_id'] == 1 || $status['status_id'] == 6 || $status['status_id'] == 7 || $status['status_id'] == 10) { ?>
                    <div class="col-md-5 col-sm-5 col-xs-12 m-t20 text-center">    
                        <img src="<?php echo base_url().'assets/images/unfollow_icon.png'; ?>" class="wauto" alt="">
                        <h4 class="m-t10"><?php echo $CI->T("UNFOLLOW TOTAL", array(), $language); ?></h4>
                        <p style="text-align:justify"> <?php echo $CI->T('Ao ativar o recurso UNFOLLOW TOTAL sua conta iniciará um processo onde deixará de seguir todos os perfis que segue no momento. Todos os perfis em sua lista de "Seguindo" serão deixados de seguir de manera aleatória. Ao desativar o recurso sua conta deixa de seguir apenas as contas que a Dumbu seguiu.', array(), $language); ?>
                        </p>

                        <div id='my_container_toggle' style="width:400px;height:40px;background-color:#DFDFDF;border-radius:20px;padding:2px">                               
                            <div id="left_toggle_buttom" style="width:196px;height:36px;background-color:#009CDE;border-radius:20px;float:left; padding-top: 7px">
                                <b style="color:white; margin-left: 25px"><?php echo $CI->T("UNFOLLOW TOTAL", array(), $language); ?></b>
                            </div>
                            <div id="right_toggle_buttom" style="width:196px;height:36px;border-radius:20px;float:right; padding-top: 7px">
                                <b style="color:white;margin-left: 25px"><?php echo $CI->T("UNFOLLOW NORMAL", array(), $language); ?></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12 m-t20 text-center">
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 m-t20  text-center">                               
                        <img src="<?php echo base_url().'assets/images/AUTOLIKE.png'; ?>" class="wauto" alt="">
                        <h4 class="m-t10"><?php echo $CI->T("AUTOLIKE", array(), $language); ?></h4>
                        <p style="text-align:justify"> <?php echo $CI->T('Ao ativar o recurso AUTOLIKE sua conta dará like automaticamente na primeira foto de todos os perfis que seguir, esse processo pode aumentar sua conversão de seguidores.', array(), $language); ?>
                        </p>

                        <div id='my_container_toggle_autolike' style="width:400px;height:40px;background-color:#DFDFDF;border-radius:20px;padding:2px">                               
                            <div id="left_toggle_buttom_autolike" style="width:196px;height:36px;background-color:#009CDE;border-radius:20px;float:left; padding-top: 7px">
                                <b style="color:white; margin-left: 25px"><?php echo $CI->T("DESLIGADO", array(), $language); ?></b>
                            </div>
                            <div id="right_toggle_buttom_autolike" style="width:196px;height:36px;border-radius:20px;float:right; padding-top: 7px">
                                <b style="color:white;margin-left: 25px"><?php echo $CI->T("LIGADO", array(), $language); ?></b>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <div class="fleft100">
                    <div class="col-md-6 col-sm-6 col-xs-12 bk text-center pd-r15 m-t30">
                        <div class="fleft100 bk-cinza">
                            <img src="<?php echo base_url() . 'assets/images/direct.png'; ?>" class="wauto" alt="">
                            <h2 class="no-mg"><b><?php echo $CI->T("DIRECT", array(), $language); ?></b></h2>
                            <div class="breve"><?php echo $CI->T("EM BREVE", array(), $language); ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 bk text-center pd-l15 m-t30">
                        <div class="fleft100 bk-cinza">
                            <img src="<?php echo base_url() . 'assets/images/viu.png'; ?>" class="wauto" alt="">
                            <h2 class="no-mg"><b><?php echo $CI->T("QUEM VIU SEU PERFIL", array(), $language); ?></b></h2>
                            <div class="breve"><?php echo $CI->T("EM BREVE", array(), $language); ?></div>
                        </div>
                    </div>
                </div>
                
                <A name="lnk_upgdrade_plane"></A>
                <div class="col-md-6 col-sm-6 col-xs-12 bk text-center pd-r15 m-t45">
                    <div class="text-center fleft100 m-t20">
                        <img src="<?php echo base_url() . 'assets/images/pay.png'; ?>" class="wauto" alt="">
                        <h4 class="fleft100"><b><?php echo $CI->T("DADOS DE PAGAMENTO", array(), $language); ?></b></h4>
                    </div>
                    <div class="pay fleft100 input-form">
                        <fieldset>
                            <input id="credit_card_name" onkeyup="javascript:this.value = this.value.toUpperCase();"  placeholder="<?php echo $CI->T("Meu nome no cartão", array(), $language); ?>" required style="text-transform:uppercase;">
                        </fieldset>

                        <fieldset>
                            <input type="text" placeholder="<?php echo $CI->T("E-mail", array(), $language); ?>"  id="client_email" type="email"  required>
                        </fieldset>

                        <div class="col-md-9 col-sm-9 col-xs-12 pd-r5">
                            <fieldset>
                                <input id="credit_card_number" type="text" placeholder="<?php echo $CI->T("Número no cartão", array(), $language); ?>" data-mask="0000 0000 0000 0000" maxlength="20" required>
                            </fieldset>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12 pd-l5">
                            <fieldset>
                                <input id="credit_card_cvc" type="text" placeholder="<?php echo $CI->T("CVV/CVC", array(), $language); ?>" maxlength="5" required>
                            </fieldset>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12 no-pd m-t10">
                            <span class="val"><?php echo $CI->T("Validade", array(), $language); ?></span>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12 pd-r15 m-t10">
                            <fieldset>
                                <div class="select"> 
                                    <select name="local" id="credit_card_exp_month" > 
                                        <option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 no-pd m-t10">
                            <fieldset>
                                <div class="select">
                                    <select name="local" id="credit_card_exp_year" class="btn-primeiro sel">                                        
                                        <option>2018</option><option>2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option><option>2026</option><option>2027</option><option>2028</option><option>2029</option><option>2030</option><option>2031</option><option>2032</option><option>2033</option><option>2034</option><option>2035</option><option>2036</option><option>2037</option><option>2038</option><option>2039</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12 pd-r15  m-t20">
                            <span class="val"><?php echo $CI->T("Mudar plano", array(), $language); ?>:</span>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-12 pd-r15  m-t20">
                            <fieldset>
                                <div class="select"> 
                                    <select name="local" id="client_update_plane" class="btn-primeiro sel"> 
                                        <?php
                                        $name_plane=array(
                                            1=> $CI->T("VEL -", array(), $language).' '.$CI->T("RÁPIDA", array(), $language),
                                            2=> $CI->T("VEL -", array(), $language).' '.$CI->T("BAIXA", array(), $language),
                                            3=> $CI->T("VEL -", array(), $language).' '.$CI->T("MODERADA", array(), $language),
                                            4=> $CI->T("VEL -", array(), $language).' '.$CI->T("RÁPIDA", array(), $language),
                                            5=> $CI->T("VEL -", array(), $language).' '.$CI->T("TURBO!", array(), $language)
                                            );
                                        for ($i = 0; $i < count($all_planes); $i++) {
                                            if ($i + 2 == $plane_id){
                                                $float = ($all_planes[$i]['normal_val']) / 100;
                                                $string = sprintf("%.2f", $float);
                                                $string=str_replace(array("."), ',', $string);                                                
                                                echo '<option id="cbx_plane' . ($i + 2) . '" value="' . ($i + 2) . '" title="(' . $CI->T("Plano atual", array(), $language) . '" selected="true"><b>' . $CI->T("R$", array(), $language) . ' ' . $CI->T($string) . ' (' . $CI->T("Plano atual", array(), $language) . ') '.$name_plane[$i + 2].'</b></option>';
                                            } else{
                                                $float = ($all_planes[$i]['normal_val']) / 100;
                                                $string = sprintf("%.2f", $float);
                                                $string=str_replace(array("."), ',', $string);                                                
                                                echo '<option id="cbx_plane' . ($i + 2) . '" value="' . ($i + 2) . '">' . $CI->T("R$", array(), $language) . ' ' . $CI->T($string) . ' '. $name_plane[$i + 2]. '</option>';                                                
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                        <div class="text-center">
                            <button id = "btn_send_update_datas" type="button" style="border-radius:20px" class="btn-primary m-t30 ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("CONFERIR", array(), $language); ?></div></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 bk text-center pd-l15 m-t45">
                    <div class="text-center fleft100 m-t20"><A name="lnk_update"></A>
                        <img src="<?php echo base_url() . 'assets/images/mail.png'; ?>" class="wauto" alt="">
                        <h4 class="fleft100 m-t20"><b><?php echo $CI->T("FALE CONOSCO", array(), $language); ?></b></h4>
                        <?php
                            if($language=='EN'){?>

                                <div class="col-md-1 col-sm-1 col-xs-12"></div>
                                <div class="col-md-8 col-sm-8 col-xs-12 text-right">      
                                    <spam style="color:black; font-size:0.8em">
                                        WRITE TO US! OUR SERVICE IS SUPPORTED <BR> IN MORE THAN ONE LANGUAGE:
                                    </spam>

                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 m-t10 text-left">
                                    <img src="assets/images/flag_EN.png" title="English" class="wauto" alt="">
                                    <img src="assets/images/flag_BR.png" title="Português" class="wauto" alt="">
                                    <img src="assets/images/flag_ES.png" title="Español" class="wauto" alt="">
                                </div>
                        <?php    }
                        ?>          
                    </div>
                    <div class="pay fleft100 input-form" id="talkme_frm">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <fieldset>
                                <input id="visitor_name" type="text" placeholder="<?php echo $CI->T("Nome", array(), $language); ?>">
                            </fieldset>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <fieldset>
                                <input id="visitor_email" type="text" placeholder="<?php echo $CI->T("E-mail", array(), $language); ?>">
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <fieldset>
                                <input id="visitor_company" type="text" placeholder="<?php echo $CI->T("Empresa", array(), $language); ?>">
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <fieldset>
                                <input id="visitor_phone" type="text" placeholder="<?php echo $CI->T("Telefone", array(), $language); ?>">
                            </fieldset>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <fieldset>
                                <textarea name="" id="visitor_message" cols="30" rows="5" placeholder="<?php echo $CI->T("Mensagem", array(), $language); ?>"></textarea>
                            </fieldset>
                        </div>
                        <div class="text-center">
                            <button id="btn_send_message" type="button" style="border-radius:20px" class="btn-primary m-t20 ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("ENVIAR", array(), $language); ?></div></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        
            
            <div class="fleft100 m-t30">                
                <div class="col-md-6 col-sm-6 col-xs-12 text-center pd-r15 m-t45">
                    <div class="m-t10">
                        <h4 class="text-center"><b><?php echo $CI->T("SEGUIR SEMPRE", array(), $language); ?></b></h4>
                        <p class="text-center pd-l15 pd-r15"> <?php echo $CI->T('A ferramenta nunca deixará de seguir perfis adicionados nesta lista <br> e que seguiu automaticamente' , array(), $language); ?>
                        </p>
                        <div class="text-center" >
                            <div class="row" style="margin-top: 2%; margin-bottom: 2%">
                                <button id="white_list" class="btn-primary m-t20 ladda-button" style="border-radius:20px" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                    <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("GERENCIAR", array(), $language); ?></div></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-center pd-l15 m-t45">
                    <div class="m-t10">
                        <h4 class="text-center" ><b><?php echo $CI->T("NUNCA SEGUIR", array(), $language); ?></b></h4>
                        <p class="text-center pd-l15 pd-r15"> <?php echo $CI->T('Os perfis que adicione nesta lista nunca serão seguidos <br> com a ferramenta.', array(), $language); ?>
                        </p>
                        <div class="text-center" >
                            <div class="row" style="margin-top: 2%; margin-bottom: 2%">
                                <button id="black_list" class="btn-primary m-t20 ladda-button" style="border-radius:20px" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                    <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("GERENCIAR", array(), $language); ?></div></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="fleft100 m-t30">
                <div class="col-md-12 col-sm-12 col-xs-12 bk text-center pd-r15 m-t45">
                    <div class="m-t10 ">
                        <div>
                            <p class=text-center><?php //echo $CI->T("CANCELAMENTO DA ASSINATURA", array(), $language); ?></p> 
                        </div>
                        <div class="text-center" >
                            <div class="row" style="margin-top: 2%; margin-bottom: 2%">
                               <!-- <button id="cancel_usser_account" class="btn-primary m-t20 ladda-button" style="border-radius:20px" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                    <span class="ladda-label"><div style="color:white; font-weight:bold"><?php //echo $CI->T("CANCELAR", array(), $language); ?></div></span>
                                </button> -->
                            </div>
                        </div>
                    </div>
                </div>                
                
            </div>
        </section>
        
        <div class="h150 fleft100"></div>
        <footer class="text-center fleft100 m-t30 m-b10"><div class="container"><img src="<?php echo base_url() . 'assets/images/logo-footer.png'; ?>" class="wauto" alt=""> <span class="fleft100 text-center">DUMBU - 2017 - <?php echo $CI->T("TODOS OS DIREITOS RESERVADOS", array(), $language); ?></span></div></footer>

        <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery.dlmenu.js'; ?>"></script>
        <script>
            $(function () {
                $('#dl-menu').dlmenu();
            });
        </script>
        <script src="<?php echo base_url() . 'assets/js/datepiker.js'; ?>"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#datetimepicker1').datepicker({
                    format: "dd/mm/yyyy"
                });
            });
        </script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#datetimepicker2').datepicker({
                    format: "dd/mm/yyyy"
                });
            });
        </script>
        
        <!--modal_container_ENCUESTA
        <div class="modal fade" style="top:30%" id="modal_ENCUESTA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div id="modal_container_ENCUESTA" class="modal-dialog modal-sm" role="document">                                                          
                <div class="modal-content">
                    <div class="modal-header">
                        <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="<?php //echo base_url() . 'assets/images/FECHAR.png'; ?>">
                        </button>
                        <h5 class="modal-title" id="myModalLabel"><b><?php //echo $CI->T("Mensagem", array(), $language); ?></b></h5>                        
                    </div>
                    <div class="modal-body">                                            
                                                
                    </div>
                    <div class="modal-footer text-center">
                        <button id="accept_modal_alert_message" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                            <span class="ladda-label"><div style="color:white; font-weight:bold"><?php //echo $CI->T("ACEITAR", array(), $language); ?></div></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>-->
        
        
        
        <!--modal_container_BLACK LIST-->
        <div class="modal fade" style="top:20%;" id="modal_black_list" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header pay fleft100">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?php echo $CI->T("Lista negra", array(), $language); ?></h4>  
                        <div class="col-md-5 col-sm-5 col-xs-12 text-center m-t20">  
                            <fieldset>
                                <input id="text_profile_black_list" class="form-control" type="text" placeholder="<?php echo $CI->T("Perfil", array(), $language); ?>">                                                       
                            </fieldset>
                        </div>                        
                        <div class="col-md-5 col-sm-5 col-xs-12 text-left m-t20">
                            <fieldset>
                                <button id="add_profile_in_black_list" class="btn btn-info ladda-button" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                    <span class="ladda-label"><div class="pd-l15 pd-r15"><?php echo $CI->T("Adicionar", array(), $language); ?></div></span>
                                </button>
                            </fieldset>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-left m-t20">
                            <p id="insert_black_list_msg_error"></p>
                        </div>                        
                    </div>
                    <div style="width:100%; min-height:120px; max-height:150px; overflow-y: scroll;" class="modal-body">
                        <div id="container_black_list" class="col-md-12 col-sm-12 col-xs-12 text-center ">                            
                            <table id="table_black_list" class="table table-hover">                                
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>     
        
        
        <!--modal_container_WHITE_LIST-->
        <div class="modal fade" style="top:20%;" id="modal_white_list" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header pay fleft100">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?php echo $CI->T("Lista branca", array(), $language); ?></h4>
                        <div class="col-md-5 col-sm-5 col-xs-12 text-center m-t20">  
                            <fieldset>
                                <input id="text_profile_white_list" class="form-control" type="text" placeholder="<?php echo $CI->T("Perfil", array(), $language); ?>">                                                       
                            </fieldset>
                        </div>                        
                        <div class="col-md-5 col-sm-5 col-xs-12 text-left m-t20">
                            <fieldset>
                                <button id="add_profile_in_white_list" class="btn btn-info ladda-button" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                    <span class="ladda-label"><div class="pd-l15 pd-r15"><?php echo $CI->T("Adicionar", array(), $language); ?></div></span>
                                </button>
                            </fieldset>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-left m-t20">
                            <p id="insert_white_list_msg_error"></p>
                        </div>                        
                    </div>
                    <div style="width:100%; min-height:120px; max-height:150px; overflow-y: scroll;" class="modal-body">
                        <div id="container_white_list" class="col-md-12 col-sm-12 col-xs-12 text-center ">                            
                            <table id="table_white_list" class="table table-hover">                                
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        
         <!--modal_container_cancel_account_message-->
        <div class="modal fade" style="top:30%" id="modal_cancel_account_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div id="modal_container_cancel_account_message" class="modal-dialog modal-sm" role="document">                                                          
                <div class="modal-content">
                    <div class="modal-header">
                        <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="<?php echo base_url() . 'assets/images/FECHAR.png'; ?>"> <!--<span aria-hidden="true">&times;</span>-->
                        </button>
                        <h5 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("Sugestão", array(), $language); ?></b></h5>                        
                    </div>
                    <div class="modal-body">                                            
                        <p>Prezado cliente, você aceita continuar com desconto do <b style="color: red">40%</b> do valor do seu plano?</p>
                        <div  class="radio">
                            <label><input id="aceita_desconto" type="radio" name="optradio" checked="true">Sim, aceito o desconto</label>
                        </div>
                        <div class="radio">
                            <label><input id="nao_aceita_desconto" type="radio" name="optradio">Não, obrigado</label>
                        </div>                      
                    </div>
                    <div class="modal-footer text-center">
                        <span>
                            <button id="accept_modal" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#000000">
                                <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("CONTINUAR", array(), $language); ?></div></span>
                            </button>                            
                        </span>
                    </div>
                </div>
            </div>                                                        
        </div>
        
        <!--modal_container_alert_message-->
        <div class="modal fade" style="top:30%" id="modal_alert_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div id="modal_container_alert_message" class="modal-dialog modal-sm" role="document">                                                          
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="<?php //echo base_url() . 'assets/images/FECHAR.png'; ?>">
                        </button>-->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("Mensagem", array(), $language); ?></b></h5>                        
                    </div>
                    <div class="modal-body">                                            
                        <p id="message_text"></p>                        
                    </div>
                    <div class="modal-footer text-center">
                        <button id="accept_modal_alert_message" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                            <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("ACEITAR", array(), $language); ?></div></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!--modal_container_confirm_message-->
        <div class="modal fade" style="top:30%" id="modal_confirm_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div id="modal_container_alert_message" class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="<?php echo base_url() . 'assets/images/FECHAR.png'; ?>"> <!--<span aria-hidden="true">&times;</span>-->
                        </button>
                        <h5 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("Confirmação", array(), $language); ?></b></h5>
                    </div>
                    <div class="modal-body">
                        <p id="message_text_confirmation"></p>
                    </div>
                    <div class="modal-footer text-center">
                        <span>
                            <button id="accept_modal_confirm_message" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                <span class="ladda-label"><div style="color:white; font-weight:bold"><?php //echo $CI->T("ACEITAR", array(), $language); ?></div></span>
                            </button>
                            <button id="cancel_modal_confirm_message" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                <span class="ladda-label"><div style="color:white; font-weight:bold"><?php //echo $CI->T("CANCELAR", array(), $language); ?></div></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>                                                        
        </div>
       
        <!--Start of Boostbox Tag Script-->
        <?php if ($SERVER_NAME == "PRO") { ?>
                <script async="1" src="//tags.fulllab.com.br/scripts/master-tag/produto_dumbu.js"></script>
        <?php } ?>
        <!--End of Boostbox Tag Script-->
    </body>
</html>