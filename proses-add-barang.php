<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	$nama_bar = mysqli_real_escape_string($koneksi, $_POST['nama_bar']);
	$harga_bar = mysqli_real_escape_string($koneksi, $_POST['harga_bar']);
	$harga_bar = intval($harga_bar);
	
	$foto = $_FILES['foto_bar']['name'];
	$ukuran = $_FILES['foto_bar']['size'];
	$ext = explode(".", $foto);
	$ext = end($ext);
	$ext = strtolower($ext);
	$ext_boleh = array("jpg", "jpeg", "png", "gif");
	$tujuan = "foto/barang/" . $nama_bar . "." . $ext;
	$sumber = $_FILES['foto_bar']['tmp_name'];
	
	if($ukuran <= 5000000 && in_array($ext, $ext_boleh)){
		move_uploaded_file($sumber, $tujuan);
		$sql = "INSERT INTO barang (nama_bar, foto_bar, harga_bar, user_id) 
				VALUES ('$nama_bar', '$tujuan', '$harga_bar', $_SESSION[user_id])";
		mysqli_query($koneksi, $sql);
		header("Location: home.php");
	}else{
		header("Location: add-barang.php?error=gagal");
	}
?>