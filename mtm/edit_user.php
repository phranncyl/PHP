<?php
ob_start();
session_start();
require 'connection.php';

// Check if 'id_user' is provided in the query parameters
if (!empty($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $user = $database->list_user($id_user);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include("head.html") ?>

<body>
    <section id="container">
        <?php include "./header.php" ?>
        <?php include "./menu.php" ?>

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mt">
                        <h5><a href="index.php">Settings</a></h5>
                        <h5><i class="fa fa-angle-right"></i>Add User</h5>
                        <div class="col-lg-12">
                            <div class="form-panel">
                                <div class="form">
                                        <div class="image-container">
                                            <img src='<?php echo ($user['dir_photo']); ?>' alt="User Photo" width="100px" height="100px" id="userPhoto">
                                        </div>
                                        <div class=""> <input type="file" class="form-control" name="dir_photo"
                                                    value="<?php echo ($user['dir_photo']); ?>">
                                        </div>
                                        <div class="form-group ">
                                            <label for="name" class="control-label col-lg-2">Name</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="name"
                                                    value="<?php echo ($user['name']); ?>" required="">
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='username' class='control-label col-lg-2'>Username</label>
                                            <div class='col-lg-10'>
                                                <input class='form-control' id='username' name='username' type='text'
                                                    value="<?php echo ($user['username']); ?>" />
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='password' class='control-label col-lg-2'>Password</label>
                                            <div class='col-lg-10'>
                                                <input class='form-control' id='password' name='password'
                                                    type='password' value="<?php echo ($user['password']); ?>" />
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='email' class='control-label col-lg-2'>Email</label>
                                            <div class='col-lg-10'>
                                                <input class='form-control' id='email' name='email' type='email'
                                                    value="<?php echo ($user['email']); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"> Date of Birth</label>
                                            <div class="col-md-4">
                                                <div class="input-group date form_datetime-component">
                                                <input class='form-control' id='date' name='birth_date' type='date'
                                                    value="<?php echo ($user['birth_date']); ?>"/>
                                                
                                                </div>
                                            </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <input type="hidden" name="id_user"
                                                    value="<?php echo $user['id_user']; ?>">

                                            </div>
                                        </div>
                                        

                                        <?php
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
                                                $dir_photo = $user['dir_photo'];
                                            }
                                        
                                            // Form processing logic
                                            $id_user = $_POST['id_user'];
                                            $name = $_POST['name'];
                                            $email = $_POST['email'];
                                            $username = $_POST['username'];
                                            $password = $_POST['password'];
                                            if($_POST['birth_date']==''){
                                                $birth_date = date("Y-m-d");
                                            } else {
                                                $birth_date = $_POST['birth_date'];   
                                            }
                                            
                                            
                                            $database->update_user($id_user, $name, $username, $email, $password, $dir_photo,$birth_date);
                                        
                                            // Redirect after processing
                                            header("Location: list_user.php");
                                            exit;
                                        }

                                        ?>

                                        

                                        <div class="form-group">
                                            <p>
                                                <div class="col-lg-offset-0 col-lg-10">
                                                    <button class="btn btn-theme" type="submit" name="update"
                                                        value="update">Save</button>
                                                    <button class="btn btn-theme04" type="button"><a
                                                            href='list_user.php' style='color:white'>Cancel</a></button>
                                                </div>
                                        </p>
                                        </div>

                                </div>
                            </div>
                        </div>
                </form>
            </section>
            <!-- /wrapper -->

            <!-- js placed at the end of the document so the pages load faster -->
            
            <?php include "./javascripts.js" ?>
        </section>
        <?php include "./footer.html" ?>

</body>

</html>