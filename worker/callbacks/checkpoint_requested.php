<?php

    require_once '../class/Worker.php';
    require_once '../class/Robot.php';
    require_once '../class/system_config.php';

    $GLOBALS['sistem_config'] = new follows\cls\system_config();
    $Robot = new follows\cls\Robot();
    $client_login = urldecode($_POST['client_login']);
    $client_pass = urldecode($_POST['client_pass']);
        
    $result = $Robot->checkpoint_requested($client_login, $client_pass);
    echo json_encode($result);
    
 ?>
