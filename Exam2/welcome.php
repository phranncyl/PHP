<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
} 
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <em><?php echo($username)?></em></h1>
</body>
</html>


