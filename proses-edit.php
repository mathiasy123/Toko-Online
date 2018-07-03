<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	$sql = "SELECT barang.* FROM barang";
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);
	
	$id = $row['id'];
	
	$nama_bar = mysqli_real_escape_string($koneksi, $_POST['n_bar']);
	$harga_bar = mysqli_real_escape_string($koneksi, $_POST['h_bar']);
	$harga_bar = intval($harga_bar);
	
	$foto = $_FILES['f_bar']['name'];
	$ukuran = $_FILES['f_bar']['size'];
	$ext = explode(".", $foto);
	$ext = end($ext);
	$ext = strtolower($ext);
	$ext_boleh = array("jpg", "jpeg", "png", "gif");
	$tujuan = "foto/barang/" . $nama_bar . "." . $ext;
	$sumber = $_FILES['f_bar']['tmp_name'];
	
	if(!empty($foto)){
		if($ukuran <= 5000000 && in_array($ext, $ext_boleh)){
			move_uploaded_file($sumber, $tujuan);
			$sql = "UPDATE barang
						SET nama_bar = '$nama_bar', 
						    foto_bar = '$tujuan', 
							harga_bar = '$harga_bar', 
							user_id = $_SESSION[user_id]
					WHERE id = $_POST[id]";
			mysqli_query($koneksi, $sql);
			header("Location: home.php");
		}else{
			header("Location: edit-user.php?error=edit&id=$id");
		}
	}else{
		$sql2 = "UPDATE barang
					SET nama_bar = '$nama_bar', 
						harga_bar = '$harga_bar', 
						user_id = $_SESSION[user_id]
				WHERE id = $_POST[id]";
		mysqli_query($koneksi, $sql2);
		echo $sql2;
		header("Location: home.php");
	}
	
?>