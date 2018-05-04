<div style="background-color:#030303">
    <div class="col-md-7"></div>
    <div class="col-md-5" style="margin-left:-1.2%">        
            <div class="row" >        
                <nav class="navbar navbar-inverse navbar-right" id="login_painel" role="navigation">  <!--style="background-color:transparent;border-color:transparent;"-->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">  <!--style="background-color:transparent;"-->
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">           
                         <ul class="nav navbar-nav navbar-left">
                            <li><a  href="#lnk_faq_function">FAQ</a></li> <!--style="color:white"-->
                            <li><a  href="#lnk_how_function">COMO FUNCIONA</a></li> <!--style="color:white"-->
                            <li><a  href="#lnk_sign_in_now">ASSINAR AGORA</a></li> <!--style="color:white"-->
                            <li class="dropdown" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">ENTRAR<b class="caret"></b></a> <!--style="background-color:transparent; color:white" -->
                                <ul class="dropdown-menu" style="padding: 15px; min-width: 220px;">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12" >
                                                <form id="usersLoginForm"  action="#" method="#"  class="form" role="form"  accept-charset="UTF-8" >
                                                    <div class="form-group center" style="font-family:sans-serif; font-size:0.9em">
                                                        EXCLUSIVO PARA USUÁRIOS
                                                    </div>
                                                    <div class="form-group center" style="font-family:sans-serif; font-size:0.7em">
                                                        Use login e senha de Instagram
                                                    </div>
                                                    <div class="form-group">                                                                
                                                         <input id="userLogin" type="text" class="form-control" placeholder="Usuário" onkeyup="javascript:this.value=this.value.toLowerCase();" style="text-transform:lowercase;"  required>
                                                    </div>
                                                    <div class="form-group">                                                                
                                                        <input id="userPassword" type="password" class="form-control" placeholder="Senha" required>
                                                    </div>                                                             
                                                    <div class="form-group">
                                                        <button id="btn_dumbu_login" class="btn btn-success btn-block ladda-button" type="button" data-style="expand-left" data-spinner-color="#ffffff">
                                                            <span class="ladda-label">Entrar</span>
                                                        </button>
                                                    </div>
                                                    <div id="container_login_message" class="form-group" style="text-align:justify;visibility:hidden; font-family:sans-serif; font-size:0.9em">                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>                                                
                                </ul>
                            </li>
                         </ul>
                    </div>
                </nav> 
            </div>
    </div>
    <!--LOGOTIPO-->
    <div class="center">
        <a href="#"><img  class="logo" src="<?php echo base_url().'assets/img/dumbu_logo.png'?>"/></a>        
    </div>
</div>


<div style="background-color:#0F0F0F">
    <!--TEXTO TOPO-->
    <div class="center">
        <a href="#"><img  class="texto-topo" src="<?php echo base_url().'assets/img/dizembro/texto-topo.png'?>"/></a>        
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <img  style="width:80%; padding:2%; margin-left:5%; margin-top:10%;" src="<?php echo base_url().'assets/img/PASSO A PASSO.png'?>"/>
        </div>    
        <div class="col-md-4">
            <img style="width:90%; padding:2%; margin-left: 5%;padding-bottom: 0%;" src="<?php echo base_url().'assets/img/iphone2.png'?>"/>
        </div>
        <div class="col-md-4">
            <div class="center" style="padding: 5%; width:100%">   
                <div style="border:1px solid silver; padding: 2%; margin-left:10%; margin-top:0%; width:70%">
                    <img width="60%" src="<?php echo base_url().'assets/img/a partir de 4.png'?>"/>                    
                    <div class="center" style="margin-top: 5%">                            
                        <a href="#lnk_sign_in_now">
                            <img id="botao-assinar" style="width:85%;" src="<?php echo base_url().'assets/img/BOTAO ASSINAR AGORA.png'?>"/>
                        </a>
                    </div>
                </div>
                <div class="center" style="width:50%;margin-left:20%; margin-top: 3%;">
                    <img class="img-btn" src="<?php echo base_url().'assets/img/50 países.png'?>"/>                       
                </div>
            </div>
        </div>
    </div>
</div>


<div style="background-color:#202020">
    <div class="row center">
        <div class="col-md-4">
            <img class="img-footter-section-11" width="70%"   src="<?php echo base_url().'assets/img/100-porciento.png'?>"/>    
        </div>
        <div class="col-md-4">
            <img class="img-footter-section-11" width="70%" src="<?php echo base_url().'assets/img/voce-escolhe.png'?>"/>
        </div>
        <div class="col-md-4">
            <img class="img-footter-section-11" width="70%" style="margin-left: 4%"  src="<?php echo base_url().'assets/img/sus-seguidores.png'?>"/>
        </div>
    </div>
</div>