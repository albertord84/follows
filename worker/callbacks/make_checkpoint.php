<?php

    require_once '../class/Worker.php';
    require_once '../class/Robot.php';
    require_once '../class/system_config.php';

    $GLOBALS['sistem_config'] = new follows\cls\system_config();
    $Robot = new follows\cls\Robot();
    $user_login = urldecode($_POST['user_login']);
    $security_code = urldecode($_POST['security_code']);
        
    $result = $Robot->make_checkpoint($user_login, $security_code);
//    $result = $Robot->make_checkpoint('riveauxmerino', 974215);
    echo json_encode($result);
    
 ?>
