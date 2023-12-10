<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$corridas = filter_input(INPUT_POST, 'corridas', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_ENCODED);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$result_corridas = "";

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

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
				$sql = "UPDATE corridass SET nome = '".$_POST['nome']."', corridas = '".$_POST['corridas']."', email = '".$_POST['email']."', senha = '".$_POST['senha']."', dir_photo = '".$fileDestination."' WHERE id='$id';";
				$result = mysqli_query($conn, $sql);
				var_dump($sql);
				header("Location: cadastrar.php?uploadsuccess");
				if(isset($resultado)){
				
				$_SESSION['corridasNome'] = $_POST['nome'];
				$_SESSION['corridasUser'] = $resultado['corridas'];
				$_SESSION['corridasEmail'] = $_POST['email'];
				$_SESSION['corridasSenha'] = $_POST['senha'];
			
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
	
	$result_corridas = "UPDATE corridass SET nome='$nome', corridas='$corridas', senha='$senha', email='$email', dir_photo='".$fileDestination."', modified=NOW() WHERE id='$id'";
$resultado_corridas = mysqli_query($conn, $result_corridas);

if(mysqli_affected_rows($conn)){
	header("Location: list_corridas.php");
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit_corridas.php?id=$id");
}