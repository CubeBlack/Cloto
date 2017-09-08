<?php
/**
 *
 */
class Act
{

  function __construct()
  {
    # code...
  }
  static function inserir(){
    MySQL::insert();
  }
  static function pesquisar($parametros=""){
    return MySQL::select()->fetchAll();
  }
}
