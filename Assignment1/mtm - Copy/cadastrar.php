<?php
session_start();
ob_start();
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.html" ?>
  <?php include "./menu.html" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
	          <h3><i class="fa fa-angle-right"></i> Cadastrar Novo Usuário</h3>
        <div class="row mt">
          <div class="col-lg-12">
    
				
				<?php
				//Receber os dados do formulário
				$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;

				//Verificar se o usuário clicou no botão
				if (!empty($dados['CadUsuario'])) {
					//var_dump($dados);

					$empty_input = false;

					$dados = array_map('trim', $dados);
					if (in_array("", $dados)) {
						$empty_input = true;
						echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
					} elseif (is_null($dados['senha'])) {
						$empty_input = true;
						echo "<p style='color: #f00;'>Erro: Necessário preencher o campo Senha !</p>";
					}

					var_dump($empty_input);
					if (!$empty_input) {
						$query_usuario = "INSERT INTO usuarios (nome, email, senha, status) VALUES ('" .$dados['nome']. "', '" .$dados['email']. "', '" .$dados['senha']. "', 'A') ";
						$cad_usuario = $conn->prepare($query_usuario);
						var_dump($query_usuario);
						var_dump($cad_usuario);
			
						$cad_usuario->execute();
						if ($cad_usuario->num_rows()) {
							echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
						} else {
							unset($dados);
							echo "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
							header("Location: list_user.php");							
						}
					}
				}
				?>
				<form name="cad-usuario" method="POST" action="">
					<label>Nome: </label>
					<input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php
					if (isset($dados['nome'])) {
						echo $dados['nome'];
					}
					?>"><br><br>

					<label>E-mail: </label>
					<input type="email" name="email" id="email" placeholder="Seu melhor e-mail" value="<?php
					if (isset($dados['email'])) {
						echo $dados['email'];
					}
					?>"><br><br>
					
					<label>Senha: </label>
					<input type="password" name="senha" id="senha" placeholder="Digite sua senha" value="<?php
					if (isset($dados['senha'])) {
						echo $dados['senha'];
					}
					?>"><br><br>
					
					

					<input type="submit" value="Cadastrar" name="CadUsuario">
				</form>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
	  <?php include "./footer.html" ?>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
 
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include "./additional.js" ?>
  <?php include "./javascripts.js" ?>

</body>

</html>
