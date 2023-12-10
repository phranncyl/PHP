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
  <?php include "./header.php" ?>
  <?php include "./menu.php" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
	          <h3><i class="fa fa-angle-right"></i> Cadastrar Novo Motorista</h3>
        <div class="row mt">
          <div class="col-lg-12">
			 <div class="content-panel">
				
				<?php
				//Receber os dados do formulário
				$dados_mot = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;

				//Verificar se o usuário clicou no botão
				if (!empty($dados_mot['CadMotorista'])) {
					//var_dump($dados_mot);

					$empty_input = false;

					var_dump($empty_input);
					if (!$empty_input) {
						$query_motorista = "INSERT INTO motoristas (nome, apelido, telefone1, telefone2, data_nasc, status) VALUES ('" .$dados_mot['nome']. "', '" .$dados_mot['apelido']. "', '" .$dados_mot['telefone1']. "', '" .$dados_mot['telefone2']. "', '" .$dados_mot['data_nasc']. "', 'A') ";
						$cad_motorista = $conn->prepare($query_motorista);
						var_dump($query_motorista);
						var_dump($cad_motorista);
			
						$cad_motorista->execute();
						if ($cad_motorista->num_rows()) {
							echo "<p style='color: #f00;'>Erro: Motorista não cadastrado com sucesso!</p>";
						} else {
							unset($dados_mot);
							echo "<p style='color: green;'>Motorista cadastrado com sucesso!</p>";
							header("Location: list_motorista.php");							
						}
					}
				}
				?>
				<form name="cad-motorista" method="POST" action="">
					<label>Nome: </label>
					<input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php
					if (isset($dados_mot['nome'])) {
						echo $dados_mot['nome'];
					}
					?>"><br><br>

					<label>Apelido: </label>
					<input type="text" name="apelido" id="apelido" placeholder="Apelido" value="<?php
					if (isset($dados_mot['apelido'])) {
						echo $dados_mot['apelido'];
					}
					?>"><br><br>
					
					<label>Telefone1: </label>
					<input type="text" name="telefone1" id="telefone1" placeholder="Telefone1" value="<?php
					if (isset($dados_mot['telefone1'])) {
						echo $dados_mot['telefone1'];
					}
					?>"><br><br>
					
					<label>Telefone2: </label>
					<input type="text" name="telefone2" id="telefone2" placeholder="Telefone2" value="<?php
					if (isset($dados_mot['telefone2'])) {
						echo $dados_mot['telefone2'];
					}
					?>"><br><br>
					
					<label>Data de Nasc.: </label>
					<input type="date" name="data_nasc" id="data_nasc" placeholder="Data de Nasc" value="<?php
					if (isset($dados_mot['data_nasc'])) {
						echo $dados_mot['data_nasc'];
					}
					?>"><br><br>
					
					

					<input  class="btn btn-theme03" type="submit" value="Cadastrar" name="CadMotorista">
					<a href = "list_motorista.php"><button class="btn btn-theme04" type="button">Cancelar</button></a>
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