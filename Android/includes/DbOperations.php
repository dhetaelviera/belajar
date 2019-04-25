<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class DbOperations
{
	private $con;
	function __construct (){
		require_once dirname(__FILE__).'/DbConnect.php';
		$db=new DbConnect();
		$this->con=$db->connect();

	}

	/*create*/

	function createUser($username,$email,$password){
		$pass=md5($password);
		$sql="INSERT INTO users VALUES (NULL,?, ?, ?);";
		if ($stmt=$this->con->prepare($sql)) {
		$stmt->bind_param('sss',$username,$email,$pass);
		$stmt->execute();
		} else{
			 $error = $this->con->errno . ' ' . $this->con->error;
   			 echo $error; // 
		}
	}
}