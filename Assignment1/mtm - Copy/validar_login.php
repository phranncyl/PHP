<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("conexao.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['usuario'])) && (isset($_POST['senha']))){
		$usuario =  $_POST['usuario']; 
		$senha =  $_POST['senha'];
		
		
		//Buscar na tabela motoristas a quantidade de motoristas para criar a ordem
		$result_statusmot = "SELECT count(*)as qtde FROM motoristas WHERE status <> 'I'";
		$resultado_statusmot = mysqli_query($conn, $result_statusmot);
		$res_statusmot = mysqli_fetch_assoc($resultado_statusmot);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['id_usuario'];
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioUser'] = $resultado['usuario'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			$_SESSION['usuarioSenha'] = $resultado['senha'];
			$_SESSION['qtdeMotoristas'] = $res_statusmot['qtde'];
			
				header("Location: index.php");
			
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido <br>";
			
			unset(
				$_SESSION['usuarioId'],
				$_SESSION['usuarioNome'],
				$_SESSION['usuarioNiveisAcessoId'],
				$_SESSION['usuarioEmail'],
				$_SESSION['usuarioSenha'],
				
			);
			header("Location: login.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: login.php");
	}
?>