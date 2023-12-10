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
		<form method="POST" enctype="multipart/form-data">
		<div class="row mt">
		<h5></i> <a href="index.php">Settings</a></h5>
				<h5><i class="fa fa-angle-right"></i>Add User</h5>
          <div class="col-lg-12">
            <div class="form-panel">
              <div class="form">

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
                  
                <!--INCLUDE PHOTO-->
                  <input type="file" name="dir_photo" class="form-control" id="dir_photo">
                  <div class="form-group">
                    <label class="control-label col-md-3"> Date of Birth</label>
                    <div class="col-md-4">
                        <div class="input-group date form_datetime-component">
                        <input class='form-control' id='date' name='birth_date' type='date'
                            value="" required/>
                        
                        </div>
                    </div>
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
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  // File upload logic
                  if (isset($_FILES["dir_photo"]) && $_FILES["dir_photo"]["error"] == 0 && !empty($_FILES["dir_photo"]["tmp_name"])) {
                      $dir_photo = "img/";
                      
                      if (!is_dir($dir_photo)) {
                          mkdir($dir_photo, 0777, true);
                      }
                      
                      $fileName = basename($_FILES["dir_photo"]["name"]);
                      $targetpathfile = $dir_photo . $fileName;
                      
                      if (move_uploaded_file($_FILES["dir_photo"]["tmp_name"], $targetpathfile)) {
                          $dir_photo = $targetpathfile;
                          // Additional logic if needed
                      }
                  } else {
                    $dir_photo = 'img/profile.jpg';
                  }
                    $name = $_POST['name'];
                    $email= $_POST['email'];
                    $username= $_POST['username'];
                    $password= $_POST['password'];
                    //$dir_photo = $_POST['dir_photo'];
                    $birth_date = $_POST['birth_date'];
                    $database->create_user($name, $email, $username, $password, $dir_photo, $birth_date);
                    
                  }
              
                ?>
                </form>			
		</section>
			<!-- /wrapper -->


	  <!-- js placed at the end of the document so the pages load faster -->
	
  <?php include "./javascripts.js" ?>
	</section>		
</section>  
<?php include "./footer.html" ?>


	<!-- js placed at the end of the document so the pages load faster -->
	
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