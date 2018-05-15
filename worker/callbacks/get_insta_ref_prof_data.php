<?php

    require_once '../class/Worker.php';
    require_once '../class/Robot.php';
    require_once '../class/system_config.php';

    $GLOBALS['sistem_config'] = new follows\cls\system_config();
    $Robot = new follows\cls\Robot(); 
    $profile_name = urldecode($_POST['profile_name']);
    if(isset($_POST['ref_prof_id']))
        $ref_prof_id = urldecode($_POST['ref_prof_id']);
    else
        $ref_prof_id = NULL;
    $result = $Robot->get_insta_ref_prof_data($profile_name, $ref_prof_id);
    echo json_encode($result);
    
 ?>
