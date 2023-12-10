<?php
    include "login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login Page</h2>
    <form name="frmLogin" action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <button type="submit" name="submit">Login</button>
    </form>
    <div>
        <?php if (isset($_POST['username'])){
            $login->Login();
        }
        ?>
    </div>
</body>
</html>
