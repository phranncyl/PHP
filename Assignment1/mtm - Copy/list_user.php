<?php
	ob_start();
	session_start();
	include ("connection.php");
	if (isset($_GET['id_user']) !== "") {
		$id_user = "";
	}

	$Users = new Database();
	if(!empty($_GET['deleteId'])) {
		$deleteId = $_GET['deleteId'];
		$usertodelete = $database->delete_user($deleteId);
		//$id_user = $_POST[''];
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<?php include ("head.html") ?>

<body>
	<section id="container">
		<?php include "./header.php" ?>
		<?php include "./menu.php" ?>

		<!--main content start-->
		<section id="main-content">
			<section class="wrapper site-min-height">
				<h3><i class="fa fa-angle-right"></i> Users</h3>
				<div class="row mt">
					<div class="col-sm-5 col-md-8"></div>
					<div class="col-sm-5 col-md-3">
						<input id="myInput" type="text" class="form-control">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-1"></div>
					<a href='add_user.php'><button type="button" class="btn btn-round btn-success">New</button> </a>

					<div id="myDIV">
						<div class="col-lg-12">

							<?php
						
			//Receber o número da página
			$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
			$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
			
			//Setar a quantidade de itens por pagina
			$qnt_result_pg = 50;
			
			//calcular o inicio visualização
			$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
			echo "<div class='row show-grid mt'>";
			echo "<div class='col-md-1' style= 'color: black;'>ID: </div>";
			echo "<div class='col-md-2' style= 'color: black;'>Username: </div>";
			echo "<div class='col-md-3' style= 'color: black;'>Name: </div>";
			echo "<div class='col-md-3' style= 'color: black;'>Email: </div>";
			

			echo "</div>";
			echo "<hr>";
				$result_users = $database->list_user();
				//var_dump($id_user);
				foreach ($result_users as $row_user) {
				echo "<div class='row show-grid mt'>";
				echo "<div class='col-md-1'> " . $row_user['id_user'] . "</div>";
				echo "<div class='col-md-2'> " . $row_user['username'] . "</div>";
				echo "<div class='col-md-3'> " . $row_user['name'] . "</div>";
				echo "<div class='col-md-3'> " . $row_user['email'] . "</div>";
				echo "<div class='col-md-1'><a href='edit_user.php?id_user=" . $row_user['id_user'] . "' style = 'color:white'> <button type='button' class='btn btn-info'>Edit</a> </div>";
				echo "<div class='col-md-1'><a href='list_user.php?deleteId=".$row_user['id_user'] ."' style = 'color:white'> <button type='button' class='btn btn-danger'  onclick='return confirm(\"Are you sure?\"); return false;'>  Delete</a> </div>";
				
			echo "</div>";	
			}			
			
			$pages= $Users->list_user_pages();
			//Paginção - Somar a quantidade de usuários
			$row_pg = mysqli_fetch_assoc($pages);
			//echo $row_pg['num_result'];
			//Quantidade de pagina 
			$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
			
			//Limitar os link antes depois
			$max_links = 2;
			echo "<a href='list_user.php?pagina=1'>First</a> ";
			
			for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
				if($pag_ant >= 1){
					echo "<a href='list_user.php?pagina=$pag_ant'>$pag_ant</a> ";
				}
			}
				
			echo "$pagina ";
			
			for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
				if($pag_dep <= $quantidade_pg){
					echo "<a href='list_user.php?pagina=$pag_dep'>$pag_dep</a> ";
				}
			}
			
			echo "<a href='list_user.php?pagina=$quantidade_pg'>Last</a>";
			
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

	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
	<script src="lib/jquery.scrollTo.min.js"></script>
	<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include "./additional.js" ?>
  <?php include "./javascripts.js" ?>
  
</body>

</html>