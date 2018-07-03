<?php 
if(isset($_GET['error']) && $_GET['error'] == 'gagal'){
	echo "<p style='color: red;'>Upload foto gagal karena file ekstensi tidak sesuai atau bobot file leih dari 5 MB, silahkan coba lagi</p>";
}
?>

<h3>Daftar user</h3>
<p style="color: red;">*Data harus diisi semua</p>
<form action="proses-add-user.php" method="post" enctype="multipart/form-data">
	<fieldset style="width: 0px;">
		<legend>Form Daftar User</legend>
		Nama : <br><input type="text" name="nama"/><br><br> 
		Username : <br><input type="text" name="username"/><br><br> 
		Password :<br><input type="password" name="password"/><br><br> 
		Foto : <br><input type="file" name="foto"/><br><br> 
		<input type="submit" value="daftar"/>
	</fieldset>
</form>
