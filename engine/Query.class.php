<?php
/**
 *
 */

class Query
{
  public $query;
  public $resposta;
  public $erro;

  function __construct()
  {
    $this->query = Query::nulo();
    $this->erro=array(
      "header"=>array(
        "num"=>0
      ),
      "body"=>array(
        #colocar
      )
    );
  }

  public function exec()
  {
    global $config;
      $this->resposta = array(
      "header"=>array(
        "type"=>"null"
      ),
      "body"=>array()
    );
    $this->resposta["body"] = MySQL::select($config->nomeTData(),"");
    $this->resposta["header"]["time"] = (array)$this->query["header"]->time;
    $this->resposta["header"]["time"]["cloto/query/exec"] = time();
    return;

    $f = "exec";
    //
    if(!is_array($this->query)) {
      return Query::nulo();
      $this->erro($f,"A query não é uma array"); return;
    }
    if(!Query::hasHeader($this->query)) {
      return Query::nulo();
      Query::erro($f,"Header não encontrado, reveja a estrutura do query",$this->query);
      return;
    }
    $this->hasType();
    return true;
  }

  public function hasHeader(){
    if(isset($this->query["header"]))
      return true;
  }
  public function hastype(){
    /*
    switch ($this->query["header"]["type"]) {
      case 'act': $this->hasAct();
    }
    */
  }
  public function hasAct(){
    switch ($this->query["header"]["act"]) {
      case"insert": $this->save();
      case "search": $this->search();
    }
  }
  public function erro($funtion,$descricao,$value=null){
    $erro=array(
      "function"=>$funtion,
      "descricao"=>$descricao
    );
    $this->erro["body"][$this->erro["header"]["num"]] = $erro;
    $this->erro["header"]["num"]++;
    if (Config::showerror) {
      echo "<p>Coloto/Query::$funtion - $descricao</p>";
      if (isset($value))
        var_dump($value);
    }
  }
  static function nulo(){
    $retorno = array(
      "header"=>array(
        "type"=>"null"
      ),
      "body"=>array()
    );
    return $retorno;
  }
  public function save(){
    $key = array(
    );
    $content = array();
    $values[0] = json_decode($key);
    $values[1] = json_decode($content);
    MySQL::insert(null,$values);
  }
  public function search(){
    $this->resposta = MySQL::select();
  }
}
