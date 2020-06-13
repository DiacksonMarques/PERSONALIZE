<?php
 try {
   $con= new PDO('mysql:localhost=host; dbname=personalize',"root","");
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $con->exec('SET CHARACTER SET utf8'); 
 } catch (Exception $erro) {
 	echo "Erro na conexão:" . $erro->getMessage();
 }
?>