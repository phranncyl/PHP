<?php
session_start();
include_once("conexao.php");
$id_valor = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_valores = "SELECT distinct v.id_valor, b1.cidade as cidade_saida,  b1.id_bairro as id_bairro_saida, b1.nome as bairro_saida, b2.id_bairro as id_bairro_chegada, b2.cidade as cidade_chegada, b2.nome as bairro_destino, v.valor FROM valores v 
inner join bairros b1 on b1.id_bairro = v.id_bairro_saida 
inner join bairros b2 on b2.id_bairro = v.id_bairro_chegada WHERE id_valor = '$id_valor'";

$resultado_valores = mysqli_query($conn, $result_valores);
$row_valores = mysqli_fetch_assoc($resultado_valores);
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
        <h3><i class="fa fa-angle-right"></i> Editar Valores</h3>
        <div class="row mt">
          <div class="col-lg-12">
            

            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="editValor"  method="POST" action="proc_edit_valores.php"  >
				
                  <div class="form-group ">
                      <input class=" form-control" id="id_valor" name="id_valor" type="hidden" value="<?php echo $row_valores['id_valor']; ?>"/>
                  </div>
              
                  <div class="form-group ">
                    <label for="bairro_saida" class="control-label col-lg-2">Bairro Saida: </label>
                    <div class="col-lg-6">
					<select name="bairro_saida"  aria-label="bairro_saida">
					<?php
					//echo $result_valores;
					$result_valores1 = "SELECT * FROM bairros";
						$resultado_valores1 = mysqli_query($conn, $result_valores1);
						//echo $result_valores1;
						echo '<option id ="'.$row_valores['id_bairro_saida'].'" value="'.$row_valores['id_bairro_saida'].'" selected="'.$row_valores['cidade_saida'].' - '.$row_valores['bairro_saida'].'" >'.$row_valores['cidade_saida'].' - '.$row_valores['bairro_saida'].'</option>';
						while($row_valores1 = mysqli_fetch_array($resultado_valores1)){
						echo "<option id =". $row_valores1['id_bairro']." value=". $row_valores1['id_bairro']. ">". $row_valores1['cidade'] ." - ". $row_valores1['nome'] . "</option>";
						
						}
						//var_dump($resultado_valores1);
						?>
					</select>
				 </div>
                 </div>
				  
				 <div class="form-group ">
                    <label for="bairro_chegada" class="control-label col-lg-2">Bairro Chegada: </label>
                    <div class="col-lg-6">
					<select name="bairro_chegada" aria-label="bairro_chegada">
					<?php
					$result_valores2 = "SELECT * FROM bairros";
						$resultado_valores2 = mysqli_query($conn, $result_valores2);
						echo '<option id ="'.$row_valores['id_bairro_chegada'].'" value="'.$row_valores['id_bairro_chegada'].'" selected="'.$row_valores['cidade_chegada'].' - '.$row_valores['bairro_destino'].'" >'.$row_valores['cidade_chegada'].' - '.$row_valores['bairro_destino'].'</option>';
						while($row_valores2 = mysqli_fetch_array($resultado_valores2)){
						echo "<option id =". $row_valores2['id_bairro']." value=". $row_valores2['id_bairro']. ">". $row_valores2['cidade'] ." - ". $row_valores2['nome'] . "</option>";
						}
						//var_dump($resultado_valores1);
					?>
					</select>
				 </div>
                 </div>
                  <div class="form-group ">
                    <label for="valor" class="control-label col-lg-2">Valor</label>
                    <div class="col-lg-3">
                      <input class="form-control " id="valor" name="valor" type="text" value="<?php echo $row_valores['valor']; ?>"/>
                    </div>
                  </div>
				
				  <div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
					  <button class="btn btn-theme" type="submit">Salvar</button>
					  <a href = "list_valores	.php"><button class="btn btn-theme04" type="button">Cancelar</button></a>
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
