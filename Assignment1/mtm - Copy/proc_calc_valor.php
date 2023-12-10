<?php
session_start();
include_once("conexao.php");

$id_corrida = filter_input(INPUT_POST, 'id_corrida', FILTER_SANITIZE_NUMBER_INT);
$id_bairro_saida = filter_input(INPUT_POST, 'bairro_saida', FILTER_SANITIZE_NUMBER_INT);
$id_bairro_chegada = filter_input(INPUT_POST, 'bairro_chegada', FILTER_SANITIZE_NUMBER_INT);

$select_valores = "";

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

	
	$select_valores = "SELECT VALOR FROM valores WHERE id_bairro_SAIDA = '$id_bairro_saida' AND id_bairro_CHEGADA = '$id_bairro_chegada'";
	var_dump($select_valores);
	$resultado_valor = mysqli_query($conn, $select_valores);
	

if(mysqli_affected_rows($conn)){
	//header("Location: cadastrar_corrida.php");
	while($row_corrida = mysqli_fetch_assoc($resultado_valor)){
		$_SESSION['msg'] = $row_corrida['VALOR'];
		
		echo $select_valores;
		echo "<p>";
		echo $row_corrida['VALOR'];
		echo "<p>";
	}
	
	//$_SESSION['usuario'] = $_POST['usuario'];
	
}else{
	$select_valores_novo = "select (SELECT distancia_base*0.5 FROM bairros WHERE id_bairro_SAIDA = id_bairro) + (SELECT distancia_base*0.5 FROM bairros WHERE id_bairro = id_bairro_chegada) AS VALOR from dual";
	//header("Location: cadastrar_corrida.php");
	while($row_corrida = mysqli_fetch_assoc($resultado_valor)){
		$_SESSION['msg'] = $row_corrida['VALOR'];
		echo $row_corrida['VALOR'];
		echo "<p>";
	}
}