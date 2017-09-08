<?php
/**
 *
 */
class Config
{
  public
    $showerror = false,
    // mysql
    $db_host,
    $db_user,
    $db_password,
    $db_name,
    $db_prefix = "cloto_"
  ;
  function __construct(){
    #falta verificar se o arquivo existe
    $fileContent =  file_get_contents(realpath(dirname(__FILE__))."/config.ini");
    $fileLines = explode("\n",$fileContent);
    foreach ($fileLines as $key => $line) {
      if(strlen($line) == 0) continue;
      if($line[0] == "#") continue;
      //
      $parte = explode("=",$line);
      switch ($parte[0]) {
        case "showerror":
          $this->showerror = $parte[1];
          break;
        // set database configs
        case "db_host":
          $this->db_host = $parte[1];
          break;
        case "db_user":
            $this->db_user = $parte[1];
            break;
        case "db_password":
            $this->db_password = $parte[1];
            break;
        case "db_name":
            $this->db_name = $parte[1];
            break;
      }
    }
  }
  static function save(){}
  static function configured(){
    return true;
  }
  public function nomeTData(){
    return $this->db_prefix . MySQL::nTableData;
  }
}
