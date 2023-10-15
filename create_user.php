<?php
include_once './connection.php';
include_once './validate.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.php" ?>
  <?php include "./menu.php" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
	          <h3><i class="fa fa-angle-right"></i> Create new user</h3>
        <div class="row mt">
          <div class="col-lg-12">
    
				
				<?php
				//Receber os dados do formulário
				$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;
				$status = 'A';
				
			
				
				//Verificar se o usuário clicou no botão
				if (!empty($dados['CreateUser'])) {

					$result_users   = $database->create_user($dados['name'],$dados['email'],$dados['password'], $status);
					header("Location: list_user.php"); // go back to list_user page
				}
			
				?>
				<form name="create-user"  class ="cmxform form-horizontal style-form" method="POST" action="">
					<label>Name: </label>
					<input type="text" name="name" id="name" placeholder="Full Name" value="<?php
					
					if (isset($dados['name'])) {
						echo $dados['name'];
					}
					?>"><br><br>

					<label>E-mail: </label>
					<input type="email" name="email" id="email" placeholder="Your best e-mail" value="<?php
					if (isset($dados['name'])) {
						echo $dados['email'];
					}
					?>" required><br><br>
					
					<label>Password: </label>
					<input type="password" name="password" id="password" placeholder="Type your password" value="<?php
					if (isset($dados['password'])) {
						echo $dados['password'];
					}
					?>" required><br><br>
					
					<input type="submit" button type="button" class="btn btn-round btn-success" value="create" name="CreateUser">
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

</body>

</html>
