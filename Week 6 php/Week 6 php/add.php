
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD With PDO | Add Record</title>
  <meta name="description" content="This week we will be building a CREATE and READ CRUD system with PDO">
  <meta name="robots" content="noindex, nofollow">
  <!--  Add our Google fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  <!--  Add our Bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--  Add our custom CSS  -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
  <header>
    <h1>Full CRUD With OOP | Add Record</h1>
  </header>
  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <h2>Insert Data</h2>
          </div>
          <div class="card-body bg-light">
            <form method="POST">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
              </div>
              <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" name="salary" placeholder="Enter Salary" required="">
              </div>
              <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
            </form>
            <?php

                // Include database file
                require 'database.php';
                // Insert Record in customer table
                if(!empty($_POST)) {
                  $name = $_POST['name'];
						    	$email = $_POST['email'];
							    $salary = $_POST['salary'];
							    
                  $customerObj->insertData($name, $email, $salary);
                }

            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>