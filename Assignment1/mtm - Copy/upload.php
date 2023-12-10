<?php
session_start();
include_once 'conexao.php';
$id = $_SESSION['usuarioId'];

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 500000) {
				$fileNameNew = "profile".$id.".".$fileActualExt;
				$fileDestination = 'img/portfolio/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sql = "UPDATE usuarios SET nome = '".$_POST['nome']."', usuario = '".$_POST['usuario']."', email = '".$_POST['email']."', senha = '".$_POST['senha']."', dir_photo = '".$fileDestination."' WHERE id='$id';";
				$result = mysqli_query($conn, $sql);
				var_dump($sql);
				header("Location: cadastrar.php?uploadsuccess");
				if(isset($resultado)){
				
				$_SESSION['usuarioNome'] = $_POST['nome'];
				$_SESSION['usuarioUser'] = $resultado['usuario'];
				$_SESSION['usuarioEmail'] = $_POST['email'];
				$_SESSION['usuarioSenha'] = $_POST['senha'];
			
				header("Location: index.php");
			}
		} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
}
