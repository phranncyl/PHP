<?php

$qtde_motor= 0;
$id_motorista = filter_input(INPUT_POST, 'id_motorista', FILTER_SANITIZE_NUMBER_INT);

?>

<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;;
  width: auto;
  overflow-x: scroll;
  overflow-y: hidden;
}

.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  font-size: 20px;
  text-align: center;
}
.button {
  border: none;
  text-align: center;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 40px;
}
.button4 {
	background-color: #4CAF50; /* Green */
	color: white;
	text-decoration: none;
}
</style>


    <!--main content start-->

        <div class="row mt">
          <div class="col-lg-12">
			 <div class="content-panel">
				<form method="POST" action="">
				<?php
				//Receber os dados do formulário
				$dados_mot = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;

				//Salvar a quantidade de Motoristas
				$qtde_motor =  $_SESSION['qtdeMotoristas'];
				
				$result_motoristas = "SELECT m.id_motorista, nome, apelido, s.ordem FROM Motoristas m left join status_motoristas s on s.id_motorista = m.id_motorista WHERE m.status <> 'I' order by s.ordem";
				$resultado_motoristas = mysqli_query($conn, $result_motoristas);
				echo "<div class='grid-container'>";
				while($row_motoristas = mysqli_fetch_assoc($resultado_motoristas)){		
					$id_mot = $row_motoristas['id_motorista'];
					echo "<div class='grid-item'>" . $row_motoristas['apelido'] . "<p> <h6>".$row_motoristas['nome']. " </h6>
						  <p> <h6>".$row_motoristas['ordem']. " </h6>
						  <input  class='button button4' type='submit' name='StatusMot_Parado'>  <a href='cad_statusmotoristas.php?id_motorista=$id_mot'></a>
						  <button class='button button4'> Fora </button>
						  <button class='button button4'> Não veio </button>
						  </div>	";
				}
				echo "</div>";
				?>
				</form>
		</div>
        </div>
		</div>
 
