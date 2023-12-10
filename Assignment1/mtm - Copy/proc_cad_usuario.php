<?php
session_start();
include_once("conexao.php");

$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_ENCODED);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$fileNameNew = "";
$result_usuario = "";
$fileActualExt = "jpg";

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	if ($fileError === 0) {
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
	}

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');
	
	//FileError = 4 --> No file uploaded
		if ($fileError == 4) {
			// Fazer o UPDATE sem a atualização do caminho do arquivo
			$sql = "insert into usuarios(nome, usuario, status, email, senha)values ('".$nome."', '".$usuario."', '".$status."', '".$email."', '".$senha."');";
			$result = mysqli_query($conn, $sql);
		}else {
			echo "There was an error uploading your file!";
			}
			
	if (in_array($fileActualExt, $allowed)) {
		if (($fileError === 0)){
			$fileNameNew = "profile".$id_usuario.".".$fileActualExt;
			$fileDestination = 'img/portfolio/'.$fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestination);
			$sql = "insert into usuarios(nome, usuario, status, email, senha, dir_photo) values ('".$nome."', '".$usuario."', '".$status."', '".$email."', '".$senha."', '".$fileDestination."');";
			if (($fileSize < 500000) && ($fileSize >1)) {
				$result = mysqli_query($conn, $sql);
				//var_dump($result);
				if($result){
					header("Location: list_usuario.php");
					$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
				}else{
					$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
					header("Location: edit_usuario.php?id_usuario=$id_usuario");
				}
				echo "Tamanho ok";
			} else {
				echo "Your file is too big!";
				} 
		//echo "sem erro";
		//echo "sql ".$sql;
		} 
		//echo "not allowed ".$fileActualExt;
		//echo "sql ".$sql;
		header("Location: list_usuario.php");
		$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>".$sql;
} else {
	echo "There was an error uploading your file!";
}