<?php
$id_motorista = $_GET['id_motorista'];

if(isset($_POST['StatusMot_Parado'])) {// when click on Parado button
$result_motorista = "UPDATE status_motoristas SET ordem=(select max(ordem) from status_motoristas)+ ".$_SESSION['qtdeMotoristas']." where id_motorista = ".$id_motorista;
$update = $conn->prepare($result_motorista);
$update->execute();

 if ($update->affected_rows > 0) {
	header("Location: list_corrida.php");
	$_SESSION['msg'] = "<p style='color:green;'>CERTO</p>";
}else{
	$_SESSION['msg'] = "<p style='color:red;'>ERRADO</p>";
	header("Location: list_corrida.php");
}
}
?>