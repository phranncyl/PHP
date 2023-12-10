<?php
session_start();
class Login{
function login(){
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Your authentication logic (replace with your actual authentication)
        if ($username === 'francielle' && $password === '123') {
            $_SESSION['username'] = $username;
            setcookie('username', $username, time() + (7 * 24 * 60 * 60), '/');
            header('Location: welcome.php');
            exit();
        } else {
            $_SESSION['errormsg'] = 'Invalid Username or Password';
            echo $_SESSION['errormsg'];
        }
    }

    
}
}
$login = new Login();
?>

