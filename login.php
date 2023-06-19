<?php
session_start();

require 'function.php';

require 'functionlogin.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title> Halaman  </title>
</head>
<body>

<h1> Halaman Login </h1>

<?php if( isset($error)) : ?>
	<p style="color: red; font-style: italic;"> 
	Username / password salah </p>
<?php endif; ?>

<form action="" method="post"> 

	<ul>
		<li>
			<label for="username"> Username : </label>
			<input type="text" name="username" id="username">
		</li>
		<br>
		<li>
			<label for="password"> Password : </label>	
			<input type="password" name="password" id="password">		
		</li>
		<br>
		<li>
   			<input type="checkbox" name="remember" id="remember">
   			<label for="remember"> Remember me </label>
		</li>
	<br>
		<li>
			<button type="submit" name="login"> Login </button>
		 </li>
&emsp; &emsp; &emsp;

<li>
	
	<button type="submit" name="register"> <a href="registrasi.php">
				Register 
			</button></a></li>

      </ul>
</form>

</body>
</html>