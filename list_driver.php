<?php
include_once './connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.php" ?>
  <?php include "./menu.php" ?>
   
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> View Drivers</h3>
        <div class="row mt">
			<div class="col-sm-5 col-md-8"></div>
            </div>
			<a href='create_driver.php'><button type="button" class="btn btn-round btn-success">Novo</button> </a> 
		
			<table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-hashtag"></i> ID</th>
                    <th ><i class="fa fa-pencil"></i> Name</th>
                    <th><i class="fa fa-smile-o"></i> Nickname</th>
					 <th><i class="fa fa-phone"></i> Phone 1 </th>
					 <th><i class="fa fa-phone"></i> Phone 2 </th>
					 <th><i class="fa fa-birthday-cake"></i> DOB </th>
					 <th><i class="fa fa-bookmark"></i> Status </th>
                    <th></th>
                  </tr>
                </thead>
				<tbody>
	
		  <div class="col-lg-12">
            
			<?php
			
			$result_driver   = $database->list_driver();
			while($row_driver = mysqli_fetch_assoc($result_driver)){
				echo "<tr>";
				echo "<td>" . $row_driver['id_driver'] . "</td>";
				echo "<td>" .  $row_driver['name'] . "</td>";
				echo "<td>" .  $row_driver['nickname'] . "</td>";
				echo "<td>" . $row_driver['phone1'] . "</td>";
				echo "<td>" .  $row_driver['phone2'] . "</td>";
				echo "<td>" .  $row_driver['birth_date'] . "</td>";
				if ($row_driver['status'] == 'A'){
					echo "<td  class='status-green' > <i class='fa fa-check-circle'></i>";
				}else {
					echo "<td  class='status-red'> <i class='fa fa-times-circle'></i>";
				}
				
				//echo "<div class='col-md-1'><a href='edit_driver.php?id=" . $row_user['id_user'] . "' style = 'color:white'> <button type='button' class='btn btn-info'>Editar</a> </div>";
				//echo "<div class='col-md-1'><a href='delete_driver.php?id=" . $row_user['id_user'] . "'  style = 'color:white'> <button type='button' class='btn btn-danger'>Apagar</a> </div>";
				echo "</tr>";
			}
			
		?>	
		
		</tbody>
		</table>	
		 </div>
		 </div>
      </section>
      <!-- /wrapper -->
    </section>
 	<?php include "./footer.html" ?>
  </section>
  

</body>

</html>
