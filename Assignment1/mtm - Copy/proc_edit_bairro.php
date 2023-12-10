<?php
session_start();
include_once("conexao.php");

$id_bairro = filter_input(INPUT_POST, 'id_bairro', FILTER_SANITIZE_NUMBER_INT);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$distancia = filter_input(INPUT_POST, 'distancia', FILTER_SANITIZE_ENCODED);

$result_bairro = "";

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

	
	$result_bairro = "UPDATE bairros SET cidade='$cidade', nome='$nome', distancia_base='$distancia' WHERE id_bairro='$id_bairro'";
$resultado_bairro = mysqli_query($conn, $result_bairro);

if(mysqli_affected_rows($conn)){
	header("Location: list_bairro.php");
	$_SESSION['msg'] = "<p style='color:green;'>Bairro editado com sucesso</p>";
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Bairro não foi editado com sucesso</p>";
	header("Location: edit_bairro.php?id=$id");
}