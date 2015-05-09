<?php
    session_start();

    require_once("./conf/BD.php");

    if(isset($_POST["login"])){		//existe um login enviado via POST (formulário)
            $login = utf8_encode(htmlspecialchars($_POST["login"]));
            $senha = utf8_encode(htmlspecialchars($_POST["password"]));
			if(isset($_POST["lembrar"]))
				$lembrar = utf8_encode(htmlspecialchars($_POST["lembrar"]));
			else 
			    $lembrar="";
         
      }
      elseif(isset($_COOKIE["loginAutoYearbook"])){ 	//existe um cookie com nome senha --> login automático
            $log = utf8_encode(htmlspecialchars($_COOKIE["loginYearbook"]));
            $senha = utf8_encode(htmlspecialchars($_COOKIE["loginAutoYearbook"]));
		   }
        else{
	  	       header("Location:./erroLogin.php");
               die();
		}         
try{
    
        // instancia objeto PDO, conectando no mysql
		$conexao = conn_mysql();
						
		// instrução SQL
		$SQLSelect = 'SELECT * FROM participantes WHERE login=? AND senha=MD5(?)';
				
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);					  
				
		//executa a sentença SQL com o valor passado por parâmetro
		$pesquisar = $operacao->execute(array($login, $senha));
		
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
        
        // se há zero ou mais de um resultado, login inválido.
		if (count($resultados)!=1){	
			header("Location:./erroLogin.php");
            die();
		}   
		else{ // se há um resultado, login confirmado.
			setcookie("loginYearbook", $log, time()+60*60*24*30); //guarda o login por 30 dias a partir de agora
			if(!empty($lembrar)){
 			    setcookie("loginAutoYearbook", $senha, time()+60*60*24*30); //guarda a senha por 30 dias a partir de agora	
			}
		   $_SESSION['autenticado']=true;
		   $_SESSION['nomeCompleto'] = $resultados[0]['nomeCompleto'];
		   $_SESSION['login'] = $login;
		   header("Location: ./paginaPrincipal.php");
		   die();
		}
} 
	catch (PDOException $e)
	{
		echo "Erro!: " . $e->getMessage() . "<br>";
		die();
	} 
?>
    