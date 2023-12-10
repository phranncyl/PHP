<?php
  // add our variables for title and description
  $title = "About Lesson | Handling Errors";
  $description = "This page will contain examples of how to handle errors";
  require 'templates/header.php';
?>
<main>
  <section class="masthead about-masthead">
    <div>
      <h1>Error Handling</h1>
    </div>
  </section>
  <section class="row content-row">
    <div class="col-12">
      <h2>Let's Handle Some Errors!</h2>
    </div>
    <div class="col-12">
      <div>
        <?php
          // $numberA = 0;
          // echo "<p>";
          //   echo 2 / $numberA;
          // echo "</p>";
        ?>
      </div>
      <div>
        <?php
        // $numberB = 0;
        // if ($numberB != 0) {
        //   echo 2 / $numberB;
        // } else {
        //   echo "<p>cannot divide by zero (0)</p>";
        // }
        ?>
      </div>
      <div>
        <?php
        // function my_error_handler()
        // {
        //   echo "<p>Opps, something went wrong:</p>";
          
        // }
        // set_error_handler("my_error_handler");
        // echo "<p>";
        //   echo (5 / 0);
        // echo "</p>";
        
        ?>
      </div>
      <div>
        <!-- <p>Next let's catch the error for a variable that has yet  -->
          <!-- to be defined!</p> -->
        <?php
        /* User-defined error handling function */
          // function customErrorHandle($errorNo, $errorMessage, $errorFile, $errorLine) {
          //   echo "<p>Error Message: [$errorNo] $errorMessage</p>";
          //  // echo "<p>Error on line $errorLine in $errorFile</p>";
          // }
          // /* set_error_handler() function is a built-in error 
          // handler function that sets the error handler function 
          // defined by the user. */
          // set_error_handler("customErrorHandle");
          // // $hello="hi";
          // echo "<p>";
          // echo $hello;
          // echo "</p>";
        ?>

        <?php
        //create function with an exception
        function checkDivisor($dividend, $divisor) {
          if($divisor==0) {
            throw new Exception("DivideByZeroException");
          }
          else{
            $result = $dividend / $divisor;  
            echo "Result of division = $result </br>";  
          }
         
        }

        
        //trigger exception in a "try" block
        try {
         checkDivisor(3,0);
          //If the exception is thrown, this text will not be shown
        }

        //catch exception
        catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
        }
        ?>
      </div>
    </div>
  </section>
</main>
<?php
  require './templates/footer.php';
?>
