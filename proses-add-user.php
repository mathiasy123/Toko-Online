<?php
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);
	$password = password_hash($password, PASSWORD_BCRYPT);
	
	$foto = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = explode(".", $foto);
	$ext = end($ext);
	$ext = strtolower($ext);
	$ext_boleh = array("jpg", "jpeg", "png", "gif");
	$tujuan = "foto/user/" . $nama . "." . $ext;
	$sumber = $_FILES['foto']['tmp_name'];
	
	if($ukuran <= 5000000 && in_array($ext, $ext_boleh)){
		move_uploaded_file($sumber, $tujuan);
		$sql = "INSERT INTO user (nama, username, password, foto) 
				VALUES ('$nama', '$username', '$password', '$tujuan')";
		mysqli_query($koneksi, $sql);
		header("Location: login.php");
	}else{
		header("Location: add-user.php?error=gagal");
	}
?>