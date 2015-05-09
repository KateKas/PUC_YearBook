<?php
include_once("./modelos/cabecalhoCadastro.html");
require_once("./conf/BD.php");
    

try{
    
        // instancia objeto PDO, conectando no mysql
		$conexao = conn_mysql();
						
		// instrução SQL
		$SQLSelectEstados = 'SELECT * FROM estados ORDER BY sigaEstado';
        $SQLSelectCidades = 'SELECT * FROM cidades ORDER BY nomeCidade';
				
		//prepara a execução da sentença
		$operacaoEstados = $conexao->prepare($SQLSelectEstados);	
        $operacaoCidades = $conexao->prepare($SQLSelectCidades);	
				
		$pesquisarEstados = $operacaoEstados->execute();
        $pesquisarCidades = $operacaoCidades->execute();
		
		//captura TODOS os resultados obtidos
		$resultadosEstados = $operacaoEstados->fetchAll();
        $resultadosCidades = $operacaoCidades->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
    
?>

    <div class="container">

      <div class="cadastro">
        
        
		 <form role="form" method="post" enctype="multipart/form-data" action="./cadastrarNovoAluno.php" class="form-signin">
			  <div class="form-group">
				<label for="InputNome">Nome Completo:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeCompleto" placeholder="Nome completo" required autofocus>
			  </div>
			  <div class="form-group">
			  <label for="InputLogin">Login:</label>
				<input type="text" class="form-control" id="InputLogin" name="login" placeholder="Login desejado" required>
			  </div>
			  <div class="form-group">
				<label for="InputSenha">Senha:</label>
				<input type="password" class="form-control" id="InputSenha" name="senha" placeholder="Senha" required>
			  </div>
              <div class="form-group">
				<label for="InputEmail">Email:</label>
				<input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email" required>
			  </div>
             <div class="form-group">
				<label for="InputEstado">Estado:</label>                 
                 <select name="estado" required >  
                     <option  value="">Selecione</option>
                 <?php    
                    foreach($resultadosEstados as $estados) { 
			         echo '<option value="'.utf8_decode($estados['idEstado']).'">'. utf8_decode($estados['sigaEstado']).'</option>';
				 } ?>
		          </select>
			  </div> 
                <div class="form-group">
                    <label for="InputCidade">Cidade:</label>
      	         <select name="cidade" required >
      		        <option value="">Selecione</option>
                     <?php    
                    foreach($resultadosCidades as $cidades) { 
			         echo '<option value="'.utf8_decode($cidades['idCidade']).'">'. utf8_decode($cidades['nomeCidade']).'</option>';
				 } ?>
    	           </select>
                </div>
             <div class="form-group">
				<label for="InputFoto">Foto:</label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="500000" >
				<input type="file" id="fileName" name="fileName" required placeholder="Escolha um arquivo">
			  </div>

                <div class="form-group">
				<label for="InputDesc">Descrição:</label>
				<textarea rows="4" cols="50" type="text" class="form-control" id="InputDesc" name="desc" maxlength="500" required></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
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