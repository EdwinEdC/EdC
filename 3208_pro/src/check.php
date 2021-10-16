<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate ($_POST['uname']);
	$pass = validate ($_POST['password']);
	$name = validate ($_POST['name']);
	$re_pass = validate ($_POST['re_password']);

	$user_data = 'uname='. $uname. '&name='. $name;

	//echo $user_data;
	
	if(empty($uname)){

		header("Location: sign_up.php?error=User Name is required&$user_data");
		exit();
	}else if(empty($pass)){

		header("Location: sign_up.php?error=Password is required&$user_data");
		exit();
	}else if(empty($name)){

		header("Location: sign_up.php?error=Name is required&$user_data");
		exit();
	}else if(empty($re_pass)){

		header("Location: sign_up.php?error=Re-Password is required&$user_data");
		exit();
	}else if($pass !== $re_pass){

		header("Location: sign_up.php?error=Re-Password does not match&$user_data");
		exit();
	}else{

		//a hash function calculates the MD5 hash of strings
		$pass = md5($pass);

		$sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) > 0){
			header("Location: sign_up.php?error=This username is taken by others&$user_data");
			exit();
		}else {
			$sql1 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
			$result1 = mysqli_query($conn, $sql1);
			if($result1){
				header("Location: sign_up.php?success=Your account has been created!");
			exit();
			}else{
				header("Location: sign_up.php?error=Error occurred!&$user_data");
			exit();
			}
		}
	}

}else{
	header("Location: sign_up.php");
	exit();
}