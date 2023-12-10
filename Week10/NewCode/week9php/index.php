<?php
  // now we will add the value to the title variable and 
  //the description variable
  $title = "Error Handling & Reusing Code | Reusing Code";
  $description = "On this page we will look at how to reuse code.";
  // now we need to add our header template
  require 'templates/header.php';
?>
    <main>
      <section class="masthead">
        <div>
          <h1>Reusing Code</h1>
        </div>
      </section>
      <!-- this is just filler content -->
      <section class="row content-row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <h2>PDO: PHP Data Objects</h2>
          <p>PDO is a database access layer that provides a fast and consistent interface for accessing and managing databases in PHP applications. </p>
          <p>It simplifies the database operations including:
            <ul>
              <li>Creating database connection</li>
              <li>Executing queries</li>
              <li>Handling errors</li>
              <li>Closing the database connections</li>
            </ul>
          </p>
        </div>
      </section>
      <!-- our next section will contain our call to action 
      (cta.php) -->
      <?php
        // I am using an include because I don't want the page to 
        //fail to load if the cta template is not found for some 
        //reason.
        include 'templates/cta.php';
      ?>
    </main>
<?php
  // add our footer template
  require 'templates/footer.php';

/*The only difference is that the include() statement generates 
a PHP alert but allows script execution to proceed if the file 
to be included cannot be found. At the same time, 
the require() statement generates a fatal error and terminates 
the script.*/
?>