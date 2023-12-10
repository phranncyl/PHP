<?php
ob_start();

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
      $this->connection = mysqli_connect('localhost', 'root', 'toor', 'mtm');
      if(mysqli_connect_error()){
        die("Database Connection Failed" . mysqli_connect_error());
      }
    }

    public function userphoto()
    {
    // Get file details
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];

    // Define allowed file extensions
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    // Extract file extension
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Check if the file extension is allowed
    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            // Generate a new unique file name
            $fileNameNew = 'profile' . uniqid('', true) . '.' . $fileExt;

            // Define the file destination path
            $fileDestination = 'img/portfolio/' . $fileNameNew;
            if (file_exists($fileDestination)) {
              echo '<img src="' . $fileDestination . '" alt="" />';
           }

            // Move the uploaded file to the destination
            move_uploaded_file($fileTmpName, $fileDestination);
              if (move_uploaded_file($fileTmpName, $fileDestination)) {
                echo "File uploaded successfully.";
              } else {
                  echo "Error moving file to destination.";
              }

            // Return the file destination
            return $fileDestination;
        } else {
            // Display error message if file upload has an error
            echo "Error uploading file. Error code: $fileError";
        }
    } else {
        // Display error message if file extension is not allowed
        echo "Invalid file type. Allowed types: " . implode(', ', $allowed);
    }

    // Return null if there is an error
    return null;
}
    public function create_user($name, $email, $username, $password, $dir_photo){
      $dir_photo = $this->userphoto();

      $sql = "INSERT INTO users (name, email, username, password, dir_photo,status, update_date) VALUES ('$name', '$email', '$username', '$password', '$dir_photo', 'A', now())";
      $res = mysqli_query($this->connection, $sql);

      if($res){
		      $_SESSION['msg_create'] = "<p style='color:green;'>User created successfully</p>";
          header("Location: list_user.php");
		  }
      else{
        $_SESSION['msg_create'] = "<p style='color:red;'>Check data and try again</p>";
        header("Location:list_user.php?msg");
			  //  return false;
		  }

    }



    public function update_user($id_user, $name, $username, $email, $password, $dir_photo){
      $sql = "UPDATE users SET name = '$name', email = '$email', password = '$password', username = '$username', dir_photo = '$dir_photo' WHERE id_user = $id_user;";
      $res = mysqli_query($this->connection, $sql);
  
      if ($res) {
          $_SESSION['msg'] = "<p style='color:green;'>User updated  successfully</p>";
          header("Location:list_user.php?msg");
                  //return true;
      } else {
          return false;
      }
  }

  public function delete_user($id_user){
    $sql = "DELETE FROM  users WHERE id_user = $id_user;";
    $res = mysqli_query($this->connection, $sql);

    if ($res) {
        $_SESSION['msg'] = "<p style='color:yellow;'>User deleted successfully</p>";
        header("Location:list_user.php?msg");
                //return true;
    } else {
        return false;
    }
}

public function list_user($id_user = null) {
  if ($id_user === null) {
      $sql = "SELECT * FROM users ORDER BY id_user";
      $result = mysqli_query($this->connection, $sql);

      if ($result->num_rows >= 1) {
          $data = array();
          while ($row = $result->fetch_assoc()) {
             $data[] = $row;
          }
          return $data;
      } else {
          // Return an empty array when no records are found
          return array();
      }
  } else {
      $sql = "SELECT * FROM users WHERE id_user=$id_user ORDER BY id_user";
      $result = mysqli_query($this->connection, $sql);

      if ($result->num_rows == 1) {
          $row = $result->fetch_assoc();
          return $row;
      } else {
          return $result;
      }
  }
}

	  public function list_user_pages(){
		$sql = "SELECT COUNT(id_user) AS num_result FROM users";
		 $res = mysqli_query($this->connection, $sql);
		 return $res;
		 if($res){
			return true;
	 }
 else{
		   return false;
	 }
  }
    
public function login($username, $password){
  $query = "SELECT * FROM users WHERE (username = '" . $username. "') and (password = '" . $password . "') ORDER BY id_user;";
  $login = mysqli_query($this->connection,$query);
    if ($login->num_rows == 1) {
        $loginuser = $login->fetch_assoc();
       

        // Use password_verify to check hashed passwords
        if (($password== $loginuser['password']) && ($username==$loginuser['username'])) {
            // Passwords match, set session variables or perform other actions as needed
            $_SESSION['user_id'] = $loginuser['id_user'];
            $_SESSION['username'] = $loginuser['username'];
            $_SESSION['Nameuser'] = $loginuser['name'];
            $_SESSION['dir'] = $loginuser['dir_photo'];
            header("Location:index.php");
            return true;
        } else {
            $_SESSION['msg_login'] = "<p style='color:red;text-align:center;'>User and/or Password not match</p>";
            return false;
        }
    } else {
        $_SESSION['msg_login'] = "<p style='color:red;text-align:center;'>User not found</p>";
        return false;
    }
}

public  function  logout(){
  $_SESSION['user_id'] = '';
  $_SESSION['username'] ='';

  header("Location:login.php");
  return null;
 
  }
}

  $database = new Database();