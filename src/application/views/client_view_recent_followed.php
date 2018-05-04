<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <?php $CI = & get_instance(); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="<?php echo $CI->T("Ganhar seguidores no Instagram | Ganhar ou Comprar Seguidores Reais e Ativos no Instagram", array()); ?>">
        <meta name="description" content="<?php echo $CI->T("Obter seguidores no Instagram. Dumbu.pro te permite adicionar seguidores de Instagram 100% reales e ativos. Ganhe mais seguidores em Instagram a precios mais baratos!",array());?>">
        <meta name="keywords" content="<?php echo $CI->T("ganhar, seguidores, Instagram, seguidores segmentados, curtidas, followers, geolocalizção, direct, vendas", array()); ?>">
        <meta name="revisit-after" content="7 days">
        <meta name="robots" content="index,follow">
        <meta name="distribution" content="global">        
        <title>Get Followers on Instagram | Gain or Buy Real & Active Instagram Followers</title>
        
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/icon.png' ?>"> 
        <link href="<?php echo base_url() . 'assets/css/typeahead.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'assets/css/loading.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'assets/css/style.css'; ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/default.css'; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/component.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/ladda-themeless.min.css' ?>">        
        
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>      
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/typeahead.js'; ?>"></script>      
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/modernizr.custom.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/spin.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/ladda.min.js' ?>"></script>
        
        <script type="text/javascript">var //language = '<?php echo $language; ?>';</script>
        
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/' . $language . '/internalization.js'; ?>"></script>
        
                                          
        ?>
        
        <?php include_once("pixel_facebook.php") ?>
    </head>

    <body style="min-height:100%">
        <?php include_once("analyticstracking.php") ?>
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
                        <li><a href="<?php echo base_url() . 'index.php/welcome/log_out' ?>"><img src="<?php echo base_url() . 'assets/images/user.png'; ?>" class="wauto us" alt=""><?php echo $CI->T("SAIR", array()); ?></a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="perfil" class="fleft100">
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-6">
                    <div class="center">
                        <h3>Tabela de trabalho hoje</h3>
                        <br>
                        <table class="table">
                            <?php
                                echo '<tr class="alert alert-success" style="color:blue">';
                                    
                                    echo '<td>Perfil</td>';
                                    echo '<td>Data </td>';
                                echo '</tr>';
                                
                                for($i=1;count($followed_id);$i++){
                                    echo '<tr>';
                                        echo '<td>'.$followed_id[][$i].'</td>';
                                        echo '<td>'.date['$i'].'</td>';                                    
                                    echo '</tr>';
                                }
                            ?>
                        </table> 
                    </div>
                </div>
                <div class="col-xs-3"></div>            
            </div>           
                
        </section>  
        
        <footer class="text-center fleft100 m-t30 m-b10">
            <div class="container"><img src="<?php echo base_url() . 'assets/images/logo-footer.png'; ?>" class="wauto" alt=""> <span class="fleft100 text-center">DUMBU - 2017 - <?php echo $CI->T("TODOS OS DIREITOS RESERVADOS", array()); ?></span></div>
        </footer>

        <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery.dlmenu.js'; ?>"></script>
        <script>
            $(function () {
                $('#dl-menu').dlmenu();
            });
        </script>        
    </body>
</html>