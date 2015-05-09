<?php
include_once("./modelos/cabecalho.html");
require_once("./conf/BD.php");
require_once("./autenticar.php");    

try{
    
        // instancia objeto PDO, conectando no mysql
		$conexao = conn_mysql();
						
		// instrução SQL
        $SQLSelectParticipantes = 'SELECT * FROM participantes AS P INNER JOIN cidades AS C ON C.idCidade = cidade INNER JOIN estados AS E ON E.idEstado = C.idEstado WHERE                                         P.login=?';
		$SQLSelectEstados = 'SELECT * FROM estados ORDER BY sigaEstado';
        $SQLSelectCidades = 'SELECT * FROM cidades ORDER BY nomeCidade';
				
		//prepara a execução da sentença
		$operacaoParticipantes = $conexao->prepare($SQLSelectParticipantes);        
        $operacaoEstados = $conexao->prepare($SQLSelectEstados);	
        $operacaoCidades = $conexao->prepare($SQLSelectCidades);	
				
        //Login sera considerado chave primaria e não poderá ser alterado
        $login = $_SESSION['login'];
        $pesquisarParticipantes = $operacaoParticipantes->execute(array($login));
		$pesquisarEstados = $operacaoEstados->execute();
        $pesquisarCidades = $operacaoCidades->execute();
		
		//captura TODOS os resultados obtidos
        $resultadosParticipantes = $operacaoParticipantes->fetchAll();
		$resultadosEstados = $operacaoEstados->fetchAll();
        $resultadosCidades = $operacaoCidades->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
    
?>

    <div class="container">

        <section class="aluno_mini">
            <h2>Alterar dados de <?php echo utf8_decode($resultadosParticipantes[0]['login'])?> </h2>
                <figure class="mini">
                    <img class="mini"  src="<?php echo utf8_decode($resultadosParticipantes[0]['arquivoFoto'])?>" alt="<?php echo utf8_decode($resultadosParticipantes[0]['nomeCompleto'])?>" title="<?php echo utf8_decode($resultadosParticipantes[0]['nomeCompleto'])?>">                    
                </figure>
                
        </section>
        
      <div class="cadastro">
        
		 <form role="form" method="post" enctype="multipart/form-data" action="./alterar.php" class="form-signin">
			  <div class="form-group">
				<label for="InputNome">Nome Completo:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeCompleto" value="<?php echo utf8_decode($resultadosParticipantes[0]['nomeCompleto'])?>" required autofocus>
			  </div>
			  
             <div class="form-group">
				<label for="InputEmail">Email:</label>
				<input type="email" class="form-control" id="InputEmail" name="email" value="<?php echo utf8_decode($resultadosParticipantes[0]['email'])?>" required>
			  </div>
             <div class="form-group">
				<label for="InputSenha">Senha:</label>
				<input type="password" class="form-control" id="InputSenha" name="senha" value="<?php echo utf8_decode($resultadosParticipantes[0]['senha'])?>" required>
			  </div>
             <div class="form-group">
				<label for="InputEstado">Estado:</label>                 
                 <select name="estado" required >  
                 <?php    
                    foreach($resultadosEstados as $estados) {   
                        if($resultadosParticipantes[0]['idEstado'] == $estados['idEstado'])
			                 echo '<option selected value="'.utf8_decode($estados['idEstado']).'">'. utf8_decode($estados['sigaEstado']).'</option>';
                        else
                            echo '<option value="'.utf8_decode($estados['idEstado']).'">'. utf8_decode($estados['sigaEstado']).'</option>';
				 } ?>
		          </select>
			  </div> 
                <div class="form-group">
                    <label for="InputCidade">Cidade:</label>
      	         <select name="cidade" required >      		        
                     <?php    
                    foreach($resultadosCidades as $cidades) { 
                        if($resultadosParticipantes[0]['cidade'] == $cidades['idCidade'])
			                 echo '<option selected value="'.utf8_decode($cidades['idCidade']).'">'. utf8_decode($cidades['nomeCidade']).'</option>';
                        else
                            echo '<option value="'.utf8_decode($cidades['idCidade']).'">'. utf8_decode($cidades['nomeCidade']).'</option>';
				 } ?>
    	           </select>
                </div>
             <div class="form-group">
				<label for="InputFoto">Foto:</label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="500000" >
				<input type="file" id="fileName" name="fileName" placeholder="Escolha um arquivo">
			  </div>

                <div class="form-group">
				<label for="InputDesc">Descrição:</label>
				<textarea rows="8" cols="50" type="text" class="form-control" id="InputDesc" name="desc" maxlength="500" required><?php echo utf8_decode($resultadosParticipantes[0]['descricao'])?>
                </textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Alterar</button>
             <a class="btn btn-danger" href="excluirAluno.php">Excluir</a>
		 </form>

	 </div>

	  
	  
    </div>

<?php
    }
catch (PDOException $e)
{
    // caso ocorra uma exceção, a exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}
include_once("./modelos/rodape.html");
?>