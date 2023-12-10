<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_corrida = "SELECT * FROM corridas WHERE id_corrida = '$id'";
$resultado_corrida = mysqli_query($conn, $result_corrida);
$row_corrida = mysqli_fetch_assoc($resultado_corrida);
$hash="";
$bairro_saida = null;
$bairro_chegada = null;
$valor_corrida = 0;
$now = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
$bairro_saida = isset($_POST['bairro_saida']) ? $_POST['bairro_saida'] : 0;
$bairro_chegada =  isset($_POST['bairro_chegada']) ? $_POST['bairro_chegada'] : 0;
$motorista =  isset($_POST['motorista']) ? $_POST['motorista'] : 0;
$telefone =  isset($_POST['telefone']) ? $_POST['telefone'] : "";
$horario = $now->format('H:i'); 
$endereco_chegada =  isset($_POST['endereco_chegada']) ? $_POST['endereco_chegada'] : "";
$endereco_saida =  isset($_POST['endereco_saida']) ? $_POST['endereco_saida'] : "";
$nome_cliente =  isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : "";
$observacao =  isset($_POST['observacao']) ? $_POST['observacao'] : "";
$tipo_pagamento =  isset($_POST['tipo_pagamento']) ? $_POST['tipo_pagamento'] : 0;
$numero_chegada =  isset($_POST['numero_chegada']) ? $_POST['numero_chegada'] : 0;
$numero_saida =  isset($_POST['numero_saida']) ? $_POST['numero_saida'] : 0;

$result_valor = "";
$resultado_valor = "";
$row_valor = null;
$qtde_motor= 0;

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
	  <?php include "./varal_motoristas.php" ?>
	  <h3><i class="fa fa-angle-right"></i> Corridas</h3>
	   
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
        <div class="row mt">
          <div class="col-lg-12">
			 <div class="content-panel">
				
				<?php
				//Receber os dados do formulário
				$dados_mot = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;

				//Salvar a quantidade de Motoristas
				$qtde_motor =  $_SESSION['qtdeMotoristas'];
				
				
				//Verificar se o usuário clicou no botão
				if (!empty($dados_mot['CadCorrida'])) {
					//var_dump($dados_mot);

					$empty_input = false;

					//var_dump($empty_input);
					if (!$empty_input) {
						$query_corrida = "INSERT INTO corridas (nome_cliente, data_atendimento, data_corrida, horario, endereco_saida, numero_saida, id_bairro_saida, endereco_chegada, numero_chegada, id_bairro_chegada, tipo_pagamento, valor, id_motorista, observacao) VALUES ('" .$dados_mot['nome_cliente']. "', now(), now(), '" .$dados_mot['horario']. "', '" .$dados_mot['endereco_saida']. "', '" .$dados_mot['numero_saida']. "', '" .$dados_mot['bairro_saida']. "', '" .$dados_mot['endereco_chegada']. "', '" .$dados_mot['numero_chegada']. "', '" .$dados_mot['bairro_chegada']. "', '" .$dados_mot['tipo_pagamento']. "', '" .$row_valor['valor']. "',   '" .$dados_mot['motorista']. "', '" .$dados_mot['observacao']. "') ";
						$cad_corrida = $conn->prepare($query_corrida);
						//var_dump($query_corrida);
						//var_dump($cad_corrida);
			
						$cad_corrida->execute();
						if ($cad_corrida->num_rows()) {
							echo "<p style='color: #f00;'>Erro: Corrida não cadastrada com sucesso!</p>";
						} else {
							unset($dados_mot);
							echo "<p style='color: green;'>Corrida cadastrado com sucesso!</p>";
							//header("Location: list_corrida.php");							
						}
					}
				}
				
				?>
				<form name="cad-corrida" method="POST" action="">
				
					<label>Motoqueiro: </label>
					<select name="motorista" class="chosen" tabindex="1" >
					<option value="0">-- Selecione --</option>
					<?php
					$result_valores1 = "SELECT distinct id_motorista, nome, apelido from motoristas";
						$resultado_valores1 = mysqli_query($conn, $result_valores1);
						while($row_valores1 = mysqli_fetch_array($resultado_valores1)){
						
						if ($motorista == $row_valores1['id_motorista']){
							$selected = "selected";
						} else {
								$selected = "";
						}
						echo "<option id = ". $row_valores1['id_motorista']. " value=". $row_valores1['id_motorista']. " ". $selected .">". $row_valores1['nome'] ." - ". $row_valores1['apelido'] . "</option>";
						}
						//var_dump($resultado_valores1);
						?>
					</select>

					<label>Endereço Saida: </label>
					<input type="text" name="endereco_saida" id="endereco_saida"  tabindex="2" placeholder="" value="<?php
					
					if (isset($dados_mot['endereco_saida'])) {
						echo $dados_mot['endereco_saida'];
					}else{
						echo $endereco_saida;
					}
					?>">
					
					<label>Número: </label>
					<input type="text" name="numero_saida" id="numero_saida"  tabindex="3" placeholder="Nº"  size="8" value="<?php
					if (isset($dados_mot['numero_saida'])) {
						echo $dados_mot['numero_saida'];
					}else{
						echo $numero_saida;
					}
					?>">
					
					<label>Bairro Saida: </label>
					<select id="bairro_saida" name="bairro_saida" tabindex="4" onchange="this.form.submit()" >
					<option value="0">-- Selecione --</option>
					<?php
					$result_valores1 = "SELECT distinct id_bairro, cidade, nome from bairros";
						$resultado_valores1 = mysqli_query($conn, $result_valores1);
						while($row_valores1 = mysqli_fetch_array($resultado_valores1)){
						
						if ($bairro_saida == $row_valores1['id_bairro']){
							$selected = "selected";
						} else {
								$selected = "";
						}
						echo "<option id = ". $row_valores1['id_bairro']. " value=". $row_valores1['id_bairro']. " ". $selected .">". $row_valores1['cidade'] ." - ". $row_valores1['nome'] . "</option>";
						}
						?>
					</select>
					<br><br>		
					
					<label>Horario: </label>
					<input type="time" name="horario" id="horario" tabindex="5" placeholder="<?php 
					$now = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
					echo $now->format('H:i:s');  ?>" value="<?php 
					if (isset($dados_mot['horario'])) {
						echo $dados_mot['horario'];
					}else{
						echo $horario;
					}
					?>">
					
					<label>Telefone: </label>
					<input type="tel " name="telefone" id="telefone" tabindex="6" placeholder=""   size="10" value="<?php
					
					if (isset($dados_mot['telefone'])) {
						echo $dados_mot['telefone'];
					}else{
						echo $telefone;
					}
					?>">		
					
					<label>Endereço Chegada: </label>
					<input type="text" name="endereco_chegada" id="endereco_chegada" tabindex="7" placeholder="" value="<?php
					if (isset($dados_mot['endereco_chegada'])) {
						echo $dados_mot['endereco_chegada'];
					}else{
						echo $endereco_chegada;
					}
					?>">
					
					<label>Número: </label>
					<input type="text" name="numero_chegada" id="numero_chegada" tabindex="8" placeholder="Nº" size="8" value="<?php
					if (isset($dados_mot['numero_chegada'])) {
						echo $dados_mot['numero_chegada'];
					}else{
						echo $numero_chegada;
					}
					?>">
					
					<label>Bairro Chegada: </label>
					<select id="bairro_chegada" name="bairro_chegada" class="chosen" required  tabindex="9" onchange="this.form.submit()"  
					<option value='0'>-- Selecione --</option>
					<?php
						$result_valores2 = "SELECT distinct id_bairro, cidade, nome from bairros";
						$resultado_valores2 = mysqli_query($conn, $result_valores2);
						while($row_valores2 = mysqli_fetch_array($resultado_valores2)){
						
						if ($bairro_chegada == $row_valores2['id_bairro']){
							$selected = "selected";
						} else {
								$selected = "";
						}
						echo "<option id = ". $row_valores2['id_bairro']. " value=". $row_valores2['id_bairro']. " ". $selected .">". $row_valores2['cidade'] ." - ". $row_valores2['nome'] . "</option>";
						}
						
						?>
					            
					</select>
					
					<br><br>
					
					<label>Nome: </label>
					<input type="text" name="nome_cliente" id="nome_cliente" tabindex="10" placeholder="" value="<?php
					if (isset($dados_mot['nome_cliente'])) {
						echo $dados_mot['nome_cliente'];
					}else{
						echo $nome_cliente;
					}
					?>">
					
					<label>Tipo Pagamento: </label>
					<select name="tipo_pagamento" tabindex=9>
					<option value="NULL">-- Selecione --</option>
					<option value="DINHEIRO"> Dinheiro </option>
					<option value="DEBITO"> Debito </option>
					<option value="CREDITO"> Crédito </option>
					<option value="PIX"> Pix </option>
					</select>
					
					<label>Observação: </label>
					<input type="text" name="observacao" id="observacao" tabindex="11" placeholder="" value="<?php
					if (isset($dados_mot['observacao'])) {
						echo $dados_mot['observacao'];
					
					}else{
						echo $observacao;
					}
					?>">
						
					<label>Valor: </a></label>			
					<input type='number' name='valor' id='valor' value= "<?php
						
						//$chegada = $_POST['bairro_chegada'];
						//$saida = $_POST['bairro_saida'];
						$valor = "Select valor from valores where id_bairro_chegada = ifnull(".$bairro_chegada.",0) and id_bairro_saida = ifnull(".$bairro_saida.",0) union Select valor from valores where id_bairro_chegada = ifnull(".$bairro_saida.",0) and id_bairro_saida = ifnull(".$bairro_chegada.",0)";
						$result_valor = $valor;
						$resultado_valor = mysqli_query($conn, $result_valor);
						if (mysqli_num_rows($resultado_valor) == 0) {
							$row_valor['valor'] = 0;
							echo $row_valor['valor'];
						} 	else {
								while($row_valor = mysqli_fetch_array($resultado_valor)){
									echo $row_valor['valor'];
								}
							}
					
					?>" disabled>
					

					<input  class="btn btn-theme03" type="submit" value="Cadastrar" name="CadCorrida" tabindex="12">
					<button class="btn btn-theme04" type="button">Cancelar</button></a>
				</form>
			<br><br>
	 
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> ID</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nome</th>
                    <th><i class="fa fa-bookmark"></i> Endereço Origem</th>
                    <th><i class="fa fa-bookmark"></i> Bairro Origem</th>
                    <th><i class="fa fa-bookmark"></i> Endereço Destino</th>
                    <th><i class="fa fa-bookmark"></i> Bairro Destino</th>
                    <th><i class="fa fa-bookmark"></i> Data Corrida</th>
                    <th><i class="fa fa-bookmark"></i> Horario</th>
                    <th><i class="fa fa-bookmark"></i> Motoqueiro</th>
					<th><i class="fa fa-bookmark"></i> Tipo Entrada</th>
					<th><i class="fa fa-bookmark"></i> Valor</th>
                   
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
						$result_corrida = "SELECT id_corrida, data_atendimento, data_corrida, nome_cliente, endereco_saida, b.nome as bairro_saida, endereco_chegada, b2.nome as bairro_chegada, tipo_atendimento, horario, valor , m.nome as motorista FROM corridas c INNER JOIN bairros b on b.id_bairro = c.id_bairro_saida inner join bairros b2 on b2.id_bairro = c.id_bairro_chegada INNER JOIN motoristas m on m.id_motorista = c.id_motorista  LIMIT $inicio, $qnt_result_pg";
						$resultado_corridas = mysqli_query($conn, $result_corrida);
						while($row_corrida = mysqli_fetch_assoc($resultado_corridas)){
						echo " <tr>";
						echo "<td>" . $row_corrida['id_corrida'] . "</td>";
						echo "<td>" . $row_corrida['nome_cliente'] . "</td>";
						echo "<td>" . $row_corrida['endereco_saida'] . "</td>";
						echo "<td>" . $row_corrida['bairro_saida'] . "</td>";
						echo "<td>" . $row_corrida['endereco_chegada'] . "</td>";
						echo "<td>" . $row_corrida['bairro_chegada'] . "</td>";
						echo "<td>" . $row_corrida['data_corrida'] . "</td>";
						echo "<td>" . $row_corrida['horario'] . "</td>";
						echo "<td>" . $row_corrida['motorista'] . "</td>";
						echo "<td>" . $row_corrida['tipo_atendimento'] . "</td>";
						echo "<td>" . $row_corrida['valor'] . "</td>";
						
						
						
                      echo "<td><button class='btn btn-primary btn-xs'><a href='edit_corrida.php?id=" . $row_corrida['id_corrida'] . "' style='color:white;'><i class='fa fa-pencil'></i></a></button>";
                      echo "<button class='btn btn-danger btn-xs'><a href='proc_apagar_corrida.php?id=" . $row_corrida['id_corrida'] . "' style='color:white;'><i class='fa fa-trash-o'></a></i></button>
                   
					</td>
					 </tr>
					 
";
						}
			
			//Paginção - Somar a quantidade de usuários
			$result_pg = "SELECT COUNT(id_corrida) AS num_result FROM corridas";
			$resultado_pg = mysqli_query($conn, $result_pg);
			$row_pg = mysqli_fetch_assoc($resultado_pg);
			//echo $row_pg['num_result'];
			//Quantidade de pagina 
			$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
			
			echo "	</tbody>		</table>";
			//Limitar os link antes depois
			$max_links = 2;
			echo "<a href='list_corrida.php?pagina=1'>Primeira</a> ";
			
			for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
				if($pag_ant >= 1){
					echo "<a href='list_corrida.php?pagina=$pag_ant'>$pag_ant</a> ";
				}
			}
				
			echo "$pagina ";
			
			for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
				if($pag_dep <= $quantidade_pg){
					echo "<a href='list_corrida.php?pagina=$pag_dep'>$pag_dep</a> ";
				}
			}
			
			echo "<a href='list_corrida.php?pagina=$quantidade_pg'>Ultima</a>";
			
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
