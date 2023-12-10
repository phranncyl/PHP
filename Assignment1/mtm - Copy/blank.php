<?php
session_start();
ob_start();
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

	<?php include "./bootstrap.js" ?>

</head>

<body>
  <section id="container">
  <?php include "./header.html" ?>
  <?php include "./menu.html" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Blank Page</h3>
        <div class="row mt">
          <div class="col-lg-12">
            
		
		
		
		
		
		
		
		
		
		
    <!--main content start-->
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
 
 	<?php include "./footer.html" ?>
	

  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include "./additional.js" ?>
  <?php include "./javascripts.js" ?>

</body>

</html>
