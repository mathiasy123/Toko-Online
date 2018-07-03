<?php
	session_start();
	$koneksi = mysqli_connect("localhost", "root", "", "latihan");
	
	if(!isset($_SESSION['user_id'])){
		header("Location: login.php");
	}
	
	$sql = "SELECT user.* FROM user WHERE user.id = $_SESSION[user_id]";
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);
?>

<?php
	$sql2 = "SELECT barang.* FROM barang WHERE user_id = $_SESSION[user_id]";
	$hasil2 = mysqli_query($koneksi, $sql2);
?>

<h1>Toko Online</h1>
<a href="logout.php">Keluar</a><br><br>
<img src="<?php echo $row['foto']; ?>" height="50" width="50" />
<p>Pengguna : <?php echo $row['nama']; ?></p>
<p>Saldo : <?php echo "Rp. " . number_format($row['saldo'], 0, ".", "."); ?></p>
<a href="isi-saldo.php?id=<?php echo $row['id']; ?>">Isi saldo</a>
<p>Daftar harga barang</p>
<a href="add-barang.php">Tambah Barang</a><br><br>
<table border="1px black solid">
	<tr>
		<th>No.</th>
		<th>Foto Barang</th>
		<th>Nama Barang</th>
		<th>Harga Barang</th>
		<th>Aksi</th>
		<th>Olah</th>
	</tr>
	<?php 
	$i = 1;
	while($row2 = mysqli_fetch_assoc($hasil2)){?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><img src="<?php echo $row2['foto_bar']; ?>"  height="50" width="50" /></td>
		<td><?php echo $row2['nama_bar']; ?></td>
		<td><?php echo "Rp. " . number_format($row2['harga_bar'], 0, ".", "."); ?></td>
		<td><a href="beli.php?id=<?php echo $row2['id']; ?>">Beli Barang</a></td>
		<td><a href="edit.php?id=<?php echo $row2['id']; ?>">Edit Barang</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>