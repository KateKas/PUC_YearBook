<?php
include_once("./modelos/cabecalho.html");
require_once("./conf/BD.php");
require_once("./autenticar.php");    

try{
    $conexao = conn_mysql();
		
		$login = $_SESSION['login'];
		
		// cria instrução SQL parametrizada
		$SQLDelete = 'DELETE FROM participantes WHERE login=?';
					  
		//prepara a execução
		$operacao = $conexao->prepare($SQLDelete);					  
		
		//executa a sentença SQL com os parâmetros passados por um vetor
		$excluir = $operacao->execute(array($login));
		
		// fecha a conexão ao banco
		$conexao = null;
		
		//verifica se o retorno da execução foi verdadeiro ou falso,
		//imprimindo mensagens ao cliente
		if ($excluir){
			 $_SESSION = array();  //Limpa o vetor de sessão

            // Se queremos terminar a própria sessão, precisamos matar o cookie com o session_ID
            if (ini_get("session.use_cookies")) {					//verifica se a sessão usa cookies
                $params = session_get_cookie_params();				//carrega todos os parâmetros do cookie da sessão
                setcookie(session_name(), '', time() - 42000,		//configura um cookie exatamente igual para 42000seg (700h) atrás
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );


                setcookie("loginYearbook", '', time()-42000); 
                setcookie("loginAutoYearbook", '', time()-42000); 

        }
            session_destroy();		// Destruímos a sessão em si
            header("Location: ./index.html");
		}
		else {
			echo "<h1>Erro na operação.</h1>\n";
				$arr = utf8_decode($operacao->errorInfo());		//mensagem de erro retornada pelo SGBD
				echo "<p>$arr[2]</p>";							//deve ser melhor tratado em um caso real
			    echo "<p><a href=\"./paginaPrincipal.php\">Voltar</a></p>\n";
		}
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}

?>