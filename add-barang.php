<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	if(!isset($_SESSION['user_id'])){
		header("Location: login.php");
	}
?>

<h3>Tambah Barang</h3>
<?php 
if(isset($_GET['error']) && $_GET['error'] == 'gagal'){
	echo "<p style='color: red;'>Tambah barang gagal, data harus diisi dengan tepat dna benar, silahkan coba lagi</p>";
}
?>
<p style="color: red;">*Data harus diisi semua</p>
<form action="proses-add-barang.php" method="post" enctype="multipart/form-data">
	<fieldset style="width: 0px;">
		<legend>Form Tambah Barang Penjualan</legend>
		Nama Barang : <br><input type="text" name="nama_bar"/><br><br> 
		Harga Barang : <br>(Contoh: 50000) <br> Rp <input type="text" name="harga_bar"/><br><br> 
		Foto Barang : <br><input type="file" name="foto_bar"/><br><br> 
		<input type="submit" value="Tambah"/>
	</fieldset>
</form>