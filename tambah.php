<?php
require 'function.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Tambah data mahasiswa</title>
</head>
<body>

<h1> Tambah data mahasiswa </h1>

	<form action="" method="post" enctype="multipart/form-data">
		
			<ul>

				<li>
					<label for="nrp"> NRP </label>
					<input type="text" name="nrp" id="nrp"
					required>
				</li>

				<li>
					<label for="nama"> Nama :</label>
					<input type="text" name="nama" id="nama"required>
				</li>

				

				<li>
					<label for="email"> Email </label>
					<input type="text" name="email" id="email" required>
				</li>

				<li>
					<label for="jurusan"> Jurusan </label>
					<input type="text" name="jurusan" id="jurusan" required>
				</li>

				<li>
					<label for="gambar"> Gambar </label>
			

					<input type="file" name="gambar" id="gambar" required>
				</li>

				<li>
					<button type="submit" name="submit"> Tambah Data </button>
				</li>
			</ul>

	</form>


<button onclick="history.back()">Go Back</button>

</body>
</html>