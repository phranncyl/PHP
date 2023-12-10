<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id_valor', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_valor = "DELETE FROM valores WHERE id_valor='$id'";
	$resultado_valor = mysqli_query($conn, $result_valor);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Valor apagado com sucesso</p>";
		header("Location: list_valores.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o Valor não foi apagado com sucesso</p>";
		header("Location: list_valores.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Valor</p>";
	header("Location: list_valores.php");
}