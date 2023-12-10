<?php
session_start();
include_once("conexao.php");
$id_motorista = filter_input(INPUT_GET, 'id_motorista', FILTER_SANITIZE_NUMBER_INT);
$result_motorista = "SELECT * FROM motoristas WHERE id_motorista = '$id_motorista'";
$resultado_motorista = mysqli_query($conn, $result_motorista);
$row_motorista = mysqli_fetch_assoc($resultado_motorista);
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
        <h3><i class="fa fa-angle-right"></i> Editar Motorista</h3>
        <div class="row mt">
          <div class="col-lg-12">
            

            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm"  method="POST" action="proc_edit_motorista.php"  >
				
                  <div class="form-group ">
                      <input class=" form-control" id="id_motorista" name="id_motorista" type="hidden" value="<?php echo $row_motorista['id_motorista']; ?>"/>
                  </div>
              
                  <div class="form-group ">
                    <label for="nome" class="control-label col-lg-2">Motorista</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="nome" name="nome" type="text" value="<?php echo $row_motorista['nome']; ?>" />
                    </div>
                  </div>
				  
                  <div class="form-group ">
                    <label for="apelido" class="control-label col-lg-2">Apelido</label>
                    <div class="col-lg-3">
                      <input class="form-control " id="apelido" name="apelido" type="text" value="<?php echo $row_motorista['apelido']; ?>"/>
                    </div>
                  </div>
				  
                  <div class="form-group ">
                    <label for="telefone1" class="control-label col-lg-2">Telefone 1</label>
                    <div class="col-lg-2">
                      <input class="form-control " id="telefone1" name="telefone1" type="text" value="<?php echo $row_motorista['telefone1']; ?>"/>
                    </div>
                  </div>
				  
                  <div class="form-group ">
                    <label for="telefone2" class="control-label col-lg-2">Telefone2</label>
                    <div class="col-lg-2">
                      <input class="form-control " id="telefone2" name="telefone2" type="text" value="<?php echo $row_motorista['telefone2']; ?>"/>
                    </div>
				  </div>
				  
				  
                  <div class="form-group ">
                    <label for="data_nasc" class="control-label col-lg-2">Data de Nasc.</label>
                    <div class="col-lg-2">
                      <input class="form-control " id="data_nasc" name="data_nasc" type="date" value="<?php echo $row_motorista['data_nasc']; ?>"/>
                    </div>
				  </div>
				  
				  <div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
					  <button class="btn btn-theme" type="submit">Salvar</button>
					  <a href = "list_motorista.php"><button class="btn btn-theme04" type="button">Cancelar</button></a>
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
