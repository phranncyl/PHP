<?php
include_once './connection.php';

if(isset($_GET['delete'])) {
$id_user = $_GET['delete'];

$resultdeleteuser = $database->delete_user($id_user);
	if($resultdeleteuser){
		return true;
	 }
	 else{
	   return false;
	 }

}
?>