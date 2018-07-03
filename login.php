<h3>Login</h3>
<?php 
if(isset($_GET['error']) && $_GET['error'] == 'password'){
	echo "<p style='color: red;'>Login gagal karena password salah, silahkan coba lagi</p>";
}elseif(isset($_GET['error']) && $_GET['error'] == 'user'){
	echo "<p style='color: red;'>Login gagal karena username salah atau belum terdaftar, silahkan coba lagi</p>";
}
?>
<form action="proses-login.php" method="post">
	Username : <input type="text" name="username"/><br><br> 
	Password :<input type="password" name="password"/><br><br> 
	<input type="submit" value="login"/>
	Belum daftar ? >>> <a href="add-user.php">Daftar</a>
</form>