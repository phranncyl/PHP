<?php
// now we will add the value to the title variable and the description variable
$title = "Error Handling & Reusing Code | Page Not Found";
$description = "This is our page that will handle all our 404 errors";
// now we need to add our header template
require './templates/header.php';
?>
<section class="error-masthead">
  <div>
    <h1>Page Not Found</h1>
  </div>
</section>
<section class="row content-row 404-message">
  <div>
    <h2>Well That Is Embarrassing</h2>
    <p>Looks like the page you are trying to view isn't where it should be. 
      Click the button below to return to the homepage</p>
    <a href="index.php" class="oops-link">Go Back</a>
  </div>
</section>
<?php
  require './templates/footer.php';
?>
