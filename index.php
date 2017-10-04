<?php
require "header.php";
include "ClotoNovo.php";
?>
----------------------------
<?php
$query = [
  "header"=>[
    "time"=>["request"=>Time()],
    "type"=>"search"
  ]
];

$dados  = json_decode(file_get_contents( $url . "?query=" .urlencode(json_encode($query))));
var_dump($dados);

//-------------------------------------------
include "ClotoMenu.php";
