<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config.php';
$hub_verify_token = null;

if(isset($_REQUEST["hub_challenge"])) {
 $challenge = $_REQUEST["hub_challenge"];
 $hub_verify_token = $_REQUEST["hub_verify_token"];
 //$hub_verify_modo = $_REQUEST["hub_verify_modo"];
}
Else{
    echo "Sem _REQUEST";
}

if ($facebookVerifyToken === $hub_verify_token) {
 echo $challenge;
}