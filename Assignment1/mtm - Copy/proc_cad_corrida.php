<?php
session_start();
include_once("conexao.php");

$nome_cliente = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_EMAIL);
$endereco_chegada = filter_input(INPUT_POST, 'endereco_chegada', FILTER_SANITIZE_EMAIL);
$endereco_saida = filter_input(INPUT_POST, 'endereco_saida', FILTER_SANITIZE_EMAIL);
$numero_chegada = filter_input(INPUT_POST, 'numero_chegada', FILTER_SANITIZE_EMAIL);
$numero_saida = filter_input(INPUT_POST, 'numero_saida', FILTER_SANITIZE_EMAIL);
$bairro_chegada = filter_input(INPUT_POST, 'bairro_chegada', FILTER_SANITIZE_EMAIL);
$bairro_saida = filter_input(INPUT_POST, 'bairro_saida', FILTER_SANITIZE_EMAIL);
$motorista = filter_input(INPUT_POST, 'motorista', FILTER_SANITIZE_EMAIL);
$tipo_pagamento = filter_input(INPUT_POST, 'tipo_pagamento', FILTER_SANITIZE_EMAIL);
$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_EMAIL);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_EMAIL);
$horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_EMAIL);


/* $result_corrida = "INSERT INTO corridas (nome_cliente, data_atendimento, data_corrida, horario, endereco_saida, telefone, id_bairro_saida, endereco_chegada, id_bairro_chegada, tipo_pagamento, valor, id_motorista) VALUES ('" .$dados_mot['nome']. "', now(), '" .$dados_mot['data_corrida']. "', '" .$dados_mot['horario']. "', '" .$dados_mot['endereco_saida']. "', '".$dados_mot['telefone']."', '" .$dados_mot['bairro_saida']. "', '" .$dados_mot['endereco_chegada']. "', '" .$dados_mot['bairro_chegada']. "', '" .$dados_mot['tipo_pagamento']. "', '" .$dados_mot['valor']. "',  '" .$dados_mot['motorista']. "') "; */

$result_corrida = "INSERT INTO corridas (nome_cliente, data_atendimento, data_corrida, horario, endereco_saida, telefone, id_bairro_saida, endereco_chegada, id_bairro_chegada, tipo_pagamento, valor, id_motorista) VALUES ('') ";

$resultado_corrida = mysqli_query($conn, $result_corrida);


if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Corrida cadastrado com sucesso</p>
						.$nome_cliente";
	header("Location: list_corrida.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Corrida não foi cadastrado com sucesso</p> .$nome_cliente";
	header("Location: list_corrida.php");
}
