<?php
require_once("./autenticar.php");
require_once("./conf/BD.php");
include_once("./modelos/cabecalho.html");

?>

<div>

     <div class="container">
            <h2>Alunos</h2>


		 <form role="form" method="post" action="./paginaPrincipal.php">

               <div class="row">
            <div class="col-lg-4">
				<input type="text" class="form-control" id="filtro" name="filtro" value ="" placeholder="Pesquisar por nome" autofocus>
			  </div>

            <div class="col-lg-4">
			  <button type="submit" class="btn btn-default">Pesquisar</button>
                </div>
		 </form>

	 </div>


<?php
try{

	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
    $filtro = "";

    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
    $filtro = utf8_encode(htmlspecialchars($_POST['filtro']));

    $SQLSelect = 'SELECT * FROM participantes ';

    if(strlen($filtro)>0){
        $filtro = '%'.$filtro.'%';
		$SQLSelect = $SQLSelect.'WHERE nomeCompleto like ? ORDER BY nomeCompleto';	//anexa a restrição à sentença SQL
    }
    else
    {
        $SQLSelect = $SQLSelect.'ORDER BY nomeCompleto';
    }

    //prepara a execução da sentença
	$operacao = $conexao->prepare($SQLSelect);

    $pesquisar = $operacao->execute(array($filtro));
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();

		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;

		// se há resultados, os escreve em uma tabela
		if (count($resultados)>0){

         echo ' <ul>';
               foreach($resultados as $participantes){

               echo '<li>';
                    echo '<div class="alunos">';
                        echo '<a href="detalhes.php?login='.utf8_decode($participantes['login']).'">';
                            echo '<h4>'.utf8_decode($participantes['nomeCompleto']).'</h4>';
                            echo '<figure class="detalhes">';
                              echo '<img class="mini" src="'.utf8_decode($participantes['arquivoFoto']).'" alt="'.utf8_decode($participantes['nomeCompleto']).'" title="'.utf8_decode($participantes['nomeCompleto']).'">';
                               echo ' <figcaption>'.utf8_decode($participantes['email']);
                                echo '</figcaption>
                            </figure>
                        </a>
                    </div>
                </li> ';
                }
            echo '</ul>
        </div>';
		}
		else{
			echo'<div class="starter-template">';
			echo"\n<h3 class=\sub-header\>Nenhum aluno encontrado.</h3>";
			echo'</div>';
		}

	}
	catch (PDOException $e)
	{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
	}

?>

    </div>

<?  php
include_once("./modelos/rodape.html");
?>
