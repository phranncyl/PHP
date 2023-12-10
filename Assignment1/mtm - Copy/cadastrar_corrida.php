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
	          <h3><i class="fa fa-angle-right"></i> Cadastrar Nova Corrida</h3>
        <div class="row mt">
          <div class="col-lg-12">
			 <div class="content-panel">
				
				<?php
				//Receber os dados do formulário
				$dados_mot = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;

				//Verificar se o usuário clicou no botão
				if (!empty($dados_mot['CadCorrida'])) {
					var_dump($dados_mot);

					$empty_input = false;

					var_dump($empty_input);
					if (!$empty_input) {
						//$valor ="SELECT * FROM valores where id_bairro_saida = $id_bairro_saida and id_bairro_chegada = $id_bairro_chegada";
						$query_corrida = "INSERT INTO corridas (nome_cliente, data_atendimento, data_corrida, horario, endereco_saida, telefone, id_bairro_saida, endereco_chegada, id_bairro_chegada, tipo_atendimento, valor, id_motorista) VALUES ('" .$dados_mot['nome']. "', now(), '" .$dados_mot['data_corrida']. "', '" .$dados_mot['horario']. "', '" .$dados_mot['endereco_saida']. "', '".$dados_mot['telefone']."', '" .$dados_mot['bairro_saida']. "', '" .$dados_mot['endereco_chegada']. "', '" .$dados_mot['bairro_chegada']. "', '" .$dados_mot['tipo_atendimento']. "', '" .$dados_mot['valor']. "',  '" .$dados_mot['motorista']. "') ";
						$cad_corrida = $conn->prepare($query_corrida);
						var_dump($query_corrida);
						//var_dump($cad_corrida);
			
						$cad_corrida->execute();
						if ($cad_corrida->num_rows()) {
							echo "<p style='color: #f00;'>Erro: Corrida não cadastrada com sucesso!</p>";
						} else {
							unset($dados_mot);
							echo "<p style='color: green;'>Corrida cadastrado com sucesso!</p>";
							header("Location: cadastrar_corrida.php");							
						}
					}
				}
				?>
				<form name="cad-corrida" method="POST" action="">
					<label>Nome Cliente: </label>
					<input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php
					if (isset($dados_mot['nome'])) {
						echo $dados_mot['nome'];
					}
					?>"><br><br>

					<label>Data Corrida: </label>
					<input type="date" name="data_corrida" id="data_corrida" placeholder="data_corrida" value="<?php
					if (isset($dados_mot['data_corrida'])) {
						echo $dados_mot['data_corrida'];
					}
					?>"><br><br>
					
					<label>Horario: </label>
					<input type="time" name="horario" id="horario" placeholder="Horario" value="<?php
					if (isset($dados_mot['horario'])) {
						echo $dados_mot['horario'];
					}
					?>"><br><br>
					
					<label>Endereço Saida: </label>
					<input type="text" name="endereco_saida" id="endereco_saida" placeholder="endereco_saida" value="<?php
					if (isset($dados_mot['endereco_saida'])) {
						echo $dados_mot['endereco_saida'];
					}
					?>"><br><br>
					
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
						echo $valor_corrida;
						?>
					</select>
					<br><br>					
					
					<label>Endereço Chegada: </label>
					<input type="text" name="endereco_chegada" id="endereco_chegada" placeholder="endereco_chegada" value="<?php
					if (isset($dados_mot['endereco_chegada'])) {
						echo $dados_mot['endereco_chegada'];
					}
					?>"><br><br>
					
					<label>Bairro Chegada: </label>
					<select name="bairro_chegada">
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
					
					<label>Tipo Atendimento: </label>
					<select name="tipo_atendimento">
					<option value="NULL">-- Selecione --</option>
					<option value="WHATS"> WhatsApp </option>
					<option value="TELEFONE"> Telefone </option>
					<option value="COBRAR"> A Cobrar </option>

					</select>
					<br><br>
					
					<label>Motoqueiro: </label>
					<select name="motorista">
					<option value="0">-- Selecione --</option>
					
					<?php
					$result_valores1 = "SELECT distinct id_motorista, nome, apelido from motoristas";
						$resultado_valores1 = mysqli_query($conn, $result_valores1);
						while($row_valores1 = mysqli_fetch_array($resultado_valores1)){
						echo "<option id = ". $row_valores1['id_motorista']. " value=". $row_valores1['id_motorista']. ">". $row_valores1['nome'] ." - ". $row_valores1['apelido'] . "</option>";
						}
						//var_dump($resultado_valores1);
						?>
					</select>
					<br><br>
					
					<label><a href="proc_calc_valor.php">Valor: </a></label>
					<?php
						//$valor =  $_SESSION['valor'];
						echo "<input type='text' name='valor' id='valor' disabled value=''><br><br>";
					?>
					<!--<input type="text" name="valor" id="valor" placeholder="R$"  disabled value=".$valor."><br><br> -->
					
					<input  class="btn btn-theme03" type="submit" value="Cadastrar" name="CadCorrida">
					<a href = "list_corrida.php"><button class="btn btn-theme04" type="button">Cancelar</button></a>
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