<?php

// ___________ exibir ou não os erros do sistema
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

function __autoload($className){
  $url = "engine/$className.class.php";
  require_once $url;
}
// variaveis globais
$config = new Config();
$dbl = new DBLocal();
$dado = new Dado();

try {
	$db = new PDO("mysql:host={$config->db_host};dbname={$config->db_name}", $config->db_user, $config->db_password);
	
} catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "\n";
}


$user = new User();

$help = 
	"___ HELP ___\n"."\n".
	
	$config->help()."\n".
	$dbl->help()."\n".
	$user->help()."\n".
	
	"_____________"
;
function termVars(){
	global $config;
}
//array com asas variaveis que poderam ser acesadas pelo terminal
//por enquanto sem restrição de usuario
$vars = array("config","user","dado","db");
$term = New Terminal($vars);
