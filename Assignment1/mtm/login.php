<?php
session_start();
include("connection.php");

// Check if the login form is submitted
if (!empty ($_POST)){
    if (!empty($_POST['username'])) {

            $result = $database->login($_POST['username'], $_POST['password']);
        
    } elseif (!empty($_POST['new_username'] && $_POST['new_password'])) {
        $newUsername = $_POST['new_username'];
        $newPassword = $_POST['new_password'];
        $newEmail = $_POST['new_email'];
        $newName = $_POST['new_name'];

        // Perform registration logic, for example, you might call a function in your database class
        $database->create_user($newName, $newEmail, $newUsername, $newPassword, null);
        // For this example, let's just print a message
        echo "Registration successful for user: $newUsername";
        header("Location:index.php");
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "./head.html" ?>

<body>

    <div id="login-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form class="form-login" id="login" method="POST" action="">
                        <h2 class="form-login-heading">Login</h2>
                        <div class="login-wrap">

                            <label for="text" class="sr-only">Email</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Username" autofocus>
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" required>
                            <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Log
                                in</button>
                        </div>
                        <p class="text-center text-danger">
                         <?php if (isset($_SESSION['msg_login'])) {
                            echo $_SESSION['msg_login'];
                            unset($_SESSION['msg_login']);
                            }
                        ?>
                    </form>
                </div>

                <div class="col-md-6">
                    <form class="form-signin" id="register" method="POST" action="">
                        <h2 class="form-login-heading">Sign-Up</h2>
                        <div class="login-wrap">
                            <label for="new_name" class="sr-only">New Username</label>
                            <input type="text" name="new_name" id="new_name" class="form-control"
                                placeholder="Your Name" required>
                            <label for="new_username" class="sr-only">New Username</label>
                            <input type="text" name="new_username" id="new_username" class="form-control"
                                placeholder="Your Username" required>
                            <label for="new_email" class="sr-only">New Username</label>
                            <input type="email" name="new_email" id="new_email" class="form-control"
                                placeholder="your@email.com" required>
                            <label for="new_password" class="sr-only">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control"
                                placeholder="New Password" required>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register
                            </button>
                        </div>
                        <p class="text-center text-danger">
                         <?php if (isset($_SESSION['msg_create'])) {
                            echo $_SESSION['msg_create'];
                            unset($_SESSION['msg_create']);
                            }
                        ?>
            </p>
                    </form>
                </div>
            </div>

            <p class="text-center text-success">
                <?php
                if (isset($_SESSION['loginlogoff'])) {
                    echo $_SESSION['loginlogoff'];
                    unset($_SESSION['loginlogoff']);
                }
                ?>
            </p>
        </div> <!-- /container -->
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>

</body>

</html>
