<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	if(!isset($_SESSION['user_id'])){
		header("Location: login.php");
	}
	
	$sql = "SELECT user.* FROM user WHERE id = $_GET[id]";
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);
?>


<h3>Isi Saldo</h3>
<form action="proses-add-saldo.php" method="post">
	<fieldset style="width: 200px;">
		<legend>Form Isi Saldo</legend>
		Saldo : <br>(Contoh: 50000) <br> Rp <input type="text" name="saldo"/><br><br>  
		<input type="submit" value="Tambah"/>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
	</fieldset>
</form>