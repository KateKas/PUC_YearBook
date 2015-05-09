<?php
include_once("./modelos/cabecalho.html");
require_once("./conf/BD.php");
require_once("./autenticar.php");  

try
{
	
		//instancia objeto PDO, conectando-se ao mysql
		$conexao = conn_mysql();
				
		//captura valores do vetor POST
		//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco
		$nome = utf8_encode(htmlspecialchars($_POST['nomeCompleto']));
		$senha = utf8_encode(htmlspecialchars($_POST['senha']));
        $email = utf8_encode(htmlspecialchars($_POST['email']));
        $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));
        $desc = utf8_encode(htmlspecialchars($_POST['desc']));
    
        $login = $_SESSION['login'];
		
        $permissoes = array("gif", "jpeg", "jpg", "png", "image/gif", "image/jpeg", "image/jpg", "image/png");  //strings de tipos e extensoes validas
        $temp = explode(".", basename($_FILES["fileName"]["name"]));
        $extensao = end($temp);

        if ((in_array($extensao, $permissoes))
        && (in_array($_FILES["fileName"]["type"], $permissoes))
        && ($_FILES["fileName"]["size"] < $_POST["MAX_FILE_SIZE"]))
          {
          if ($_FILES["fileName"]["error"] > 0)
            {
            echo "<h1>Erro no envio, código: " . $_FILES["fileName"]["error"] . "</h1>";
            }
          else
            {
              $dirUploads = "fotos/";  

              if(!file_exists ( $dirUploads ))
                    mkdir($dirUploads, 0500);  //permissao de leitura e execucao

              $pathCompleto = $dirUploads.basename($_FILES["fileName"]["name"]);
              
            if(!move_uploaded_file($_FILES["fileName"]["tmp_name"], $pathCompleto))
		      echo "<h1>Problemas ao armazenar o arquivo. Tente novamente.<h1>";
           }
            // O Login foi considerado como a chave primaria da tabela
		$SQLUpdate = 'UPDATE participantes SET nomeCompleto=?, senha=md5(?), email=?, cidade=?, descricao=?, arquivoFoto=?  WHERE login=?';
					  
		//prepara a execução
		$operacao = $conexao->prepare($SQLUpdate);					  
		
		//executa a sentença SQL com os parâmetros passados por um vetor
		$atualizacao = $operacao->execute(array($nome, $senha, $email, $cidade, $desc, $pathCompleto, $login));
		
             }
    else
    {
        // O Login foi considerado como a chave primaria da tabela
		$SQLUpdate = 'UPDATE participantes SET nomeCompleto=?, senha=md5(?), email=?, cidade=?, descricao=?  WHERE login=?';
					  
		//prepara a execução
		$operacao = $conexao->prepare($SQLUpdate);					  
		
		//executa a sentença SQL com os parâmetros passados por um vetor
		$atualizacao = $operacao->execute(array($nome, $senha, $email, $cidade, $desc, $login));
		
    }
        
		// fecha a conexão ao banco
		$conexao = null;

		if ($atualizacao){
			 header("Location: ./alterarAluno.php");
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
