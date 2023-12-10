<?php
include('protect.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/cat.png" type="image/png">
    <title>Geek's Gossip</title>
</head>

<body>
    <header>
    <div class="logo-container">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="header logo"></a>
        <h1>Geek's View</h1>
    </div>
    <p class="welcome"> Welcome to the view page, <?php echo $_SESSION['firstname']; ?>. </p>

    <a href="logout.php">Logout</a>

    <main class="container">
        <div class="table-container">
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Profile Picture</th>
                </tr>
        <?php
        include("connection.php");
    
        $result = $database -> list_user();
    
    while($r = mysqli_fetch_assoc($result)){
        
    ?>
    <tr>
        <td><?php echo $r['firstname']; ?></td>
        <td><?php echo $r['lastname']; ?></td>
        <td><?php echo $r['username']; ?></td>
        <td><?php echo $r['password']; ?></td>
        <td><img src= <?php echo 'uploads/'.$r['profilePicture']?>; alt="" width="50" height="50">  </td>
        <td><a href="edit.php?id=<?php echo $r['id']; ?>">Edit</a></td>
        <td><a href="delete.php?id=<?php echo $r['id']; ?>">Delete</a></td>
    </tr>

    <?php
    }
?>
            </table>
        </div>
      </main>
</p>
</html>
