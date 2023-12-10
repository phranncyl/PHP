<aside>
  <div id="sidebar" class="nav-collapse">
    <ul class="sidebar-menu" id="nav-accordion">
      <?php echo("<p class='centered'><a href='edit_user.php?id_user=".$_SESSION['user_id']."'><img src='".$_SESSION['dir']."'class='img-circle' width='80' alt=''></a></p>") ?>
      <p class="centered"><?php echo ($_SESSION['Nameuser']);?></a></p> 
      <p class="centered"><?php echo ($_SESSION['username']);?></a></p> 
      <h5 class='centered'></h5>

      <li class="mt">
        <a class="active" href="index.php">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="sub-menu">
        <a data-toggle="collapse" data-target="#settings" href="#">
          <i class="fa fa-cogs"></i>
          <span>Settings</span>
          <i class="fa fa-angle-down"></i>
        </a>
        <ul class="sub collapse" id="settings">
          <li><a href="list_user.php">Users</a></li>
          <li><a href="404.html">Drivers</a></li>
          <li><a href="404.html">Regions</a></li>
          <li><a href="404.html">Values</a></li>
        </ul>
      </li>

      <li class="sub-menu">
        <a data-toggle="collapse" data-target="#trips" href="#">
          <i class="fa fa-desktop"></i>
          <span>Trips</span>
          <i class="fa fa-angle-down"></i>
        </a>
        <ul class="sub collapse" id="trips">
          <li><a href="404.html">List of trips</a></li>
        </ul>
      </li>
    </ul>
  </div>
</aside>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
