<?php
  // To save some time we are going to create a class to hold the database connection information.
  // As mentioned in the PDF we will define our class using the class keyword followed by the name of our class.
  class Database{
    // A private keyword, as the name suggests is the one that can only be accessed from within the class in which it is defined. All the keywords are by default under the public category unless they are specified as private or protected.
    private $connection;
    function __construct(){
      // In PHP, $this keyword references the current object of the class. The $this keyword allows you to access the properties and methods of the current object within the class using the object operator
      $this->connect_db();
    }
    // The public access modifier allows you to access properties and methods from both inside and outside of the class.
    public function connect_db(){
      $this->connection = mysqli_connect('sql.freedb.tech', 'freedb_phrann', 'Ux$GY&N6GS4pnKH', 'freedb_FranDb');
      if(mysqli_connect_error()){
        die("Database Connection Failed" . mysqli_connect_error());
      }
    }
    public function create($fname,$lname,$age,$email){
      $sql = "INSERT INTO phpPerson (fname, lname, age, email) VALUES ('$fname', '$lname', '$age', '$email')";
      $res = mysqli_query($this->connection, $sql);
      if($res){
	 		    return true;
		  }
      else{
			    return false;
		  }
    }
    public function read(){
		    $sql = "SELECT * FROM phpPerson";
 		    $res = mysqli_query($this->connection, $sql);
 		    return $res;
	  }
    
  }
  $database = new Database();
?>
