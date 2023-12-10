<?php
include_once './connection.php';

if(isset($_GET['delete'])) {
	$id_user = $_GET['delete'];
	
	$resultdeleteuser = $database->delete_user($id_user);
	}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.php" ?>
  <?php include "./menu.php" ?>
   
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> View Users</h3>
        <div class="row mt">
			<div class="col-sm-5 col-md-8"></div>
            </div>
			<a href='create_user.php'><button type="button" class="btn btn-round btn-success">Novo</button> </a> 
		
			<table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-hashtag"></i> ID</th>
                    <th ><i class="fa fa-pencil"></i> Name</th>
                    <th><i class="fa fa-envelope"></i> Email</th>
					 <th><i class="fa fa-bookmark"></i> Status </th>
                    <th></th>
                  </tr>
                </thead>
				<tbody>
	
		  <div class="col-lg-12">
            
			<?php

			$result_users   = $database->list_user();
			while($row_user = mysqli_fetch_assoc($result_users)){
				echo "<tr>";
				echo "<td>" . $row_user['id_user'] . "</td>";
				echo "<td>" . $row_user['name'] . "</td>";
				echo "<td>" . $row_user['email'] . "</td>";
				if ($row_user['status'] == 'A'){
					echo "<td  class='status-green' > <i class='fa fa-check-circle'></i> </td>";
				}else {
					echo "<td  class='status-red'> <i class='fa fa-times-circle'></i></td>";
				}
				
				echo "<td><a href='edit_user.php?id=" . $row_user['id_user'] . "' style = 'color:white'> <button type='button' class='btn btn-info'>Edit</a> </td>";
				echo "<td><a href=list_user.php?delete=" . $row_user['id_user'] ." onclick=return confirm('Are you sure?'); return false;><button type='submit'class='btn btn-danger'>Delete </a></td>";
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