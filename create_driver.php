<?php
include_once './connection.php';
include_once './validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.php" ?>
  <?php include "./menu.php" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
	          <h3><i class="fa fa-angle-right"></i> Create new driver</h3>
        <div class="row mt">
          <div class="col-lg-12">
    
				
				<?php
				//Receber os dados do formulário
				$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$empty_input = true;
				$status = 'A';

				//Verificar se o usuário clicou no botão
				if (!empty($dados['CreateDriver'])) {

					$valid->checkNumber($dados['phone2']);
					$result_users   = $database->create_driver($dados['name'],$dados['nickname'],$dados['phone1'], $dados['phone2'],$dados['dob'],$status);
					header("Location: list_driver.php"); // go back to list_user page
				}
				?>
				<form name="create-driver"  class ="cmxform form-horizontal style-form" method="POST" action="">
					<label>Name: </label>
					<input type="text" name="name" id="name" placeholder="Full Name" value="<?php
					if (isset($dados['name'])) {
						echo $dados['name'];
					}
					?>"><br><br>

					<label>Nickname: </label>
					<input type="text" name="nickname" id="nickname" placeholder="Your nickname" value="<?php
					if (isset($dados['nickname'])) {
						echo $dados['nickname'];
					}
					?>"><br><br>
					
					<label>Phone #1: </label>
					<input type="tel" pattern = "[0-9]{10}" maxlength=10 name="phone1" id="phone1" value="<?php
					if (isset($dados['phone1'])) {
						echo $dados['phone1'];
					}
					?>"><br><br>
					
					<label>Phone #2: </label>
					<input type="text" name="phone2" id="phone2"  value="<?php
					if (isset($dados['phone2'])) {
						echo $dados['phone2'];
					}
					?>"><br><br>

					<label>Date of Birth: </label>
					<input type="date" name="dob" id="dob" value="<?php
					if (isset($dados['dob'])) {
						echo $dados['dob'];
					}
					?>"><br><br>
					<input type="submit" button type="button" class="btn btn-round btn-success" value="create" name="CreateDriver">
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
