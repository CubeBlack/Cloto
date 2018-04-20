<?php
class Dado{
	function novo($dado="", $tag=""){
		global $db;
		if($dado==""){
			return false;
		}
		//$dado=urlencode($dado);
		$sql = "INSERT INTO `ks_dados` (`dado`, `tag`) VALUES ('{$dado}', '{$tag}');";
		$db->query($sql);
		return "Ok";
	}
	function drop($id){
		//DELETE FROM `ks_dados` WHERE `ks_dados`.`id` = 4
		global $db;
		$sql = "DELETE FROM `ks_dados` WHERE `ks_dados`.`id` = $id";
		$db->query($sql);
		return "ok";
		
	}
	function search($criterio="",$tRetorno=""){
		global $db;
		$sql = "SELECT * FROM `ks_dados` ;";
		$retorno = $db->query($sql);
		$retorno = $retorno->fetchAll();
		if($tRetorno==""||$tRetorno=="array"){
			return $retorno;
		}
		if($tRetorno == "json"){
			return json_encode($retorno);
		}
		//return $tRetorno;
		return "Enpty!";
	}
	public function help(){
		return <<<'EOT'
>> class Dado(dado)
.novo([string:dado],[string:tag]="")
.drop([int/string:id])
.search(criterios,tipo de retorno) - tipo de retornon = ''/'aray','json',
EOT;
	}
}