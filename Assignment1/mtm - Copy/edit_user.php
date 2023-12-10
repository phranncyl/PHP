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
                <form method="POST">
                    <div class="row mt">
                        <h5><a href="index.php">Settings</a></h5>
                        <h5><i class="fa fa-angle-right"></i>Add User</h5>
                        <div class="col-lg-12">
                            <div class="form-panel">
                                <div class="form">
                                    <form class="cmxform form-horizontal style-form" id="signupForm" method="POST" enctype="multipart/form-data"
                                        action="">
                                        <div class="form-group ">
                                            <label for="name" class="control-label col-lg-2">Name</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="name"
                                                    value="<?php echo $user['name']; ?>" required="">
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='username' class='control-label col-lg-2'>Username</label>
                                            <div class='col-lg-10'>
                                                <input class='form-control' id='username' name='username' type='text'
                                                    value="<?php echo $user['username']; ?>" />
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='password' class='control-label col-lg-2'>Password</label>
                                            <div class='col-lg-10'>
                                                <input class='form-control' id='password' name='password'
                                                    type='password' value="<?php echo $user['password']; ?>" />
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='email' class='control-label col-lg-2'>Email</label>
                                            <div class='col-lg-10'>
                                                <input class='form-control' id='email' name='email' type='email'
                                                    value="<?php echo $user['email']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <input type="hidden" name="id_user"
                                                    value="<?php echo $user['id_user']; ?>">

                                            </div>
                                        </div>

                                        <?php
                                        if (!empty($_POST['id_user'])) {
                                            $id_user = $_POST['id_user'];
                                            $name = $_POST['name'];
                                            $username = $_POST['username'];
                                            $email = $_POST['email'];
                                            $password = $_POST['password'];
                                            $dir = "img/portfolio/".$_POST['file'];
                                            echo ("file: ". $dir);
                                            $photo= $database->userphoto();
                                            $userupdate = $database->update_user($id_user, $name, $username, $email,
                                                $password, $dir);
                                        }
                                        ?>

                                        <!--INCLUDE PHOTO-->
                                        <label class="control-label">Foto:</label>
                                                <!-- <img src="<?php $_FILES['file']['name']?>" alt="" /> -->
                                            </div>
                                            
                                            <span class="btn btn-theme02 btn-file">
                                            <input type="file" name="file" id="file" /><span class="fileupload-exists"><i class="fa fa-undo"></i>
                                                    Alterar</span>
                                               
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <p>
                                                <div class="col-lg-offset-0 col-lg-10">
                                                    <button class="btn btn-theme" type="submit" name="update"
                                                        value="update">Save</button>
                                                    <button class="btn btn-theme04" type="button"><a
                                                            href='list_user.php' style='color:white'>Cancel</a></button>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </form>
            </section>
            <!-- /wrapper -->

            <!-- js placed at the end of the document so the pages load faster -->
            <?php include "./additional.js" ?>
            <?php include "./javascripts.js" ?>
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

        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="lib/jquery.scrollTo.min.js"></script>
        <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myDIV *").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    }).not($(this)).removeClass("btn");
                });
            });
        </script>

</body>

</html>