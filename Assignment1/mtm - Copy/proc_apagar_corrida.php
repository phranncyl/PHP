<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM corridas WHERE id_corrida='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Corrida apagada com sucesso</p>";
		header("Location: list_corrida.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro a corrida não foi apagada com sucesso</p>";
		header("Location: list_corrida.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar umz corrida</p>";
	header("Location: list_corrida.php");
}