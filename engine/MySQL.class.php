<?php
 /**
  *
  */
global $config;
 class MySQL
 {
   const
    nTableData = "data",
    nTableuser = "user"
  ;
   static function conect(){
     global $config;
      try {
        $conn = new PDO("mysql:host={$config->db_host};dbname={$config->db_name}", $config->db_user, $config->db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch(PDOException $e) {
        if ($config->showerror)
          echo
            'ERROR: ' .
            $e->getMessage() . "\n" .
            "host: " . $dbHost .
            ", dbName: " . $dbName .
            ", dbUsername: " . $dbUsername
          ;
        return;
      }
      return $conn;
   }
   static function tableCreat($dbHost , $dbUsername="empty",$dbPassword,$dbName){

     global $config;
     $tableName = $config->db_prefix . MySQL::nTableData;
     $query = "DROP TABLE IF EXISTS {$tableName};";
     //MySQL::query("DROP TABLE {$tableName};");
     MySQL::query($query);
     $query ="
     CREATE TABLE IF NOT EXISTS {$tableName} (
       `id` int(8) NOT NULL AUTO_INCREMENT,
       `data` varchar(500) NOT NULL,
       PRIMARY KEY (`id`)
     ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
     ";
    return MySQL::query($query);

   }
   static function tableConfig(){
     return false;
   }
   static function query($query){
     $conn = Mysql::conect();
     return $conn->query($query);
   }
   static function select($table,$parametro)
   {

     $resposta = MySQL::query("SELECT * FROM $table $parametro");
    return $resposta->fetchAll();
   }
   static function insert($table,$valoresArr){
     if(!is_array($valoresArr)) return;
     foreach ($valoresArr as $key => $valor) {
       $valores += "'$valor',";
     }
     echo $valores;
     MySQL::Query("INSERT INTO  $table VALUES ");
   }

 }
