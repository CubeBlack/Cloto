<?php
function __autoload($className){
  $url = "engine/$className.class.php";
  require_once $url;
}
$config = new Config();
