<?php
session_start();
include_once("conexao.php");

$id_valor = filter_input(INPUT_POST, 'id_valor', FILTER_SANITIZE_NUMBER_INT);
$id_bairro_saida = filter_input(INPUT_POST, 'bairro_saida', FILTER_SANITIZE_STRING);
$id_bairro_chegada = filter_input(INPUT_POST, 'bairro_chegada', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_ENCODED);

$result_valor = "";

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

	
	$result_valor = "UPDATE valores SET id_bairro_saida=$id_bairro_saida, id_bairro_chegada=$id_bairro_chegada, valor = $valor WHERE id_valor='$id_valor'";
$resultado_valor = mysqli_query($conn, $result_valor);

if(mysqli_affected_rows($conn)){
	header("Location: list_valores.php");
	$_SESSION['msg'] = "<p style='color:green;'>Valor editado com sucesso</p>";
	
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Valor não foi editado com sucesso</p>";
	header("Location: edit_valores.php?id=$id");
}