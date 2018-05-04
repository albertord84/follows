<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../class/DB.php';
require_once '../class/Worker.php';
require_once '../class/Robot.php';
require_once '../class/system_config.php';
require_once '../class/user_role.php';
require_once '../class/user_status.php';
require_once '../class/Gmail.php';

$login = filter_input(INPUT_GET, 'login');
$pass = filter_input(INPUT_GET, 'pass');

$Robot = new dumbu\cls\Robot();
$json_response = $Robot->make_login($login, $pass);


/* Output header */
 header('Content-type: application/json');
 echo json_encode($json_response);

