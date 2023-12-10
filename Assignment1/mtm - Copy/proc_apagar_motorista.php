<?php
session_start();
include_once("conexao.php");
$id_motorista = filter_input(INPUT_GET, 'id_motorista', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id_motorista)){
	$result_motorista = "DELETE FROM motoristas WHERE id_motorista='$id_motorista'";
	$resultado_motorista = mysqli_query($conn, $result_motorista);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Motorista apagado com sucesso</p>";
		header("Location: list_motorista.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o motorista não foi apagado com sucesso</p>";
		header("Location: list_motorista.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um motorista</p>";
	header("Location: list_motorista.php");
}
