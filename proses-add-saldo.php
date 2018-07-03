<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	$sql = "SELECT user.* FROM user WHERE user.id = $_SESSION[user_id]";
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);
	
	$saldo = mysqli_real_escape_string($koneksi, $_POST['saldo']);
	$saldo = intval($saldo);
	
	$sebelum = $row['saldo'];
	
	$tambah = $sebelum + $saldo;
		
	$sql = "UPDATE user
				SET saldo = '$tambah'
			WHERE id = $_POST[id]";
	mysqli_query($koneksi, $sql);
	header("Location: home.php");
?>