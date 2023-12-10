<?php
class Database{
	
    // A private keyword, as the name suggests is the one that can only be accessed from within the class in which it is defined. All the keywords are by default under the public category unless they are specified as private or protected.
    public $connection;
    function __construct(){
      // In PHP, $this keyword references the current object of the class. The $this keyword allows you to access the properties and methods of the current object within the class using the object operator
      $this->connect_db();
    }
    // The public access modifier allows you to access properties and methods from both inside and outside of the class.
    public function connect_db(){
      $this->connection = mysqli_connect('localhost', 'root', 'toor', 'project_php');
      if(mysqli_connect_error()){
        die("Database Connection Failed" . mysqli_connect_error());
      }
    }

	public function list_user(){

		$sql = "SELECT * FROM users;";
		$resultlistuser = mysqli_query($this->connection, $sql);
		return $resultlistuser;
	  }

    public function create_user($name,$email,$password, $status){
	
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ENCODED);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		

		$sql = "insert into users(name, email, password, status) values ('".$name."', '".$email."', '".$password."','".$status."');";
		$resultcreateuser = mysqli_query($this->connection, $sql);
			//var_dump($result);
			if($resultcreateuser){
				return true;	
			 }
			 else{
			   return false;
			 }

	}
	

	public function list_driver(){

		$sql = "SELECT * FROM drivers;";
		$resultlistdriver = mysqli_query($this->connection, $sql);
		return $resultlistdriver;
	  }

    public function create_driver($name,$nickname,$phone1,$phone2, $dob, $status){
	
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_ENCODED);
		$phone1 = filter_input(INPUT_POST, 'phone1', FILTER_SANITIZE_EMAIL);
		$phone2 = filter_input(INPUT_POST, 'phone2', FILTER_SANITIZE_EMAIL);
		$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_EMAIL);
		

		$sql = "insert into drivers(name, nickname, phone1, phone2, birth_date, status) values ('".$name."', '".$nickname."', '".$phone1."','".$phone2."','".$dob."','".$status."');";
		$resultcreatedriver = mysqli_query($this->connection, $sql);
			//var_dump($result);
			if($resultcreatedriver){
				return true;	
			 }
			 else{
			   return false;
			 }
		}

	public function delete_user($id_user){
		$sql = "delete from users where id_user = ".$id_user.";";
		$resultdeleteuser = mysqli_query($this->connection, $sql);
	//var_dump($result);
		if($resultdeleteuser){
			echo('OK');
			header("Location: list_user.php");	
	 }
	 else{
	   return false;
	 }
	}


}
$database = new Database();
?>