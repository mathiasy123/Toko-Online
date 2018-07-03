<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	if(!isset($_SESSION['user_id'])){
		header("Location: login.php");
	}
	
	$sql = "SELECT barang.* FROM barang WHERE id = $_GET[id]";
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);
?>

<h3>Edit Barang</h3>
<?php
if(isset($_GET['error']) && $_GET['error'] == 'edit'){
	echo "<p style='color: red;'>Edit barang penjualan gagal, karena gambar barang yang melebihi 5 MB dan tidak sesuai ekstensinya, silahkan coba lagi</p>";
}
?>
<form action="proses-edit.php" method="post" enctype="multipart/form-data">
	<fieldset style="width: 200px;">
		<legend>Form Tambah Barang Penjualan</legend>
		Nama Barang : <br><input type="text" value="<?php echo $row['nama_bar']; ?> " name="n_bar"/><br><br> 
		Harga Barang : <br>(Contoh: 50000) <br> Rp <input type="text" value="<?php echo $row['harga_bar']; ?>" name="h_bar"/><br><br> 
		Foto Barang : <br><input type="file" name="f_bar"/><br><br> 
		<input type="submit" value="Edit"/>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
	</fieldset>
</form>