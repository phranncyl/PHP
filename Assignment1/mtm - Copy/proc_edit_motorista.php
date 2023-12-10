<?php
session_start();
include_once("conexao.php");

$id_motorista = filter_input(INPUT_POST, 'id_motorista', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
$telefone1 = filter_input(INPUT_POST, 'telefone1', FILTER_SANITIZE_ENCODED);
$telefone2 = filter_input(INPUT_POST, 'telefone2', FILTER_SANITIZE_EMAIL);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_EMAIL);
$result_motorista = "";

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

	
	$result_motorista = "UPDATE motoristas SET nome='$nome', apelido='$apelido', telefone1='$telefone1', telefone2='$telefone2',  data_nasc='$data_nasc', data_atualizacao=NOW() WHERE id_motorista='$id_motorista'";
$resultado_motorista = mysqli_query($conn, $result_motorista);

if(mysqli_affected_rows($conn)){
	header("Location: list_motorista.php");
	$_SESSION['msg'] = "<p style='color:green;'>Motorista editado com sucesso</p>";
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Motorista não foi editado com sucesso</p>";
	header("Location: edit_motorista.php?id=$id_motorista");
}