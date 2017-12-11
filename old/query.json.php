<?php
header('Content-Type: application/json; charset=utf-8');
//header('Content-type: text/html; charset=utf-8');
require_once "engine.php";
$resposta = Query::nulo();
$queryStr="";
if (!isset($_REQUEST["query"])) {
  $resposta["header"]["type"] = "erro";
  $resposta["body"] = ["Não foi posivel reconhecer '\$_REQUEST[query]'"];
  goto fim;
}
$queryStr = $_REQUEST["query"];
//-----------------------
$queryObj = (array)json_decode($queryStr);
$chamada = new Query();
$chamada->query = $queryObj;
$chamada->exec();
$resposta = $chamada->resposta;
fim:
echo json_encode($resposta);
