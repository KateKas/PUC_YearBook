<?php
require_once("./autenticar.php");
require_once("./conf/BD.php");
include_once("/modelos/cabecalho.html");

$login = $_GET['login'];

try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
    $SQLSelect = 'SELECT * FROM participantes AS P INNER JOIN cidades AS C ON C.idCidade = cidade INNER JOIN estados AS E ON E.idEstado = C.idEstado WHERE P.login=?';
	
    //prepara a execução da sentença
	$operacao = $conexao->prepare($SQLSelect);					  
	
    $pesquisar = $operacao->execute(array($login));
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;            
            
?>
<div class="container">
  <section class="aluno_detalhes">
            <h2><?php echo utf8_decode($resultados[0]['nomeCompleto'])?> </h2> <h5>  <?php echo utf8_decode($resultados[0]['email'])?></h5>
                <figure class="detalhes">
                    <img class="detalhes"  src="<?php echo utf8_decode($resultados[0]['arquivoFoto'])?>" alt="<?php echo utf8_decode($resultados[0]['nomeCompleto'])?>" title="<?php echo utf8_decode($resultados[0]['nomeCompleto'])?>">
                    <figcaption>
                        <?php echo utf8_decode($resultados[0]['nomeCidade'])?> - <?php echo utf8_decode($resultados[0]['nomeEstado'])?>
                    </figcaption>
                </figure>
                <p>
                    <?php echo utf8_decode($resultados[0]['descricao'])?>
                </p>
        </section>

<p><a class="btn btn-default" href="paginaPrincipal.php">Voltar</a></p>
    </div>
<?php
            
            }
	catch (PDOException $e)
	{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
	}
	
    
include_once("/modelos/rodape.html");
?>
     