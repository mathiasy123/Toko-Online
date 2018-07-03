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

<h3>Beli Barang</h3>
<?php
if(isset($_GET['error']) && $_GET['error'] == 'saldo'){
	echo "<p style='color: red;'>Pembayaran gagal, maaf saldo Anda tidak mencukupi, silahkan isi saldo terlebih dahulu</p>";
}
?>
<form action="proses-beli.php" method="post">
	<fieldset style="width: 200px;">
		<legend>Form Beli Barang</legend>
		Foto barang: <br><br>
		<img src="<?php echo $row['foto_bar']; ?>"  height="50" width="50" /><br><br>
		Nama Barang: <?php echo $row['nama_bar']; ?>  <br><br>
		Harga Barang: <?php echo "Rp. " . number_format($row['harga_bar'], 0, ".", "."); ?><br><br>
		<input type="submit" value="Beli"/>
		<a href="home.php"><input type="button" value="Tidak"/></a>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
	</fieldset>
</form>

