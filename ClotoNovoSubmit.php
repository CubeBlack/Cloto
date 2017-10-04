<?php
require "header.php";
$query = [
  "header"=>[
    "time"=>["request"=>Time()],
    "type"=>"add"
  ],
  "body"=>[

  ]
];
var_dump($_REQUEST);
$resposta = json_decode(file_get_contents($url."?query=".urlencode(json_encode($query))));
var_dump($resposta);
///------------------
include "ClotoMenu.php";
