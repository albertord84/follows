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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/default.css';?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/component.css';?>" />
                <link rel="stylesheet" href="<?php echo base_url().'assets/css/ladda-themeless.min.css'?>">
		
                <script type="text/javascript" src="<?php echo base_url().'assets/js/modernizr.custom.js';?>"></script>                
                <script src="<?php echo base_url().'assets/js/spin.min.js'?>"></script>
                <script src="<?php echo base_url().'assets/js/ladda.min.js'?>"></script>                
                <script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
                <script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.dlmenu.js"></script>
                <script type="text/javascript" src="<?php echo base_url().'assets/js/admin.js?'.$SCRIPT_VERSION;?>"></script>
	</head>
	<body id="my_body">
                
		
            <header class="bk-black">
                <div class="container">

                        <nav class="navbar navbar-default navbar-static-top">					
                            <div class="logo pabsolute fleft100 text-center">
                                <a class="navbar-brand i-block" href="<?php echo base_url() . 'index.php';?>">
                                            <img alt="Brand" src="<?php echo base_url().'assets/images/logo.png'?>">
                                    </a>
                            </div>
                        </nav>
                </div>
            </header>
            
            <div class="row">
                <div class="col-md-12" style="margin-top:10%; margin-left:38%">
                    <div id="login_admin_container">
                        <form id="usersLoginForm" action="#" method="#" class="form" role="form" accept-charset="UTF-8">
                                <div class="form-group center" style="font-family:sans-serif; font-size:0.9em">
                                    <?php echo $CI->T("PARA ADMINISTADORES E ATENDENTES", array(),$language);?>
                                </div>
                                <div class="form-group center" style="font-family:sans-serif; font-size:0.7em">
                                    <?php echo $CI->T("Use login e senha Pessoal", array(),$language);?>
                                </div>
                                <div class="form-group">
                                    <input id="userLogin2" type="text" class="form-control" placeholder="<?php echo $CI->T("Usuário", array(),$language);?>" onkeyup="javascript:this.value=this.value.toLowerCase();" style="text-transform:lowercase;" required="">
                                </div>
                                <div class="form-group">
                                        <input id="userPassword2" type="password" class="form-control" placeholder="<?php echo $CI->T("Senha", array(),$language);?>" required="">
                                </div>
                                <div class="form-group">
                                        <button id="btn_admin_login" class="btn btn-success btn-block ladda-button" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                                <spam class="ladda-label"><?php echo $CI->T("Entrar", array(),$language);?></spam>
                                        </button>
                                </div>
                                <div id="container_login_message2" class="form-group text-center" style="text-align:justify;visibility:hidden; font-family:sans-serif; font-size:0.9em">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
       
        </body>
</html>