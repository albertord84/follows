<?php

    //ps4633.publiccloud.com.br/follows/worker/callbakcks/checkpoint_requested_test.php

    require_once '../class/Worker.php';
    require_once '../class/Robot.php';
    require_once '../class/system_config.php';

    $GLOBALS['sistem_config'] = new follows\cls\system_config();
    $Robot = new follows\cls\Robot();
//    $client_login = urldecode($_GET['client_login']);
//    $client_pass = urldecode($_GET['client_pass']);
    
    $client_login = 'marcosp.medina';
    $client_pass = 'Marcos*01+123';
        
    $result = $Robot->checkpoint_requested($client_login, $client_pass);
    echo json_encode($result);
    
 ?>
