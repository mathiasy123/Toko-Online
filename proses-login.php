<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");

	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);
	
	$sql = "SELECT * FROM user WHERE username = '$username'";
	$hasil = mysqli_query($koneksi, $sql);
	
	if($row = mysqli_fetch_assoc($hasil)){
		if(password_verify($password, $row['password'])){
			$_SESSION['user_id'] = $row['id'];
			header("Location: home.php");
		}else{
			header("Location: login.php?error=password");
		}
	}else{
		header("Location: login.php?error=user");
	}
?>