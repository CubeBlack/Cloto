<?php
require_once "../engine.php";
$queryArr = array(
  "header"=>array(
    "type"=>"act",
    "act"=>"insert"
  ),
  "body"=>array(
    "type"=>"objet",
    "name"=>"string",
    "content"=>array(
      "label"=>"text",
      "text"=>"text"
    )
  )
);
$query = new Query();
$query->query = $queryArr;
$resposta = $query->exec();
var_dump($resposta);
