<?php
 function conn_mysql(){

   $servidor = 'br-cdbr-azure-south-a.cloudapp.net';
   $porta = 3306;
   $banco = "pucyearbookdb";
   $usuario = "bbb6f752ae92eb";
   $senha = "81ea0a91";

      $conn = new PDO("mysql:host=$servidor;
	                   port=$porta;
					   dbname=$banco",
					   $usuario,
					   $senha,
					   array(PDO::ATTR_PERSISTENT => true)
					   );
      return $conn;
   }
?>
