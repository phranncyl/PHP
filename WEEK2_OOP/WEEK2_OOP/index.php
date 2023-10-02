<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD in OOP PHP | Create</title>
	<meta name="description" content="This week we will be using OOP PHP to create our CRUD application">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/style.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/php-logo.png" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">View</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
	<section class="masthead">
		<div>
			<h1>CRUD with OOP PHP</h1>
		</div>
	</section>
  <main class="container">
	   <section class="form-row row justify-content-center">
		     <form method="post">
					 <h2>Create User</h2>
					 <div>
						 <label for="fname" >First Name</label>
                   <input type="text" name="fname" id="fname">
					 </div>
					 <div>
						 <label for="lname" >Last Name</label>
                   <input type="text" name="lname" id="lname">
					 </div>
					 <div>
						 <input type="submit" value="Submit">
					 </div>
		     </form>

           <?php
					 	require_once('database.php');
						if(!empty($_POST)){

							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							
							$res = $database->create($fname, $lname);
							if(!$res){
								echo "<p>Failed to insert data</p>";
							}
						}
			?>
        </div>
      </section>
     </main>
   </body>
</html>
