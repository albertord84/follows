

    <br><br><p class="section-titles">ASSINAR</p><br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <img class="img-btn" style="width:65%; margin:10%; padding-top:12%; padding-bottom:12%; padding-left: 5%; padding-right:5%; border:1px solid silver; box-shadow: 10px 10px 5px #888888;" src="<?php echo base_url().'assets/img/99 X.png'?>"/>
        </div>
        <div class="col-md-4"></div>
    </div>
    
    <div>
        <div class="row">
            <div id="login_panel" class="col-md-4" >   <!--col-xs-4 col-sm-4 filter-buttons-->
                <hr>
                <div id="container_login_panel" style="visibility:visible;display:block">
                    <label>PASSO 1</label><br><br>
                    <div class="center">
                        <img class="img-btn" style="width:10%;margin:0%" src="<?php echo base_url().'assets/img/Camada 51.png'?>"/><br>
                        <img class="img-btn" style="width:50%;margin:0%" src="<?php echo base_url().'assets/img/Login com o Instagram.png'?>"/>
                    </div>                
                    <form id="login_sign_in"  action="#" method="#"  style="margin-top:4%; visibility:visible; width: 80%; margin-left:10%;  padding:0%" class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">                    
                        <div class="form-group" style="width:100%">                                      
                            <input id="client_email" type="email" class="form-control" placeholder="E-mail pessoal (válido)" required>
                        </div>
                        <div class="form-group">
                           <input id = "signin_clientLogin" type="text" class="form-control"  placeholder="Usuário" onkeyup="javascript:this.value=this.value.toLowerCase();" style="text-transform:lowercase;"  required>
                        </div>
                        <div class="form-group">
                           <input id = "signin_clientPassword" type="password" class="form-control" placeholder="Senha" required>
                        </div>                
                        <div class="form-group">                    
                            <button  id = "signin_btn_insta_login" type="button" class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff" style="width: 50%">
                                <span class="ladda-label"><div style="color:white; font-weight:bold">Login</div></span>
                            </button>
                        </div>
                        <div id="container_sigin_message" class="form-group" style="text-align:justify; visibility:hidden; font-family:sans-serif; font-size:0.9em">                                                        
                        </div>
                     </form>
                </div>             
                    <div id="signin_profile" style="visibility:hidden;display:none">
                        <br><p style="font-family:sans-serif; font-size:1em; color: green">Perfil conferido!<br><br></p>                    
                        <div id="reference_profile">
                            <img id="img_ref_prof" class="img-circle image-reference-profile" style="width:20%" src=""><br>
                            <b id="name_ref_prof" style="font-family:sans-serif; font-size:1em;"></b><br>
                            <div id="ref_prof_followers" style="font-family:sans-serif; font-size:1em;"></div>
                            <div id="ref_prof_following" style="font-family:sans-serif; font-size:1em;"></div>
                        </div>
                    </div>
                    <br>            
            </div>

            <div id="data_panel" class="col-md-4" >   <!--col-xs-4 col-sm-4 filter-buttons-->
                <hr>
                <div id="coniner_data_panel" style="padding-left:3%; padding-right: 3%">
                    <label>PASSO 2</label><br><br>
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
                </div>                
            </div>

            <div id="sing_in_panel" class="col-md-4">   
                <hr>     
                <div id="container_sing_in_panel">
                    <label>PASSO 3</label><br><br>
                    <div class="center">
                        <img class="img-btn" style="width:11%;margin:0%" src="<?php echo base_url().'assets/img/Shape 1.png'?>"/><br>
                        <img class="img-btn" style="width:63%;margin:0%" src="<?php echo base_url().'assets/img/Assine e configure sua conta.png'?>"/>
                    </div>

                    <div style="margin-top:3%">
                        <button id="btn_sing_in" type="button" style="width:60%; padding:0%;" type="button">
                            <img id="img_btn_sing_in" class="img-btn" style="width:100%;margin:0%" src="<?php echo base_url().'assets/img/assinar4.png'?>"/>                        
                        </button>
                    </div>         
                    <div style="margin-top:4%">    
                        Ao assinar já estou aceitando os <a id="lnk_use_term" style="text-decoration:underline; color:blue" href="#">termos de uso</a>            
                    </div>
                    <div style="margin-top:7%">    
                        <img class="img-btn" style="width:63%;margin:0%" src="<?php echo base_url().'assets/img/SEGURANÇA.png'?>"/>
                    </div>
                    <br><br>            
                </div>
            </div>
        </div>
    </div>



    <!--
    <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
           <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
           <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
              <li>
                 <div class="row">
                    <div class="col-md-12">
                       <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                          <div class="form-group">
                             <label class="sr-only" for="exampleInputEmail2">Email address</label>
                             <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                          </div>
                          <div class="form-group">
                             <label class="sr-only" for="exampleInputPassword2">Password</label>
                             <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                          </div>
                          <div class="checkbox">
                             <label>
                                <input type="checkbox"> Remember me
                             </label>
                          </div>
                          <div class="form-group">
                             <button type="submit" class="btn btn-success btn-block">Sign in</button>
                          </div>
                       </form>
                    </div>
                 </div>
              </li>
              <li class="divider"></li>
              <li>
                 <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                 <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
              </li>
           </ul>
        </li>
     </ul>

    -->


    <!--

    <div id="playground-container" style="overflow: hidden">

            <div class="container">
                <div class="row" itemscope="http://schema.org/Code" >
                    <div class="col-lg-12" itemprop="programmingLanguage" content="html/css/js">
                        <div id="editor-html" class="playground-editor" itemprop="sampleType">
                            <div class="container">
                                <div class="row">
                                   <div class="col-md-12">
                                      <nav class="navbar navbar-default" role="navigation">

                                         <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            </button>
                                            <a class="navbar-brand" href="http://www.jquery2dotnet.com">Brand</a>
                                         </div>

                                         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav">
                                               <li class="active"><a href="http://www.jquery2dotnet.com">Home</a></li>
                                               <li><a href="http://www.jquery2dotnet.com">About Us</a></li>
                                               <li class="dropdown">
                                                  <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                                                  <ul class="dropdown-menu">
                                                     <li><a href="http://www.jquery2dotnet.com">Action</a></li>
                                                     <li><a href="http://www.jquery2dotnet.com">Another action</a></li>
                                                     <li><a href="http://www.jquery2dotnet.com">Something else here</a></li>
                                                     <li class="divider"></li>
                                                     <li><a href="http://www.jquery2dotnet.com">Separated link</a></li>
                                                     <li class="divider"></li>
                                                     <li><a href="http://www.jquery2dotnet.com">One more separated link</a></li>
                                                  </ul>
                                               </li>
                                            </ul>
                                            <form class="navbar-form navbar-left" role="search">
                                               <div class="form-group">
                                                  <input type="text" class="form-control" placeholder="Search">
                                               </div>
                                               <button type="submit" class="btn btn-default">Submit</button>
                                            </form>
                                            <ul class="nav navbar-nav navbar-right">
                                               <li><a href="http://www.jquery2dotnet.com">Sign Up</a></li>
                                               <li class="dropdown">
                                                  <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                                                  <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                                                     <li>
                                                        <div class="row">
                                                           <div class="col-md-12">
                                                              <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                                                 <div class="form-group">
                                                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                                                 </div>
                                                                 <div class="form-group">
                                                                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                                 </div>
                                                                 <div class="checkbox">
                                                                    <label>
                                                                    <input type="checkbox"> Remember me
                                                                    </label>
                                                                 </div>
                                                                 <div class="form-group">
                                                                    <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                                                 </div>
                                                              </form>
                                                           </div>
                                                        </div>
                                                     </li>
                                                     <li class="divider"></li>
                                                     <li>
                                                        <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                                                        <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                                                     </li>
                                                  </ul>
                                               </li>
                                            </ul>
                                         </div>
                                      </nav>
                                   </div>
                                </div>
    </div>
      </div>
      </div>  </div>  </div>  </div>

    -->

