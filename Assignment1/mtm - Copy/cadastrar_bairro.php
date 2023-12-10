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
	          <h3><i class="fa fa-angle-right"></i> Cadastrar Novo Bairro</h3>
        <div class="row mt">
          <div class="col-lg-12">
			<div class="content-panel">
				
				<?php
				//Receber os dados do formulário
				$dados_mot = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;

				//Verificar se o usuário clicou no botão
				if (!empty($dados_mot['CadBairro'])) {
					//var_dump($dados_mot);

					$empty_input = false;

					var_dump($empty_input);
					if (!$empty_input) {
						$query_bairro = "INSERT INTO Bairros (cidade, nome, distancia_base, status) VALUES ('" .$dados_mot['cidade']. "', '" .$dados_mot['nome']. "', '" .$dados_mot['distancia_base']. "', 'A') ";
						$cad_bairro = $conn->prepare($query_bairro);
						var_dump($query_bairro);
						var_dump($cad_bairro);
			
						$cad_bairro->execute();
						if ($cad_bairro->num_rows()) {
							echo "<p style='color: #f00;'>Erro: Bairro não cadastrado com sucesso!</p>";
						} else {
							unset($dados_mot);
							echo "<p style='color: green;'>Bairro cadastrado com sucesso!</p>";
							header("Location: list_bairro.php");							
						}
					}
				}
				?>
				<form name="cad-bairro" method="POST" action="">
					<label>Cidade: </label>
					<select name="cidade">
					<option value="0">-- Selecione --</option>
					<option value="Matão" >Matão</option>
					<option value="Araraquara"  >Araraquara</option>
					<option value="Dobrada"  >Dobrada</option>
					<option value="Taquaritinga" >Taquaritinga</option>
					<option value="Monte Alto"  >Monte Alto</option>
					<option value="Motuca"  >Motuca</option>
					<option value="Bueno de Andrada"  >Bueno de Andrada</option>
					<option value="São Lourenço do Turvo"  >São Lourenço do Turvo</option>
					<option value="Santa Ernestina"  >Santa Ernestina</option>
					</select>
					<br><br>
					<?php
					if (isset($dados_mot['cidade'])) {
						echo $dados_mot['cidade'];
					}
					?>

					<label>Nome: </label>
					<input type="text" name="nome" id="nome" placeholder="Nome" value="<?php
					if (isset($dados_mot['nome'])) {
						echo $dados_mot['nome'];
					}
					?>"><br><br>
					
					<label>Distância da base: </label>
					<input type="text" name="distancia_base" id="distancia_base" placeholder="Distancia" value="<?php
					if (isset($dados_mot['distancia_base'])) {
						echo $dados_mot['distancia_base'];
					}
					?>"><br><br>
				

					<input  class="btn btn-theme03" type="submit" value="Cadastrar" name="CadBairro">
					<a href = "list_bairro.php"><button class="btn btn-theme04" type="button">Cancelar</button></a>
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
