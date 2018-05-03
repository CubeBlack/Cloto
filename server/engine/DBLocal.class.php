<?php
/**
 *
 */
 //
class DBLocal
{
	public $data;
  function __construct()
  {
    global $config;
    if(!isset($_SESSION))
      session_start();

	if(!isset($_SESSION["cloto"]))
		$this->clear();
	
	$this->data = $_SESSION["cloto"];
  }
	public function set($index,$valor){
		$_SESSION["cloto"][$index] = $valor;
		return "ok";
	}
	public function get($index=""){
		if($index == ""){
			return $_SESSION["cloto"];
		}
		if(isset($_SESSION["cloto"][$index]))
			return $_SESSION["cloto"][$index];
		return false;
	}
  public function clear(){
	$_SESSION["cloto"] = array();
	return "ok";
  }
	//---------- help ---------------//
	public function help(){
		return <<<'EOT'
>> DBLocal(dbl)
.data	- dados salvos no banco de dados
.set([index],[valor]) - Adiciona ou atualiza iinformações no banco de dados
.help()
.get() - Retorna todo banco de dados
.get([index]) - Retorna dado especifico do banco de dados
.clear() - Apaga is dados salvos

EOT;
	}
}
