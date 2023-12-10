<?php
session_start();
include_once("conexao.php");
$id_usuario = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
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
	  <h3><i class="fa fa-angle-right"></i> Motoristas</h3>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
				<div class="row">
					<div class="col-md-12">
						<a href='cadastrar_motorista.php'><button type="button" class="btn btn-round btn-success"> Novo </button></a> 
					</div>
				</div>
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nome</th>
                    <th><i class="fa fa-bookmark"></i> Apelido</th>
                    <th><i class=" fa fa-edit"></i> Telefone 1</th>
                    <th><i class=" fa fa-edit"></i> Telefone 2</th>
                    <th><i class=" fa fa-edit"></i> Data de Nasc.</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                 
				  <?php
						//Receber o número da página
						$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
						$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
						
						//Setar a quantidade de itens por pagina
						$qnt_result_pg = 50;
						
						//calcular o inicio visualização
						$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
						$result_motoristas = "SELECT * FROM motoristas LIMIT $inicio, $qnt_result_pg";
						$resultado_motoristas = mysqli_query($conn, $result_motoristas);
						while($row_motorista = mysqli_fetch_assoc($resultado_motoristas)){
						echo " <tr>";
						echo "<td>" . $row_motorista['id_motorista'] . "</td>";
						echo "<td>" . $row_motorista['nome'] . "</td>";
						echo "<td>" . $row_motorista['apelido'] . "</td>";
						echo "<td>" . $row_motorista['telefone1'] . "</td>";
						echo "<td>" . $row_motorista['telefone2'] . "</td>";
						echo "<td>" . $row_motorista['data_nasc'] . "</td>";
						
                      echo "<td><button class='btn btn-primary btn-xs'><a href='edit_motorista.php?id_motorista=" . $row_motorista['id_motorista'] . "' style='color:white;'><i class='fa fa-pencil'></i></a></button>";
                      echo "<button class='btn btn-danger btn-xs'><a href='proc_apagar_motorista.php?id_motorista=" . $row_motorista['id_motorista'] . "' style='color:white;'><i class='fa fa-trash-o'></a></i></button>
                   
					</td>
					 </tr>
					 
";
						}
			
			//Paginção - Somar a quantidade de usuários
			$result_pg = "SELECT COUNT(id_motorista) AS num_result FROM motoristas";
			$resultado_pg = mysqli_query($conn, $result_pg);
			$row_pg = mysqli_fetch_assoc($resultado_pg);
			//echo $row_pg['num_result'];
			//Quantidade de pagina 
			$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
			
			echo "	</tbody>		</table>";
			//Limitar os link antes depois
			$max_links = 2;
			echo "<a href='list_motorista.php?pagina=1'>Primeira</a> ";
			
			for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
				if($pag_ant >= 1){
					echo "<a href='list_motorista.php?pagina=$pag_ant'>$pag_ant</a> ";
				}
			}
				
			echo "$pagina ";
			
			for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
				if($pag_dep <= $quantidade_pg){
					echo "<a href='list_motorista.php?pagina=$pag_dep'>$pag_dep</a> ";
				}
			}
			
			echo "<a href='list_motorista.php?pagina=$quantidade_pg'>Ultima</a>";
			
		?>	
	
		</div>
		</div>
       </div>
         
      <!-- /wrapper -->
    </section>
 	<?php include "./footer.html" ?>
  </section>
  
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include "./additional.js" ?>
  <?php include "./javascripts.js" ?>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="lib/form-component.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  
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
