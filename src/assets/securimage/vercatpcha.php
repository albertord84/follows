<?php
include("config.php");
if(isset($_GET["ca"])){
    $captcha=$_GET["ca"];
    require_once('securimage_folder/securimage.php');
    $securimage = new Securimage();
    if ($securimage->check($captcha) == false) {
        echo "Codigo de segurança errado";        
    }
    else{
        echo "Codigo de segurança correto";
    }
}
?>