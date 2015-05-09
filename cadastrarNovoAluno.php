<?php
require_once("./conf/BD.php");
include_once("./modelos/cabecalhoCadastro.html");
?>
	
	<div class="container">

<?php
try
{
	
		//instancia objeto PDO, conectando-se ao mysql
		$conexao = conn_mysql();
		
		//captura valores do vetor POST
		$nome = utf8_encode(htmlspecialchars($_POST['nomeCompleto']));
        $login = utf8_encode(htmlspecialchars($_POST['login']));
		$senha = utf8_encode(htmlspecialchars($_POST['senha']));
        $email = utf8_encode(htmlspecialchars($_POST['email']));
        $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));
        $desc = utf8_encode(htmlspecialchars($_POST['desc']));
    
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
                                 
            // cria instrução SQL parametrizada
		$SQLInsert = 'INSERT INTO participantes (nomeCompleto, login, senha, email, cidade, descricao, arquivofoto)
			  		  VALUES (?,?,MD5(?),?,?,?,?)';
					  
		//prepara a execução
		$operacao = $conexao->prepare($SQLInsert);					  
		
		//executa a sentença SQL com os parâmetros passados por um vetor
		$inserir = $operacao->execute(array($nome, $login, $senha, $email, $cidade, $desc, $pathCompleto));
		
		// fecha a conexão ao banco
		$conexao = null;
		
		//verifica se o retorno da execução foi verdadeiro ou falso,
		//imprimindo mensagens ao cliente
		if ($inserir){
			 echo "<h1>Cadastro efetuado com sucesso.</h1>\n";
			 echo "<p class=\"lead\"><a href=\"./index.html\">Efetuar o login</a></p>\n";
		}
		else {
			echo "<h1>Erro na operação.</h1>\n";
				$arr = utf8_decode($operacao->errorInfo());		//mensagem de erro retornada pelo SGBD
				echo "<p>$arr[2]</p>";							//deve ser melhor tratado em um caso real
			    echo "<p><a href=\"./cadastrarAluno.php\">Voltar</a></p>\n";
		}
          }
        else
          {
            echo "<h1>Arquivo inválido<h1>";
             echo "<p><a href=\"./cadastrarAluno.php\">Tente novamente.</a></p>\n";
          }

		
}
catch (PDOException $e)
{
    //caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}

include_once("./modelos/rodape.html");

?>
</div>