    <aside>
      <div id="sidebar" class="nav-collapse">

        <ul class="sidebar-menu" id="nav-accordion">
        <?php echo("<p class='centered'><a href='profile.html'><img src=''class='img-circle' width='80'></a></p>") ?>
        <p class="centered"><?php echo ($_SESSION['Nameuser']);?></a></p> 
        <p class="centered"><?php echo ($_SESSION['username']);?></a></p> 
		  <h5 class='centered'>	</h5> 
		  
		 
          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span >Settings</span>
              <i class="fa fa-down"></i>
              </a>
            <ul class="sub">
              <li><a href="list_user.php">Users</a></li>
              <li><a href="404.html">Drivers</a></li>
              <li><a href="404.html">Regions</a></li>
              <li><a href="404.html">Values</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Trips</span>
              </a>
            <ul class="sub">
              <li><a href="404.html">List of trips</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </aside>
