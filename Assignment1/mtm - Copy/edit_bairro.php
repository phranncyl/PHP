<?php
session_start();
include_once("conexao.php");
$id_bairro = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_bairro = "SELECT * FROM bairros WHERE id_bairro = '$id_bairro'";
$resultado_bairro = mysqli_query($conn, $result_bairro);
$row_bairro = mysqli_fetch_assoc($resultado_bairro);
$hash="";

?>
<!DOCTYPE html>
<html lang="en">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.php" ?>
  <?php include "./menu.php" ?>


    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Editar Bairro</h3>
        <div class="row mt">
          <div class="col-lg-12">
            

            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm"  method="POST" action="proc_edit_bairro.php"  >
				
                  <div class="form-group ">
                      <input class=" form-control" id="id_bairro" name="id_bairro" type="hidden" value="<?php echo $row_bairro['id_bairro']; ?>"/>
				  </div>
 
				   <div class="form-group ">
                    <label for="cidade" class="control-label col-lg-2">Cidade: </label>
					<select name="cidade" id="cidade" style="margin-left: 15px;">
					<?php echo '<option value="'.$row_bairro['cidade'].'" selected="'.$row_bairro['cidade'].'" >'.$row_bairro['cidade']?></option>
					<option value="Matão" >Matão</option>
					<option value="Araraquara"  >Araraquara</option>
					<option value="Dobrada"  >Dobrada</option>
					<option value="Taquaritinga" >Taquaritinga</option>
					<option value="Monte Alto"  >Monte Alto</option>
					<option value="Motuca"  >Motuca</option>
					<option value="Bueno de Andrada"  >Bueno de Andrada</option>
					<option value="São Lourenço do Turvo"  >São Lourenço do Turvo</option>
					<option value="Santa Ernestina"  >Santa Ernestina</option>
					<br><br>
					</select>
                  </div>
				  
                  <div class="form-group ">
                    <label for="nome" class="control-label col-lg-2">Nome</label>
                    <div class="col-lg-3">
                      <input class="form-control " id="nome" name="nome" type="text" value="<?php echo $row_bairro['nome']; ?>"/>
                    </div>
                  </div>
				  
                  <div class="form-group ">
                    <label for="distancia" class="control-label col-lg-2">Distância da Base</label>
                    <div class="col-lg-2">
                      <input class="form-control " id="distancia" name="distancia" type="text" value="<?php echo $row_bairro['distancia_base']; ?>"/>
                    </div>
                  </div>

				  <div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
					  <button class="btn btn-theme" type="submit">Salvar</button>
					  <a href = "list_bairro.php"><button class="btn btn-theme04" type="button">Cancelar</button></a>
					</div>
				  </div>
				  
				</form>
			</div>
		  </div>
		  
	   </div>
	 </div>
      <!-- /wrapper -->
    </section>
 	  <?php include "./footer.html" ?>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
 
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include "./additional.js" ?>
  <?php include "./javascripts.js" ?>
    <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    }).not($(this)).removeClass("btn");
  });
});
</script>

</body>

</html>
