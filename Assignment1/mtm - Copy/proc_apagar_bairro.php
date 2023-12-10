<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id_bairro', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_bairro = "DELETE FROM bairros WHERE id_bairro='$id'";
	$resultado_bairro = mysqli_query($conn, $result_bairro);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Bairro apagado com sucesso</p>";
		header("Location: list_bairro.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o bairro não foi apagado com sucesso</p>";
		header("Location: list_bairro.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um bairro</p>";
	header("Location: list_bairro.php");
}