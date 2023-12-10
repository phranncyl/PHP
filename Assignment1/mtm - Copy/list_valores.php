<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_valores = "SELECT * FROM valores WHERE id_valor = '$id'";
$resultado_valores = mysqli_query($conn, $result_valores);
$row_valores = mysqli_fetch_assoc($resultado_valores);
$hash="";
?>
<!DOCTYPE html>
<html lang="en">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.html" ?>
  <?php include "./menu.php" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
	  <h3><i class="fa fa-angle-right"></i> Valores</h3>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		   <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
		  
            <div class="content-panel">
				<div class="row">
					<div class="col-md-12">
						<a href='cadastrar_valores.php'><button type="button" class="btn btn-round btn-success"> Novo </button></a> 
					</div>
				</div>
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Bairro Origem</th>
                    <th><i class="fa fa-bookmark"></i> Bairro Destino</th>
                    <th><i class=" fa fa-edit"></i> Valor</th>
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
						$result_valores = "SELECT v.id_valor, b1.cidade as cidade_saida,  b1.nome as bairro_saida, b2.cidade as cidade_chegada, b2.nome as bairro_destino, v.valor FROM valores v 
											inner join bairros b1 on b1.id_bairro = v.id_bairro_saida 
											inner join bairros b2 on b2.id_bairro = v.id_bairro_chegada LIMIT $inicio, $qnt_result_pg";
						$resultado_valores = mysqli_query($conn, $result_valores);
						while($row_valores = mysqli_fetch_assoc($resultado_valores)){
						echo " <tr>";
						echo "<td>" . $row_valores['id_valor'] . "</td>";
						echo "<td>" . $row_valores['cidade_saida'] ." - ". $row_valores['bairro_saida'] . "</td>";
						echo "<td>" . $row_valores['cidade_chegada'] ." - ". $row_valores['bairro_destino'] . "</td>";
						echo "<td>" . $row_valores['valor'] . "</td>";
						
                      echo "<td><button class='btn btn-primary btn-xs'><a href='edit_valores.php?id=" . $row_valores['id_valor'] . "' style='color:white;'><i class='fa fa-pencil'></i></a></button>";
                      echo "<button class='btn btn-danger btn-xs'><a href='proc_apagar_valores.php?id_valor=" . $row_valores['id_valor'] . "' style='color:white;'><i class='fa fa-trash-o'></a></i></button>
                   
					</td>
					 </tr>
					 
";
						}
			
			//Paginção - Somar a quantidade de usuários
			$result_pg = "SELECT COUNT(v.id_valor) AS num_result FROM valores v 
											inner join bairros b1 on b1.id_bairro = v.id_bairro_saida 
											inner join bairros b2 on b2.id_bairro = v.id_bairro_chegada";
			$resultado_pg = mysqli_query($conn, $result_pg);
			$row_pg = mysqli_fetch_assoc($resultado_pg);
			//echo $row_pg['num_result'];
			//Quantidade de pagina 
			$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
			
			echo "	</tbody>		</table>";
			//Limitar os link antes depois
			$max_links = 2;
			echo "<a href='list_valores.php?pagina=1'>Primeira</a> ";
			
			for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
				if($pag_ant >= 1){
					echo "<a href='list_valores.php?pagina=$pag_ant'>$pag_ant</a> ";
				}
			}
				
			echo "$pagina ";
			
			for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
				if($pag_dep <= $quantidade_pg){
					echo "<a href='list_valores.php?pagina=$pag_dep'>$pag_dep</a> ";
				}
			}
			
			echo "<a href='list_valores.php?pagina=$quantidade_pg'>Ultima</a>";
			
		?>	
	
		</div>
		</div>
       </div>
        
       </section>  
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
