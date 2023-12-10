<?php

// Inialize session
session_start();

// Include database connection settings
require_once('connection.php');

// Retrieve username and password from database according to user's input
$login = mysqli_query($conn,"SELECT count(*) FROM users WHERE (username = '" . $_POST['username'] . "') and (password = '" . $_POST['password'] . "')");


var_dump($login);
var_dump($dados);

// Check username and password match
if (($login) >0) {
// Set username session variable
$_SESSION['username'] = $_POST['username'];
// Jump to secured page
header('Location: ./login.php');
}
else {
// Jump to login page
echo "ERROR";
header('Location: login.html');

}

?>