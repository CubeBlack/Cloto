<pre>
<?php
header ('Content-type: text/html; charset=UTF-8');
require_once "engine.php";
if (!Config::configured()) goto configure;
?>
--------------------- CLOTO CONFIG --------------------
_______________________________________________________
<form action="ConfigSubmit.php" method="post">
Configuração do banco de dados mysql:

host: <input type="text" name="host" value="">
User: <input type="text" name="user" value="">
PassWord: <input type="password" name="pass" value="">
Data Base: <input type="text" name="dbName" value="">
_______________________________________________________

<input type="submit" name="" value="Salvar">
</form>
<?php
goto fim;
configure:
fim:
?>
_______________________________________________________
<a href="ConfigNew">Nova configuração</a> | <a href="ConfigNew.php">Manual</a>
