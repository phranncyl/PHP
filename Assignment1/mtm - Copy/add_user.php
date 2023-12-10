<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<?php include ("head.html") ?>


<body>
	<section id="container">
		<?php include "./header.php" ?>
		<?php include "./menu.php" ?>

		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
		<!--main content start-->
		<section id="main-content">
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
		?>
      <section class="wrapper">
		<form method="POST" >
		<div class="row mt">
		<h5></i> <a href="index.php">Settings</a></h5>
				<h5><i class="fa fa-angle-right"></i>Add User</h5>
          <div class="col-lg-12">
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group ">
                    <label for="name" class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="name" name="name" type="text" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">Username</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="username" name="username" type="text" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="password" class="control-label col-lg-2">Password</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="password" name="password" type="password" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="confirm_password" class="control-label col-lg-2">Confirm Password</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="email" name="email" type="email" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Agree to Our Policy</label>
                    <div class="col-lg-10 col-sm-9">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="newsletter" class="control-label col-lg-2 col-sm-3">Receive the Newsletter</label>
                    <div class="col-lg-10 col-sm-9">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="newsletter" name="newsletter" />
                    </div>
                  </div>
                <!--INCLUDE PHOTO-->
                  <label class="control-label">Foto:</label>
						
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">

                 <!-- <img src="<?php $_FILES['file']['name']?>" alt="" /> -->
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  
                  <span class="btn btn-theme02 btn-file">
                  <span class="fileupload-new"><i class="fa fa-paperclip"></i>Selecionar</span>
                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Alterar</span>
                  <input type="file" name="file" id="file" />
                  </span>
                </div>

                  <div class="form-group">
                    <p>
                    <div class="col-lg-offset-0 col-lg-10">
                      <button class="btn btn-theme" type="submit">Save</button>
                      <button class="btn btn-theme04" type="button">Cancel</button>
                    </div>
                  </div>
                  <?php
                  // Include database file
                require 'connection.php';
                // Insert Record in customer table
                if(!empty($_POST)) {
                  $name = $_POST['name'];
                  $username = $_POST['username'];
						    	$email = $_POST['email'];
							    $password = $_POST['password'];
							    $file = $_FILES['file']['name'];
                  $database->create_user($name, $email, $username, $password, $file);
                }

                if(!empty($_POST['file'])) {
                  $file = $database->userphoto();
                  echo ("var file ".$file );
                  print_r($file);
                }
                ?>
                </form>			
		</section>
			<!-- /wrapper -->


	  <!-- js placed at the end of the document so the pages load faster -->
	<?php include "./additional.js" ?>
  <?php include "./javascripts.js" ?>
	</section>		
</section>  
<?php include "./footer.html" ?>


	<!-- js placed at the end of the document so the pages load faster -->
	<?php include "./additional.js" ?>
	<?php include "./javascripts.js" ?>
	<!--custom switch-->
	<script src="lib/bootstrap-switch.js"></script>
	<!--custom tagsinput-->
	<script src="lib/jquery.tagsinput.js"></script>
	<!--custom checkbox & radio-->
	<script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

	<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
	<script src="lib/jquery.scrollTo.min.js"></script>
	<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
        document.addEventListener('DOMContentLoaded', function () {
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('confirm_password');
            var messageDiv = document.getElementById('message');

            function validatePassword() {
                var password = passwordInput.value;
                var confirmPassword = confirmPasswordInput.value;

                if (password.length < 8) {
                    messageDiv.innerHTML = 'Password must be at least 8 characters long.';
                } else if (!/[A-Z]/.test(password)) {
                    messageDiv.innerHTML = 'Password must contain at least one uppercase letter.';
                } else if (!/[a-z]/.test(password)) {
                    messageDiv.innerHTML = 'Password must contain at least one lowercase letter.';
                } else if (!/\d/.test(password)) {
                    messageDiv.innerHTML = 'Password must contain at least one digit.';
                } else if (password !== confirmPassword) {
                    messageDiv.innerHTML = 'Passwords do not match.';
                } else {
                    messageDiv.innerHTML = '';
                }
            }

            passwordInput.addEventListener('input', validatePassword);
            confirmPasswordInput.addEventListener('input', validatePassword);
        });
    </script>


</body>

</html>