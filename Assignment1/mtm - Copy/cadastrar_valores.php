<?php
session_start();
ob_start();
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.html" ?>
  <?php include "./menu.php" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
	          <h3><i class="fa fa-angle-right"></i> Cadastrar Novo valores</h3>
        <div class="row mt">
          <div class="col-lg-12">
			<div class="content-panel">
				
				<?php
				//Receber os dados do formulário
				$dados_mot = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;

				//Verificar se o usuário clicou no botão
				if (!empty($dados_mot['Cadvalores'])) {
					//var_dump($dados_mot);

					$empty_input = false;

					var_dump($empty_input);
					if (!$empty_input) {
						$query_valores = "INSERT INTO valores (id_bairro_saida, id_bairro_chegada, valor) VALUES ('" .$dados_mot['bairro_saida']. "', '" .$dados_mot['bairro_chegada']. "', '" .$dados_mot['valor']. "') ";
						$cad_valores = $conn->prepare($query_valores);
						var_dump($query_valores);
						var_dump($cad_valores);
			
						$cad_valores->execute();
						if ($cad_valores->num_rows()) {
							echo "<p style='color: #f00;'>Erro: registro não cadastrado com sucesso!</p>";
						} else {
							unset($dados_mot);
							echo "<p style='color: green;'>Registro cadastrado com sucesso!</p>";
							header("Location: list_valores.php");							
						}
					}
				}
				?>
				<form name="cad-valores" method="POST" action="">
					<label>Bairro Saida: </label>
					<select name="bairro_saida">
					<option value="0">-- Selecione --</option>
					
					<?php
					$result_valores1 = "SELECT distinct id_bairro, cidade, nome from bairros";
						$resultado_valores1 = mysqli_query($conn, $result_valores1);
						while($row_valores1 = mysqli_fetch_array($resultado_valores1)){
						echo "<option id = ". $row_valores1['id_bairro']. " value=". $row_valores1['id_bairro']. ">". $row_valores1['cidade'] ." - ". $row_valores1['nome'] . "</option>";
						}
						//var_dump($resultado_valores1);
						?>
					</select>
					<br><br>
					
					<label>Bairro Chegada: </label>
					<select name="bairro_chegada">
					<option value="0">-- Selecione --</option>
					<?php
					$result_valores2 = "SELECT distinct id_bairro, cidade, nome from bairros";
						$resultado_valores2 = mysqli_query($conn, $result_valores2);
						while($row_valores2 = mysqli_fetch_array($resultado_valores2)){
						echo "<option id = ". $row_valores2['id_bairro']. " value=". $row_valores2['id_bairro']. ">". $row_valores2['cidade'] ." - ". $row_valores2['nome'] . "</option>";
						}
						//var_dump($resultado_valores1);
						?>
					</select>
					<br><br>

					<label>Valor: </label>
					<input type="text" name="valor" id="valor" placeholder="R$" value="<?php
					if (isset($dados_mot['valor'])) {
						echo $dados_mot['valor'];
					}
					?>"><br><br>
					

					<input  class="btn btn-theme03" type="submit" value="Cadastrar" name="Cadvalores">
					<a href = "list_valores.php"><button class="btn btn-theme04" type="button">Cancelar</button></a>
				</form>
          </div>
        </div>
		</div>
      </section>
      <!-- /wrapper -->
	  <?php include "./footer.html" ?>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
 
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include "./additional.js" ?>
  <?php include "./javascripts.js" ?>

</body>

</html>
