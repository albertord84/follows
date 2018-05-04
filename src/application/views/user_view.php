<?php
    header('X-Frame-Options: SAMEORIGIN, GOFORIT'); 
?>
<!DOCTYPE html>
<html lang="pt_BR">
	<head>
                <?php  $CI =& get_instance();?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="title" content="<?php echo $CI->T("Ganhar seguidores no Instagram | Ganhar ou Comprar Seguidores Reais e Ativos no Instagram", array(),$language); ?>">
                <meta name="description" content="<?php echo $CI->T("Ganhe seguidores no Instagram. www.dumbu.pro te permite ganhar seguidores no Instagram 100% reais e qualificados. Ganhe mais seguidores.", array(),$language);?>">
                <meta name="keywords" content="<?php echo $CI->T("ganhar, seguidores, Instagram, seguidores segmentados, curtidas, followers, geolocalizção, direct, vendas", array(),$language);?>">
                <meta name="revisit-after" content="7 days">
                <meta name="robots" content="index,follow">
                <meta name="distribution" content="global">                
                <title><?php echo $CI->T("Get Followers on Instagram | Gain or Buy Real & Active Instagram Followers", array(),$language);?></title>
                
                <link rel="shortcut icon" href="<?php echo base_url().'assets/images/icon.png'?>"> 
                
                <!-- jQuery -->
                <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js';?>"></script>
                
		<!-- Bootstrap -->
                <link href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
		<link href="<?php echo base_url().'assets/css/loading.css';?>" rel="stylesheet">
		<link href="<?php echo base_url().'assets/css/style.css';?>" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/stylenew.css?'.$SCRIPT_VERSION;?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/default.css?'.$SCRIPT_VERSION;?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/component.css?'.$SCRIPT_VERSION;?>" />
                <link rel="stylesheet" href="<?php echo base_url().'assets/css/ladda-themeless.min.css'?>">
		
                <script type="text/javascript" src="<?php echo base_url().'assets/js/modernizr.custom.js';?>"></script>                
                <script src="<?php echo base_url().'assets/js/spin.min.js'?>"></script>
                <script src="<?php echo base_url().'assets/js/ladda.min.js'?>"></script>                
                <script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
                <script type="text/javascript">var language = '<?php echo $language;?>';</script>
                <script type="text/javascript">var SERVER_NAME = '<?php echo $SERVER_NAME;?>';</script>
                <script type="text/javascript" src="<?php echo base_url().'assets/js/'.$language.'/internalization.js?'.$SCRIPT_VERSION;?>"></script>
                <script type="text/javascript" src="<?php echo base_url().'assets/js/user.js?'.$SCRIPT_VERSION;?>"></script>
                <script type="text/javascript" src="<?php echo base_url().'assets/js/sign_painel.js?'.$SCRIPT_VERSION;?>"></script>
                <script type="text/javascript" src="<?php echo base_url().'assets/js/talkme_painel.js?'.$SCRIPT_VERSION;?>"></script>                
                <!--<script type="text/javascript" src="<?php //echo base_url().'assets/js/controllers.js?'.$SCRIPT_VERSION;?>"></script>-->               
                
                <?php //para SEO 
                    if($SERVER_NAME=="ONE"){
                        echo '<link rel="canonical" href="https://www.dumbu.one" />';
                    }
                ?>
                
                <?php include_once("pixel_facebook.php")?>
                
                <script src='https://www.google.com/recaptcha/api.js'></script>
                
                <!--Start of Zendesk Chat Script-->
                <?php
                    if ($SERVER_NAME == "PRO") { ?>
                        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/zendesk_chat_home.js'; ?>"></script>
                <?php } ?>
                <!--End of Zendesk Chat Script-->
	</head>
	<body id="my_body">
                <?php include_once("analyticstracking.php"); ?>            
                <?php if($SERVER_NAME=='ONE'){  include_once("anlaytics_only_one.php"); }   ?>            
                <?php include_once("remarketing.php");?>
                <?php include_once("retargeting.php");?>            
                <?php
                    /*if($SERVER_NAME=='ONE')
                        include_once("adroll.php");*/
                ?>
            
                
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
				<div id="dl-menu" class="dl-menuwrapper">
					<button class="dl-trigger">Open Menu</button>
					<ul class="dl-menu">
                                                <li><a id="lnk_faq_function1" title="<?php echo $CI->T("Perguntas mais frequentes", array(),$language);?>">FAQ</a></li>
						<li><a href="#lnk_how_function"><?php echo $CI->T("COMO FUNCIONA", array(),$language);?></a></li>
						<li><a href="#lnk_sign_in_now"><?php echo $CI->T("ASSINAR AGORA", array(),$language);?></a></li>
						<li>
                                                    <a href="#"><?php echo $CI->T("ENTRAR", array(),$language);?></a>
							<ul class="dl-submenu">
								<li>
                                                                    <div id="login_container1">
									<form id="usersLoginForm" action="#" method="#" class="form" role="form" accept-charset="UTF-8">
										<div class="form-group center" style="font-family:sans-serif; font-size:0.9em">
										<?php echo $CI->T("EXCLUSIVO PARA USUÁRIOS", array(),$language);?>
										</div>
										<div class="form-group center" style="font-family:sans-serif; font-size:0.7em">
										<?php echo $CI->T("Use login e senha de Instagram", array(),$language);?>
										</div>
										<div class="form-group">
											<input id="userLogin1" type="text" class="form-control" placeholder="<?php echo $CI->T("Usuário", array(),$language);?>" onkeyup="javascript:this.value=this.value.toLowerCase();" style="text-transform:lowercase;" required="">
										</div>
										<div class="form-group">
											<input id="userPassword1" type="password" class="form-control" placeholder="<?php echo $CI->T("Senha", array(),$language);?>" required="">
										</div>
										<!--<div class="form-group">
                                                                                    <button type="button" name="" value="<?php //echo $CI->T("ENTRAR", array(),$language);?>" id="btn_dumbu_login1" style="white-space: normal;" class="btn btn-success" ><spam class="ladda-label"></spam></button>
										</div>-->
										
										<div class="form-group">
											<input type="submit" name="" value="<?php echo $CI->T("ENTRAR", array(),$language);?>" id="btn_dumbu_login1" class="btn btn-success btn-block ladda-button" type="button" data-style="expand-left" data-spinner-color="#ffffff" />
										</div>
										<div id="container_login_message1" class="form-group" style="text-align:justify;visibility:hidden; font-family:sans-serif; font-size:0.9em">
										</div>
										<div id="container_login_force_login1" class="form-group" style="text-align:justify;visibility:hidden; font-family:sans-serif; font-size:0.9em">                                                                                                    
                                                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                                                        <input type="checkbox" id="check_force_login1" checked="false" style="margin-top: 0;">                                                                                                        
                                                                                    </div>
                                                                                    <div id="message_force_login1" style="with:100%" class="col-md-10 col-sm-10 col-xs-12 text-left">                                                                                        
                                                                                    </div>
                                                                                </div>
									</form>
                                                                    </div>
								</li>
							</ul>
						</li>
                                                
                                            <?php if ($SERVER_NAME === 'ONE') { ?>
                                                <li id="locales_cell">
                                                <a  id="lnk_language1_cell" href="#">
                                                        
                                                <?php if ($language === 'EN') { ?>
                                                    <img id="img_language1" src="assets/images/en_flag.png" alt="EN" class="wauto us">
                                                    <span id="txt_language1" style="color: white">EN</span>
                                                <?php }
                                                elseif ($language === 'PT') { ?> 
                                                    <img id="img_language1" src="assets/images/pt_flag.png" alt="PT" class="wauto us">
                                                    <span id="txt_language1" style="color: white">PT</span>
                                                <?php }
                                                else { ?>
                                                    <img id="img_language1" src="assets/images/es_flag.png" alt="ES" class="wauto us">
                                                    <span id="txt_language1" style="color: white">ES</span>
                                                <?php } ?>
                                                
                                                </a>
                                                    <ul class="dl-submenu">
                                                        <li>

                                                        <?php if ($language === 'EN') { ?>
                                                            <a id="lnk_language2_cell" href="#">
                                                            <img id="img_language2" src="assets/images/pt_flag.png" alt="PT" class="wauto us"/>
                                                            <span id="txt_language2" style="color: black">PT</span>
                                                            </a>
                                                        <?php }
                                                        elseif ($language === 'PT') { ?>
                                                            <a id="lnk_language2_cell" href="#">
                                                            <img id="img_language2" src="assets/images/es_flag.png" alt="ES" class="wauto us"/>
                                                            <span id="txt_language2" style="color: black">ES</span>
                                                            </a>
                                                        <?php }
                                                        else { ?>
                                                            <a id="lnk_language2_cell" href="#">
                                                            <img id="img_language2" src="assets/images/en_flag.png" alt="EN" class="wauto us"/>
                                                            <span id="txt_language2" style="color: black">EN</span>
                                                            </a>
                                                        <?php } ?>

                                                        </li>
                                                        <li>

                                                        <?php if ($language === 'EN') { ?>
                                                            <a id="lnk_language3_cell" href="#">
                                                            <img id="img_language3" src="assets/images/es_flag.png" alt="ES" class="wauto us"/>
                                                            <span id="txt_language3" style="color: black">ES</span>
                                                            </a>
                                                        <?php }
                                                        elseif ($language === 'PT') { ?>
                                                            <a id="lnk_language3_cell" href="#">
                                                            <img id="img_language3" src="assets/images/en_flag.png" alt="EN" class="wauto us"/>
                                                            <span id="txt_language3" style="color: black">EN</span>
                                                            </a>
                                                        <?php }
                                                        else { ?>
                                                            <a id="lnk_language3_cell" href="#">
                                                            <img id="img_language3" src="assets/images/pt_flag.png" alt="PT" class="wauto us"/>
                                                            <span id="txt_language3" style="color: black">PT</span>
                                                            </a>
                                                        <?php } ?>

                                                        </li>
                                                    </ul>
                                                </li>
                                            <?php } ?>
					</ul>
				</div><!-- /dl-menuwrapper -->
                                
				<nav class="navbar navbar-default navbar-static-top">
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="logo pabsolute fleft100 text-center">
						<a class="navbar-brand i-block" href="#">
							<img alt="Brand" src="assets/images/logo.png">
						</a>
					</div>
					<ul class="nav navbar-nav navbar-right menu-principal">
                                                <li><a id="lnk_faq_function2" title="<?php echo $CI->T("Perguntas mais frequentes", array(),$language);?>">FAQ</a></li>
                                                <li><a href="#lnk_how_function"><?php echo $CI->T("COMO FUNCIONA", array(),$language);?></a></li>                                                 
                                                <li><a href="#lnk_sign_in_now"><?php echo $CI->T("ASSINAR AGORA", array(),$language);?></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="assets/images/user.png" class="wauto us" alt="User"><?php echo $CI->T("ENTRAR", array(),$language);?><spam class="caret"></spam></a>
							<ul class="dropdown-menu">
								<li>
									<div class="row">
										<div class="col-md-12">
                                                                                    <div id="login_container2">
											<form id="usersLoginForm" action="#" method="#" class="form" role="form" accept-charset="UTF-8">
												<div class="form-group center" style="font-family:sans-serif; font-size:0.9em">
                                                                                                    <?php echo $CI->T("EXCLUSIVO PARA USUÁRIOS", array(),$language);?>
												</div>
												<div class="form-group center" style="font-family:sans-serif; font-size:0.7em">
                                                                                                    <?php echo $CI->T("Use login e senha de Instagram", array(),$language);?>
												</div>
												<div class="form-group">
                                                                                                    <input id="userLogin2" type="text" class="form-control" placeholder="<?php echo $CI->T("Usuário", array(),$language);?>" onkeyup="javascript:this.value=this.value.toLowerCase();" style="text-transform:lowercase;" required="">
												</div>
												<div class="form-group">
													<input id="userPassword2" type="password" class="form-control" placeholder="<?php echo $CI->T("Senha", array(),$language);?>" required="">
												</div>
												<div class="form-group">
													<button id="btn_dumbu_login2" class="btn btn-success btn-block ladda-button" type="button" data-style="expand-left" data-spinner-color="#ffffff">
														<spam class="ladda-label"><?php echo $CI->T("Entrar", array(),$language);?></spam>
													</button>
												</div>
												<div id="container_login_message2" class="form-group" style="text-align:justify;visibility:hidden; font-family:sans-serif; font-size:0.9em">
												</div>
												<div id="container_login_force_login2" class="form-group" style="text-align:justify;visibility:hidden; font-family:sans-serif; font-size:0.9em">                                                                                                    
                                                                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                                                                        <input type="checkbox" id="check_force_login2" checked="false" style="margin-top: 0;">                                                                                                        
                                                                                                    </div>
                                                                                                    <div id="message_force_login2" style="with:100%"  class="col-md-10 col-sm-10 col-xs-12 text-left">
                                                                                                    </div>
                                                                                                </div>
											</form>
                                                                                    </div>
										</div>
									</div>
								</li>
							</ul>
						</li> 
                                                
                                                
                                                
                                                <?php
                                                if($SERVER_NAME==='ONE'){
                                                    echo    '<li id="locales" class="dropdown">
                                                            <a  id="lnk_language1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
                                                        
                                                    if($language==='EN')
                                                        echo '<img id="img_language1" src="assets/images/en_flag.png" class="wauto us" alt="EN">
                                                        <span id="txt_language1">EN</span>
                                                        <span  class="caret"></span>';
                                                    elseif($language==='PT') 
                                                        echo '<img id="img_language1" alt="PT" src="assets/images/pt_flag.png" class="wauto us"/>
                                                            <span id="txt_language1">PT</span>
                                                            <span  class="caret"></span>';
                                                    else 
                                                        echo '<img id="img_language1" alt="ES" src="assets/images/es_flag.png" class="wauto us"/>
                                                            <span id="txt_language1">ES</span>
                                                            <span  class="caret"></span>';
                                                        
                                                    echo '</a>
                                                    <ul class="dropdown-menu" style="min-width: 50px">
                                                        <li>';
                                                            
                                                    if($language==='EN')
                                                        echo '<a id="lnk_language2" href="#">
                                                            <img id="img_language2" alt="PT" src="assets/images/pt_flag.png" class="wauto us"/>
                                                            <span id="txt_language2">PT</span>
                                                        </a>';
                                                    elseif($language==='PT') 
                                                        echo '<a id="lnk_language2" href="#">
                                                                <img id="img_language2" alt="ES" src="assets/images/es_flag.png" class="wauto us"/>
                                                                <span id="txt_language2">ES</span>
                                                            </a>';
                                                    else 
                                                        echo '<a id="lnk_language2" href="#">
                                                                <img id="img_language2" alt="EN" src="assets/images/en_flag.png" class="wauto us"/>
                                                                <span id="txt_language2">EN</span>
                                                            </a>';
                                                            
                                                    echo '</li>
                                                        <li>';
                                                            
                                                                if($language==='EN')
                                                                    echo '<a id="lnk_language3" href="#">
                                                                        <img id="img_language3" alt="ES" src="assets/images/es_flag.png" class="wauto us"/>
                                                                        <span id="txt_language3">ES</span>
                                                                    </a>';
                                                                elseif($language==='PT') 
                                                                    echo '<a id="lnk_language3" href="#">
                                                                            <img id="img_language3" alt="EN" src="assets/images/en_flag.png" class="wauto us"/>
                                                                            <span id="txt_language3">EN</span>
                                                                        </a>';
                                                                else 
                                                                    echo '<a id="lnk_language3" href="#">
                                                                            <img id="img_language3" alt="PT" src="assets/images/pt_flag.png" class="wauto us"/>
                                                                            <span id="txt_language3">PT</span>
                                                                        </a>';
                                                            
                                                echo        '</li>
                                                    </ul>
                                                </li>';}?>
                                                
					</ul>
				</nav>
			</div>
		</header>

		<section id="destaque" class="fleft100 bk-black cl-fff">
			<div class="container">
				<div class="fleft100 m-tb60">                                    
                                    <h1 class="fleft100 text-center"><?php echo $CI->T("Aumente o número de seguidores no seu Instagram", array(),$language);?></h1>                                    
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 pd-r15 passos m-t45">
                                    <b style="left:0; font-size: 1.3em" class="fleft100"><?php echo $CI->T("PASSO A PASSO", array(),$language);?></b>
					<ul class="fleft100 passos">
						<li><spam>1</spam><p><?php echo $CI->T("Escolha os Perfis de referência que deseja captar seus seguidores", array(),$language);?></p></li>
						<li><spam>2</spam><p><?php echo $CI->T("A ferramenta seguirá automaticamente os seguidores dos Perfis de referência", array(),$language);?></p></li>
						<li class="active"><spam>3</spam><p><?php echo $CI->T("Alguns desses seguidores poderão seguir você de volta por se identificar com seu conteúdo", array(),$language);?></p></li>
						<li><spam>4</spam><p><?php echo $CI->T("Entre 24h e 48h a ferramenta deixará de seguir esses perfis automáticamente", array(),$language);?></p></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 text-center ps m-t45">
					<div class="plano plano-mensal text-center fleft100">
						<b style="font-size: 1.3em"><?php echo $CI->T("PLANO MENSAL", array(),$language);?></b>
						<!--<spam class="cl-fff fleft100"><?php //echo $CI->T("Sem multa de rescisão.", array(),$language);?></spam>-->
						<hr>
						<spam class="fleft100 cl-fff no-mg"><?php echo $CI->T("A partir de", array(),$language);?></spam>
						<p class="fleft100 cl-fff no-mg"><?php echo $CI->T("R$", array(),$language);?><b><?php echo ' '.$CI->T("29,90", array(),$language);?></b></p>
						<!--<spam class="fleft100 cl-fff no-mg">--><?php //echo $CI->T("no 1º mês", array(),$language);?><!--</spam>-->
                                                <a href="#lnk_sign_in_now">
                                                    <div class="text-center"><button class="btn-primary btn-green m-t20"><?php echo $CI->T("ASSINAR", array(),$language);?></button></div>
                                                </a>
					</div>
					<img src="assets/images/50 países.png" class="i-block wauto paises" alt="Flags"><br>
                                        <spam style="margin-top:0px; font-size:1.5em"><?php echo $CI->T("Dumbu é global!", array(),$language);?></spam>
					<spam style="font-size:0.9em" class="fleft100 no-mg"><?php echo $CI->T("Temos clientes em mais de 200 países.", array(),$language);?></spam>
					<spam style="font-size:0.9em" class="fleft100 no-mg"><?php echo $CI->T("Faça parte de uma das Startups que", array(),$language);?></spam>
					<spam style="font-size:0.9em" class="m-b10 fleft100 no-mg"><?php echo $CI->T("mais cresce nos últimos tempos!", array(),$language);?></spam>                                        
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12 text-center cel">
                                    <?php                                        
                                       echo '<img src="assets/images/'.$language.'/755K.png" class="fleft100 m-wauto" alt="Increase your followers on Instagram">'
                                    ?>
				</div>
			</div>
		</section>

		            
		<section id="vantagens" class="fleft100 c-wite">
                    <spam style="color:white; font-size:1.6em" class="fleft100 text-center m-tb30"><?php echo $CI->T("RECURSOS", array(),$language);?></spam>
			
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-1 col-sm-1 col-xs-12 text-center"></div>                                
                                <div class="col-md-2 col-sm-2 col-xs-12 text-center">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-8 col-sm-8 col-xs-12 text-right">
                                            <img src="assets/images/geolocalization_bw.png" class="wauto" alt="geo-location">
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 text-left">
                                            <?php
                                            if($language=='PT')
                                                echo '<img src="assets/images/novo.png" style="width:40%" class="wauto" alt="novo">';
                                            else if($language=='EN')
                                                echo '<img src="assets/images/new_black.png" style="width:48px"  alt="new">';
                                            else
                                                echo '<img src="assets/images/nuevo.png" style="width:48px"  alt="new">';
                                            ?>
                                        </div>
                                    </div>
                                    <h5 ><b><?php print $CI->T("Geolocalização", array(),$language);?></b><br>
                                    <?php print $CI->T("Capte seguidores através", array(),$language);?><br>
                                    <?php print $CI->T("de locais definidos por você", array(),$language);?><br></h5>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 text-center">    
                                    <img src="assets/images/persons.png" class="wauto" alt="Person">
                                    <h5><b><?php print $CI->T("Seguidores reais captados", array(),$language);?><br>
                                    <?php print $CI->T("a través de Perfis que", array(),$language);?><br>
                                    <?php print $CI->T("você escolhe", array(),$language);?><br></h5>
                                </div>
                                
                                <div class="col-md-2 col-sm-2 col-xs-12 text-center">
                                    <img src="assets/images/checked_person.png" class="wauto" alt=Person">
                                    <h5><b><?php print $CI->T("Seguidores", array(),$language);?></b><br>                                    
                                    <?php print $CI->T("100% reais", array(),$language);?><br></h5>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 text-center">
                                    <img src="assets/images/security.png" class="wauto" alt=Person">
                                    <h5><b><?php print $CI->T("100% seguro", array(),$language);?></b><br>                                    
                                    <?php print $CI->T("Seus dados serão criptografados", array(),$language);?><br></h5>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 text-center">
                                    <img src="assets/images/new_nuvem.png" class="wauto" alt="cloud save">
                                    <h5><b><?php print $CI->T("Todos os perfis que", array(),$language);?></b><br>
                                    <?php print $CI->T("segue estarão protegidos", array(),$language);?><br>
                                    <?php print $CI->T("em seu backup", array(),$language);?><br></h5>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-12"></div>
			</div>
		</section>

		<section id="funciona" class="fleft100">
			<div class="container">
				<A name="lnk_how_function"></A>				
                                <spam style="color:black; font-size:1.6em" class="fleft100 text-center m-tb30"><?php echo $CI->T("COMO FUNCIONA", array(),$language);?></spam>
				<div class="col-md-8 col-sm-8 col-xs-12">
                                    <?php
					echo '<img src="assets/images/'.$language.'/como-funciona-1.png" class="hidden-mobile" alt="How its work">';
					echo '<img src="assets/images/'.$language.'/como-funciona-2.png" class="visible-mobile" alt="How its functions">';
                                    ?>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 text-center">
					<img src="assets/images/info.png" class="wauto m-b10" alt="Information">
					<spam class="texto fleft100">
						<?php echo $CI->T("A Dumbu não deposita seguidores em sua conta, nós captamos seguidores reais. O resultado da ferramenta depende diretamente das escolhas que o assinante faz para os seus perfis de referência.", array(),$language);?>
						<br>    
						<!-- *5 mil seguidores é a média de ganho para assinantes do plano de R$ 189,90 que postam diariamente e escolhem bons perfis de referência.  Esse número pode variar de acordo com cada conta. -->                                                
					</spam>
                                        <spam class="texto fleft100">
                                            <br>
                                        </spam>
                                        <?php
                                        //if ($language==='PT')
                                            echo '<a class="help" style="color:green; margin-top:7%">
                                                    <div >
                                                        <img style="width:12%" src="'.base_url().'assets/images/help.png" alt="Help"/>
                                                    </div>
                                                    <div style="margin-top:2%;margin-bottom:2%">
                                                        '.$CI->T("Veja as dicas para melhorar o desempenho", array(),$language).'
                                                    </div>
                                                </a>';
                                        ?>
                                        
				</div>
			</div>
		</section>
                
                
		<section id="funciona" class="fleft100">
			<div class="container">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="embed-responsive embed-responsive-16by9">
                                    <?php
                                        if ($language == 'PT') {
                                            echo '<iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/Eo2Lr1trSKs" allowfullscreen></iframe>';
                                        }
                                        else if($language == 'EN') {                                         
                                            echo '<iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/GSrr_UD8PN4" allowfullscreen></iframe>';
                                        }
                                        else echo '<iframe  class="embed-responsive-item" width="854" height="480" src="https://www.youtube.com/embed/9hwWI7eKjVk?ecver=1" frameborder="0" allowfullscreen></iframe>';
                                    ?>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
			</div>
		</section>
           
              <!--  <section id="ranking" class="fleft100">
                    <div class="container">
                        <div class="row">
                                <div class="col-sm-1"></div>
                                <b/>
                                <b/>
                                <b/>
                                <h2 class="text-center"><?php// echo $CI->T("Ranking de melhores desempenhos", array(),$language);?></h2>
                                <div class="container">
                                    <div class="col-sm-6">
                                            <div class="fleft100 bk-cinza pf-painel">
                                                <div class="row">
                                                    <div class="container">
                                                        <div class="col-xs-2">
                                                            <p class="text-left">1</p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p id="profile_ranking1">@natural_instagram</p>
                                                            <p>SEGUIDORES</p>
                                                            <div class="col-xs-4">
                                                                <p id="follo_initial_ranking1">Initial 102</p>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <p id="follo_today_ranking1">4000 Hoje</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <p>ver mais</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="fleft100 bk-cinza pf-painel">
                                                <div class="row">
                                                    <div class="container">
                                                        <div class="col-xs-2">
                                                            <p class="text-left">1</p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p>@natural_instagram</p>
                                                            <p>seguidores</p>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <p>ver mais</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        
                        <div class="row">
                                <div class="container">
                                    <div class="col-sm-6">
                                            <div class="fleft100 bk-cinza pf-painel">
                                                <div class="row">
                                                    <div class="container">
                                                        <div class="col-xs-2">
                                                            <p class="text-left">1</p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p>@natural_instagram</p>
                                                            <p>seguidores</p>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <p>ver mais</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="fleft100 bk-cinza pf-painel">
                                                <div class="row">
                                                    <div class="container">
                                                        <div class="col-xs-2">
                                                            <p class="text-left">1</p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p>@natural_instagram</p>
                                                            <p>seguidores</p>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <p>ver mais</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>  
                 </section> -->

               <section id="assinar" class="fleft100">
                        <A name="lnk_sign_in_now"></A>
			<div class="container">
				<!--<spam style="color:black; font-size:1.6em" class="fleft100 text-center m-tb30"><?php //echo $CI->T("ASSINAR", array(),$language);?><small class="fleft100"><?php //echo $CI->T("Plano mensal sem multa de rescisão", array(),$language);?>.</small></spam>-->
				<spam style="color:black; font-size:1.6em" class="fleft100 text-center m-tb30"><?php echo $CI->T("ASSINAR", array(),$language);?><small class="fleft100"><?php echo $CI->T("PLANO MENSAL", array(),$language);?></small></spam>
                                
                                <div class="titulo fleft100 text-center m-tb30">
                                     <div style="background-color:#2CC38F;margin-left:12%;margin-right:12%;margin-bottom:3%; padding:1%;border-radius:15px">
                                        <b style="color:white;font-size:1.4em"><?php echo $CI->T("Assine e ganhe 2 dias de teste grátis", array(),$language);?>!</b>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-sm-3 col-xs-12">
					<div id="container_plane_4_90" class="plano text-center fleft100">
                                            <img style="width:60%" src="<?php echo base_url().'assets/images/velocimetro01.png'?>" alt="velocimetro-1"/>
                                                <p style="font-size:0.7em"><?php echo $CI->T("VELOCIDADE", array(),$language);?></p>
                                                <b style="font-size:1.5em"><?php echo $CI->T("BAIXA", array(),$language);?></b>
                                                <div class="rc"><?php echo $CI->T("MÍNIMO DE 3 MESES", array(),$language);?></div>
                                                <br>
                                                <!--<hr>-->
                                                <!--<spam style="font-size:1.7em; color:#26a4e0">
                                                    <?php //echo $CI->T("R$", array(),$language);?>
                                                    <b><?php //echo $CI->T("4,90", array(),$language);?></b>
                                                    <small>/<?php //echo $CI->T("1º mês", array(),$language);?></small>
                                                </spam><br>-->
						<spam style="font-size:1.7em; color:#26a4e0">
                                                    <?php //echo $CI->T("Depois R$", array(),$language);?>
                                                    <?php echo $CI->T("R$", array(),$language);?>
                                                    <b><?php echo $CI->T("29,90", array(),$language);?></b>
                                                </spam>
                                                <br>
                                                <!--<input id="radio_plane_4_90" type="radio" name="plano">-->
                                                <!--<a href="#lnk_register_now">-->
                                                    <div class="text-center">
                                                        <button id="btn_select_plane_slow" type="button" class="btn-primary btn-green m-t20 ladda-button btn-lg" data-style="expand-left" data-spinner-color="#ffffff">
                                                            <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("SELECIONAR", array(),$language);?></div></span>
                                                        </button>                                            
                                                    </div>
                                                <!--</a>-->
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div id="container_plane_9_90" class="plano text-center fleft100">
                                            <img style="width:60%" src="<?php echo base_url().'assets/images/velocimetro02.png'?>" alt="velocimetro-4"/>
                                                <p style="font-size:0.7em"><?php echo $CI->T("VELOCIDADE", array(),$language);?></p>
                                                <b style="font-size:1.5em"><?php echo $CI->T("MODERADA", array(),$language);?></b>
                                                <hr>
                                                <!--<spam style="font-size:1.7em; color:#26a4e0">
                                                    <?php //echo $CI->T("R$", array(),$language);?><b>
                                                    <?php //echo $CI->T("9,90", array(),$language);?>
                                                    </b> <small>/<?php //echo $CI->T("1º mês", array(),$language);?></small>
                                                </spam><br>-->
						<spam style="font-size:1.7em; color:#26a4e0">
                                                    <?php //echo $CI->T("Depois R$", array(),$language);?><b>
                                                    <?php echo $CI->T("R$", array(),$language);?>
                                                    <?php echo $CI->T("49,90", array(),$language);?></b>
                                                </spam>
                                                <br>
                                                <!--<input id="radio_plane_9_90" type="radio" name="plano">-->
                                                <!--<a href="#lnk_register_now">-->
                                                    <div class="text-center">
                                                        <button id="btn_select_plane_moderated" type="button" class="btn-primary btn-green m-t20 ladda-button btn-lg" data-style="expand-left" data-spinner-color="#ffffff">
                                                            <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("SELECIONAR", array(),$language);?></div></span>
                                                        </button>                                            
                                                    </div>
                                                <!--</a>-->
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div id="container_plane_29_90" class="plano active text-center fleft100">
                                            <img style="width:60%" src="<?php echo base_url().'assets/images/velocimetro03.png'?>" alt="velocimetro-3"/>
                                                <p style="font-size:0.7em"><?php echo $CI->T("VELOCIDADE", array(),$language);?></p>
                                                <b style="font-size:1.5em"><?php echo $CI->T("RÁPIDA", array(),$language);?></b>
						<div class="rc"><?php echo $CI->T("RECOMENDADO", array(),$language);?></div>
                                                <br>
                                                <!--<spam style="font-size:1.7em; color:#26a4e0">
                                                    <?php //echo $CI->T("R$", array(),$language);?><b>
                                                    <?php //echo $CI->T("29,90", array(),$language);?></b> 
                                                    <small>/<?php //echo $CI->T("1º mês", array(),$language);?></small>
                                                </spam><br>-->
						<spam style="font-size:1.7em; color:#26a4e0">
                                                    <?php //echo $CI->T("Depois R$", array(),$language);?><b>                                                    
                                                    <?php echo $CI->T("R$", array(),$language);?>
                                                    <?php echo $CI->T("99,90", array(),$language);?></b>
                                                </spam>
                                                <br>
                                                <div class="text-left">
                                                    <spam>
                                                        <img src="<?php echo base_url().'assets/images/seta-ok.png'; ?>"  class="wauto" alt="Ok">
                                                        <a class="help"><b class="c-green"><?php echo $CI->T("Geolocalização", array(),$language);?></b></a>
                                                        <?php
                                                            if($language=='PT')
                                                                echo '<img src="assets/images/geolocalizacao_init.jpg" style="width:40px" alt="new">';
                                                            else
                                                                echo '<img src="assets/images/geolocalizacao_init.jpg" style="width:40px"  alt="new">';
                                                        ?>
                                                    </spam>
                                                    <br>
                                                    <spam>
                                                        <img src="<?php echo base_url().'assets/images/seta-ok.png'; ?>"  class="wauto" alt="Ok">
                                                        <a class="help"><b class="c-green">Hashtag</b></a>
                                                        <?php
                                                           echo '<img src="assets/images/avatar_hashtag.png" style="width:30px" alt="new">';
                                                        ?>
                                                    </spam>
                                                </div>
                                                <br>
<!--                                                <input id="radio_plane_29_90" type="radio" name="plano" checked="true">-->
                                                <!--<a href="#lnk_register_now">-->
                                                    <div class="text-center">
                                                        <button id="btn_select_plane_fast" type="button" class="btn-primary btn-green m-t20 ladda-button btn-lg" data-style="expand-left" data-spinner-color="#ffffff">
                                                            <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("SELECIONADO", array(),$language);?></div></span>
                                                        </button>                                            
                                                    </div>
                                                <!--</a>-->
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12">
                                        <div id="container_plane_99_90" class="plano text-center fleft100">
                                            <img style="width:60%" src="<?php echo base_url().'assets/images/velocimetro04.png'?>" alt="velocimetro-2"/>
                                                <p style="font-size:0.7em"><?php echo $CI->T("VELOCIDADE", array(),$language);?></p>
                                                <b style="font-size:1.5em"><?php echo $CI->T("TURBO!", array(),$language);?></b>
                                                <hr>
                                                <!--<spam style="font-size:1.7em; color:#26a4e0">
                                                    <?php //echo $CI->T("R$", array(),$language);?><b>
                                                    <?php //echo $CI->T("99,90", array(),$language);?></b> 
                                                    <small>/<?php //echo $CI->T("1º mês", array(),$language);?></small>
                                                </spam><br>-->
						<span style="font-size:1.7em; color:#26a4e0">
                                                    <?php //echo $CI->T("Depois R$", array(),$language);?><b>
                                                    <?php echo $CI->T("R$", array(),$language);?>
                                                    <?php echo $CI->T("189,90", array(),$language);?></b>
                                                </span>
                                                <br>
                                                <div class="text-left">
                                                    <spam>
                                                        <img src="<?php echo base_url().'assets/images/seta-ok.png'; ?>"  class="wauto" alt="ok">
                                                        <a class="help"><b class="c-green"><?php echo $CI->T("Geolocalização", array(),$language);?></b></a>
                                                        <?php
                                                            if($language=='PT')
                                                                echo '<img src="assets/images/geolocalizacao_init.jpg" style="width:40px" alt="">';
                                                            else
                                                                echo '<img src="assets/images/geolocalizacao_init.jpg" style="width:40px"  alt="new">';
                                                        ?>
                                                    </spam>
                                                    <br>
                                                    <spam>
                                                        <img src="<?php echo base_url().'assets/images/seta-ok.png'; ?>"  class="wauto" alt="Ok">
                                                        <a class="help"><b class="c-green">Hashtag</b></a>
                                                        <?php
                                                           echo '<img src="assets/images/avatar_hashtag.png" style="width:30px" alt="new">';
                                                        ?>
                                                    </spam>
                                                    <br>
                                                    <spam>
                                                        <img src="<?php echo base_url().'assets/images/seta-ok.png'; ?>" class="wauto" alt="">
                                                        <b class="c-green"><?php echo $CI->T("Whatsapp", array(),$language);?></b>
                                                        <img title="WhatsApp" src="assets/images/watsapp.png" style="width:40px" alt="">
                                                    </spam>
                                                    <!--<spam>
                                                        <img src="<?php //echo base_url().'assets/images/seta-ok.png'; ?>" class="wauto" alt="">
                                                        <a class="help"><b class="c-green"><?php //echo $CI->T("Auto Like", array(),$language);?></b></a>
                                                        <?php
                                                            /*if($language=='PT')
                                                                echo '<img src="assets/images/novo_black.jpg" style="width:40px" alt="">';
                                                            else
                                                                echo '<img src="assets/images/new_black.png" style="width:40px"  alt="">';                                                             
                                                             */
                                                        ?>
                                                    </spam>-->
                                                </div>
                                                <br>
                                                <!--<input id="radio_plane_99_90" type="radio" name="plano">-->
                                                <!--<a href="#lnk_register_now">-->
                                                    <div class="text-center">
                                                        <button id="btn_select_plane_turbo" type="button" class="btn-primary btn-green m-t20 ladda-button btn-lg" data-style="expand-left" data-spinner-color="#ffffff">
                                                            <span class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("SELECIONAR", array(),$language);?></div></span>
                                                        </button>                                            
                                                    </div>
                                                <!--</a>-->
					</div>
				</div>
			</div>
		</section>
                                
		<section id="passos" class="fleft100 m-t30">
                    <A name="lnk_register_now"></A>
			<div class="container cl-black">
                            <!--PASSO 1-->
                                <div id="coniner_login_panel" style="margin-top:180px" class="col-md-4 col-sm-4 col-xs-12 passo m-t40">
                                    <div id="container_login_panel" style="visibility:hidden;display:none">
                                        <h5 class="no-mg text-center"><b><?php echo $CI->T("PASSO 1", array(),$language);?></b></h5>
					<div class="text-center fleft100 m-t20">
						<img src="assets/images/ig.png" class="wauto" alt="Instagram">
						<spam class="fleft100 m-b5"><?php echo $CI->T("Conta de Instagram", array(),$language);?></spam>
					</div>
                                        <div id="login_sign_in" class="login fleft100 input-form">
						<fieldset>
                                                    <input id="client_email" type="text" placeholder="<?php echo $CI->T("E-mail pessoal(válido*)", array(),$language);?>" required value="<?php if(isset($_GET) && isset($_GET['_u']) && isset($_GET['_d'])) echo $_GET['_u'].'@'.$_GET['_d']; else echo '';?>">
						</fieldset>
						<fieldset>
							<input id = "signin_clientLogin" type="text" placeholder="<?php echo $CI->T("Usuário Instagram", array(),$language);?>" onkeyup="javascript:this.value=this.value.toLowerCase();" style="text-transform:lowercase;"  required value="<?php if(isset($_GET) && isset($_GET['username'])) echo $_GET['username']; else echo '';?>">
						</fieldset>
						<fieldset>
							<input id = "signin_clientPassword" type="password" placeholder="<?php echo $CI->T("Senha Instagram", array(),$language);?>" required>
						</fieldset>
                                            
                                           
                                            <div class="text-center">
                                                <button id = "signin_btn_insta_login" type="button" class="btn-primary m-t20 ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                                    <spam class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("CONFERIR", array(),$language);?></div></spam>
                                                </button>
                                            </div>
                                            <div id="container_sigin_message" class="text-center" style="margin-top:7%; visibility:hidden; font-family:sans-serif; font-size:0.9em">                                                        
                                            </div>
					</div>
                                    </div>
                                    <div id="signin_profile"  style="text-align:center; visibility:visible;display:block">
                                        <h5 class="no-mg text-center"><b><?php echo $CI->T("PASSO 1", array(),$language);?></b></h5>
                                        <br><p style="font-family:sans-serif; font-size:1em; color: green"><?php echo $CI->T("Perfil conferido!", array(),$language);?><br><br></p>                    
                                        <div id="reference_profile">
                                            <img id="img_ref_prof" class="img-circle image-reference-profile" style="width:20%" src=""><br>
                                            <b id="name_ref_prof" style="font-family:sans-serif; font-size:1em;"></b><br>
                                            <div id="ref_prof_followers" style="font-family:sans-serif; font-size:1em;"></div>
                                            <div id="ref_prof_following" style="font-family:sans-serif; font-size:1em;"></div>
                                            <div id="code_sign_in" class="login fleft100 input-form">
                                                <div class="col-md-4 col-sm-4 col-xs-12 no-pd"></div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 no-pd">
                                                    <fieldset>
                                                        <input style="text-align:center" id = "signin_code" type="text" placeholder="_ _ _ _"  required >
                                                    </fieldset>                                                    
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 no-pd"></div>
                                                <br>
                                                <div id="container_sigin_code_message" class="text-center" style="margin-top:7%; visibility:hidden; font-family:sans-serif; font-size:0.9em">                                                        
                                                </div>
                                                <div class="text-center">
                                                    <button id = "signin_btn_send_code" type="button" class="btn-primary m-t20 ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                                        <spam class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("ENVIAR", array(),$language);?></div></spam>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				</div>
                            
                            <!--PASSO 2-->
                                <div id="coniner_data_panel" style="margin-top:180px" class="col-md-4 col-sm-4 col-xs-12 passo m-t40">
                                        <h5 class="no-mg text-center"><b><?php echo $CI->T("PASSO 2", array(),$language);?></b></h5>

					<div id="exTab2" class="container">	
                                            <ul class="nav nav-tabs">
                                                <li  class="active" >
                                                    <a id="tab_credit_card" href="#tab_credito" data-toggle="tab">
                                                        <img src="assets/images/pay.png" class="wauto" alt="Pay">  Crédito
                                                    </a>
                                                </li>
                                                <?php if($SERVER_NAME=='PRO'){?>
                                                <li id="tab_ticket_bank">
                                                    <a href="#tab_boleto" data-toggle="tab">
                                                        <img src="assets/images/boleto2.png" class="wauto" alt="Pay">  Boleto
                                                    </a>
                                                </li>
                                                <?php } ?>
                                            </ul>

                                            <div class="tab-content ">
                                                <div class="tab-pane active" id="tab_credito">
                                                    <div class="pay fleft100 input-form">   
                                                        <fieldset>
                                                                <input id="credit_card_name" type="text" placeholder="<?php echo $CI->T("Meu nome no cartão", array(),$language);?>"  type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;">
                                                        </fieldset>
                                                        <div class="col-md-9 col-sm-9 col-xs-12 pd-r5">
                                                            <fieldset>
                                                                <input id="credit_card_number" type="text" placeholder="<?php echo $CI->T("Número do cartão", array(),$language);?>" maxlength="20">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-12 pd-l5">
                                                                <fieldset>
                                                                    <input id="credit_card_cvc" type="text" placeholder="<?php echo $CI->T("CVV/CVC", array(),$language);?>" maxlength="5">
                                                                </fieldset>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 no-pd">
                                                                <spam class="val"><?php echo $CI->T("Validade", array(),$language);?></spam>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 pd-r15 m-t10">
                                                            <fieldset>
                                                                    <div class="select">
                                                                        <select id="credit_card_exp_month" name="local" class="btn-primeiro sel" id="local">
                                                                            <option>01</option><option>02</option><option>03</option>
                                                                            <option>04</option><option>05</option><option>06</option>
                                                                            <option>07</option><option>08</option><option>09</option>
                                                                            <option>10</option><option>11</option><option>12</option>
                                                                        </select>
                                                                    </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 no-pd m-t10">
                                                            <fieldset>
                                                                <div class="select">
                                                                    <select id="credit_card_exp_year" name="local" class="btn-primeiro sel" id="local">
                                                                        <option>2018</option>
                                                                        <option>2019</option><option>2020</option><option>2021</option>
                                                                        <option>2022</option><option>2023</option><option>2024</option>
                                                                        <option>2025</option><option>2026</option><option>2027</option>
                                                                        <option>2028</option><option>2029</option><option>2030</option>
                                                                        <option>2031</option><option>2032</option><option>2033</option>
                                                                        <option>2034</option><option>2035</option><option>2036</option>
                                                                        <option>2037</option><option>2038</option><option>2039</option>
                                                                    </select>
                                                                </div>
                                                            </fieldset>
                                                        </div>

                                                        <div class="col-md-3 col-sm-3 col-xs-12 no-pd m-t10">
                                                            <spam class="val"><?php echo $CI->T("CUPOM", array(),$language);?> (*)</spam>
                                                        </div>
                                                        <div class="col-md-9 col-sm-9 col-xs-12 no-pd m-t10">
                                                            <fieldset>
                                                                <input id="ticket_peixe_urbano" type="text" placeholder="<?php echo $CI->T("CODIGO PROMOCIONAL", array(),$language);?>" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" >
                                                            </fieldset>
                                                        </div>                                                    
                                                        <div class="col-md-12 col-sm-12 col-xs-12 no-pd text-center">
                                                            <fieldset>
                                                                    <spam class="val">(*) <?php echo $CI->T("Só pra usuários requisitados", array(),$language);?></spam>
                                                            </fieldset>
                                                        </div>
                                                    </div>     
                                                </div>
                                                <?php if($SERVER_NAME=='PRO'){?>
                                                <div class="tab-pane" id="tab_boleto">
                                                    <div class="pay fleft100 input-form">   
                                                        <fieldset>
                                                            <br>                                                       
                                                            <div class="select">
                                                                <select id="ticket_bank_option" name="local" class="btn-primeiro sel" id="local">
                                                                    <option id="default_ticket_option" value="0" checked>Selecione o plano ...</option>
                                                                    <option id="plano3meses" value="1"> 3 meses - 15% desconto</option>
                                                                    <option id="plano6meses" value="2"> 6 meses - 25% desconto</option>
                                                                    <option id="plano1ano"   value="3">12 meses - 40% desconto</option>
                                                                </select>
                                                            </div>
                                                        </fieldset>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 pd-r5">
                                                            <fieldset>
                                                                <input id="ticket_bank_client_name" type="text" placeholder="Nome completo" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" required>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 pd-r5">
                                                            <fieldset>
                                                                <input id="cpf" type="text" placeholder="CPF" required>
                                                            </fieldset>
                                                        </div> 
                                                        <div class="col-md-5 col-sm-5 col-xs-12 pd-r1">
                                                            <fieldset>
                                                                <input id="cep" type="text" placeholder="CEP" required>                                                                
                                                            </fieldset>                                                            
                                                        </div>
                                                        <div class="col-md-1 col-sm-1 col-xs-12 pd-r15" style="margin-top:8px">
                                                            <fieldset>
                                                                <button id="verify_cep" type="button" class="btn btn-success" >
                                                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                                </button>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12 pd-r5">
                                                            <fieldset>
                                                                <input id="street_address" type="text" placeholder="Logradouro" required>
                                                            </fieldset>
                                                        </div>                                                    
                                                        <div class="col-md-4 col-sm-4 col-xs-12 pd-r5">
                                                            <fieldset>
                                                                <input id="house_number" type="text" placeholder="Num/Compl" required>
                                                            </fieldset>
                                                        </div>                                                    
                                                        <div class="col-md-5 col-sm-5 col-xs-12 pd-r5">
                                                            <fieldset>
                                                                <input id="neighborhood_address" type="text" placeholder="Bairro" required>
                                                            </fieldset>
                                                        </div>                                                    
                                                        <div class="col-md-5 col-sm-5 col-xs-12 pd-r5">
                                                            <fieldset>
                                                                <input id="municipality_address" type="text" placeholder="Localidade" required>
                                                            </fieldset>
                                                        </div>                                                    
                                                        <div class="col-md-2 col-sm-2 col-xs-12 pd-r5">
                                                            <fieldset>
                                                                <input id="state_address" type="text" placeholder="UF" required>
                                                            </fieldset>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>                             
				</div>
                            
                            <!--PASSO 3-->
                                <div id="container_sing_in_panel" style="margin-top:180px" class="col-md-4 col-sm-4 col-xs-12 passo text-center m-t40">
					<h5 class="no-mg text-center"><b><?php echo $CI->T("PASSO 3", array(),$language);?></b></h5>
					<div class="text-center fleft100 m-t20">
						<img src="assets/images/ass.png" class="wauto" alt="Add User">
						<spam class="fleft100"><?php echo $CI->T("Assine e configure sua conta", array(),$language);?></spam>
                                                <!--<div class="text-right m-t20 g-recaptcha" data-sitekey="6LdLoCwUAAAAAPo1W1PEf3n24JASjAVQXQTQRZdF"></div>-->
					</div>    
                                        

					<div class="text-center">
                                            <button id="btn_sing_in" type="button" class="btn-primary btn-green m-t20 ladda-button btn-lg" data-style="expand-left" data-spinner-color="#ffffff" data-toggle="modal" data-target="#myModal">
                                                <spam class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("ASSINAR AGORA", array(),$language);?></div></spam>
                                            </button>                                            
                                        </div>
                                            
                                        
                                        <?php echo $CI->T("Ao assinar já estou aceitando os ", array(),$language);?><a id="use_term" href="<?php echo base_url().'assets/others/'.$language.'/TERMOS DE USO DUMBU 2.pdf'?>" target="_blank" style="color: blue"><?php echo $CI->T("termos de uso", array(),$language);?></a>
                                        <br><br><?php echo '<img src="assets/images/'.$language.'/seguro.png" class="wauto" alt="100% Safe Encrypted Data">';?>
				</div>
			</div>
		</section>

            <section id="contato" class="fleft100 input-form" style="margin-top: 10%">
			<div class="container">
				<spam style="color:black; font-size:1.6em" class="fleft100 text-center m-t10"><?php echo $CI->T("FALE CONOSCO", array(),$language);?></spam>
                                <div class="col-md-3 col-sm-3 col-xs-12"><br></div>
                                <div id="talkme_frm" class="col-md-6 col-sm-6 col-xs-12 no-pd">
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
					<div class="col-md-6 col-sm-6 col-xs-12 pd-r15">
						<fieldset>
							<input id="visitor_name" type="text" placeholder="<?php echo $CI->T("Nome", array(),$language);?>">
						</fieldset>
						<fieldset>
							<input id="visitor_email" type="text" placeholder="<?php echo $CI->T("E-mail", array(),$language);?>">
						</fieldset>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 pd-l15">
						<fieldset>
							<input id="visitor_company" type="text" placeholder="<?php echo $CI->T("Empresa", array(),$language);?>">
						</fieldset>
						<fieldset>
							<input id="visitor_phone" type="text" placeholder="<?php echo $CI->T("Telefone", array(),$language);?>">
						</fieldset>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 no-pd">
						<textarea id="visitor_message" name="" placeholder="<?php echo $CI->T("Mensagem", array(),$language);?>" id=""  rows="8"></textarea>
                                                
                                                <p class="text-center"><?php echo $CI->T("Enviando para", array(),$language);?>: <?php if($SERVER_NAME=='PRO') echo 'atendimento@dumbu.pro'; else echo 'contact@dumbu.one';?>
                                                </p>
                                                
						<div class="text-center">
                                                    <button id="btn_send_message" class="btn-primary btn-475f66 m-t20 ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                                                        <?php echo $CI->T("ENVIAR MENSAGEM", array(),$language);?>
                                                    </button>
                                                </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12"><br></div>

				<footer class="text-center fleft100 m-t30 m-b10"><img src="assets/images/logo-footer.png" class="wauto" alt="Dumbu Footer Logo"></footer>
			</div>
		</section>
            
           
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>
                
                <!--modal_container_alert_message-->
                <div class="modal fade" style="top:30%" id="modal_alert_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div id="modal_container_alert_message" class="modal-dialog modal-sm" role="document">                                                          
                        <div class="modal-content">
                            <div class="modal-header">
                                <button id="btn_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                              <img src="<?php echo base_url() . 'assets/images/FECHAR.png'; ?>" alt="cancel"> <!--<spam aria-hidden="true">&times;</spam>-->
                                </button>
                                <h5 class="modal-title" id="myModalLabel"><b><?php echo $CI->T("Mensagem", array(),$language); ?></b></h5>                        
                            </div>
                            <div class="modal-body">                                            
                                <p id="message_text"></p>                        
                            </div>
                            <div class="modal-footer text-center">
                                <button id="accept_modal_alert_message" type="button" class="btn btn-default active text-center ladda-button" data-style="expand-left" data-spinner-color="#ffffff">
                                    <spam class="ladda-label"><div style="color:white; font-weight:bold"><?php echo $CI->T("ACEITAR", array(),$language); ?></div></spam>
                                </button>
                            </div>
                        </div>
                    </div>                                                        
                </div> 
                
        <!-- Afilio Master Tag Home Page-->
            <?php
                if($SERVER_NAME==='PRO'){?>
                    <script type="text/javascript" src="https://secure.afilio.com.br/?progid=2289&type=homepage&id_partner=dumbupro&url_product=https://dumbu.pro/dumbu/src/"></script>        
            <?php }?>
                    
            <!--Start of Boostbox Tag Script-->
            <?php if ($SERVER_NAME == "PRO") { ?>
                    <script async="1" src="//tags.fulllab.com.br/scripts/master-tag/produto_dumbu.js"></script>
            <?php } ?>
            <!--End of Boostbox Tag Script-->
	</body>
</html>