<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	$sql = "SELECT barang.* FROM barang";
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);
	
	$sql2 = "SELECT user.* FROM user WHERE user.id = $_SESSION[user_id]";
	$hasil2 = mysqli_query($koneksi, $sql2);
	$row2 = mysqli_fetch_assoc($hasil2);
	
	$id = $row['id'];
	
	$harga_bar = $row['harga_bar'];
		
	$saldo = $row2['saldo'];
	
	if($saldo <= $harga_bar){
		header("Location: beli.php?error=saldo&id=$id");
	}else{
		$beli = $saldo - $harga_bar;
		$sql3 = "DELETE FROM barang WHERE id = $_POST[id]";
		mysqli_query($koneksi, $sql3);
			
		$sql4 = "UPDATE user
					SET saldo = $beli
				 WHERE user.id = $_SESSION[user_id]";
		mysqli_query($koneksi, $sql4);
		header("Location: home.php");
	}
?>