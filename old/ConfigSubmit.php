<pre>
--------------------- CLOTO CONFIG --------------------
_______________________________________________________
<?php
header ('Content-type: text/html; charset=UTF-8');
require_once "engine.php";
$configFilePahth = "engine/config.ini";
unlink($configFilePahth);
//------------------------------ configurações anteriores
if(file_exists ($configFilePahth)){
  ?>
Ja existe um arquivo de configuração.
Para reconfigurar entre no diretorio e apague o arquivo.
(engine/config.ini)
  <?php
   goto fim;
 }
//----------------------------- Formulario
if(
    !isset($_REQUEST["host"])   ||
    !isset($_REQUEST["user"])   ||
    !isset($_REQUEST["pass"])   ||
    !isset($_REQUEST["dbName"]) ||
    false
  ) {
  echo "\nDados insuficientes para configurar";
  goto fim;
}
var_dump($_REQUEST);
$host = $_REQUEST["host"];
$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];
$dbname = $_REQUEST["dbName"];

//----------------------------- Conecção
if(!MySQL::conect($host,$user,$pass,$dbname)) {echo "\n"; goto fim; }
?>
** Teste de conecção.
<?php
//----------------------------- Salvar Configuração
$fileContent = "";
$fileContent .= "#---------------- CLOTO Config ----------------------\n";
$fileContent .= "#configurações do db\n";
$fileContent .= "db_host=" . $host . "\n";
$fileContent .= "db_user=" . $user . "\n";
$fileContent .= "db_password=" . $pass . "\n";
$fileContent .= "db_name=" . $dbname . "\n";

$fp = fopen($configFilePahth, "x");
if(!$fp){echo "\nNão foi posivel criar o arquivo\n"; goto fim;}
$escreve = fwrite($fp, $fileContent);
fclose($fp);
?>
** Criado arquivo de configuração.
<?php
//----------------------------- Criar tabelas
$config = new config();
MySQL::tableCreat($host, $user, $pass, $dbname);
?>
** Criadas tabelas
<?php
//----------------------------- Configurações padrão de cloto
?>
** Configurações iniciais
<?php
//----------------------------- Conecção
fim:
?>

_______________________________________________________
<a href="ConfigNew">Nova configuração</a> | <a href="ConfigNew">Manual</a>
