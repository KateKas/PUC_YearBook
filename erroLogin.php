<?php
setcookie("loginYearbook", '', time()-42000); 
setcookie("loginAutoYearbook", '', time()-42000); 

include_once("/modelos/cabecalhoLogin.html");

?>
</br>
    <div class="container">

      <div class="alert alert-warning">
        <h4>Não foi possível realizar o login.</h4>
          <p><a href="index.html">Tente novamente.</a></p>
    </div>

<?php
include_once("/modelos/rodape.html");
?>