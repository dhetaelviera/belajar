<?php

require_once '../includes/DbOperations.php';
$response=array();
if ($_SERVER['REQUEST_METHOD']=='POST') {

	if (isset($_POST['username']) and
		isset($_POST['email']) and
		isset($_POST['password']))
 {
		$db=new DbOperations();
	
		if($db->createUser(
		$_POST['username'],
		$_POST['email'],
		$_POST['password'])){
			$response['error']=false;
			$response['message']="berhasil register";
		} else{
			$response['error']=true;
			$response['message']="ada yg eror. coba lagi.";
		}

	}else{
		$response['error']=true;
		$response['message']="required fills are missing";
	}

}else{
	$response['error']=true;
	$response['message']="invalid request";
}

echo json_encode($response);
exit();