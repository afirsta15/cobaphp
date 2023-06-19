<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "cobaphp");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	} 
	return $rows;
}

function tambah($data)
{
	global $conn;

	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	


	//upload gambar 
	$gambar = upload();
	if( !$gambar) {
		return false;
	}

	$query = "INSERT INTO mahasiswa
				VALUeS
				('', '$nrp', '$nama', '$email', '$jurusan' ,'$gambar')
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function upload (){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
	echo "<script>
			alert('pilih gambar terlebih dahulu');
			</script>";
	return false;
	}	

	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid))
		{
	echo "<script>
			alert('yang anda upload bukan gambar!');
			</script>";
	return false;
	}	

	//cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
	}

	//lolos pengecekan, gambar siap diupload
	//generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;
}



function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	//cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4)
	{
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}



	$gambar = htmlspecialchars($data["gambar"]);



	$query = "UPDATE mahasiswa SET
				nrp = '$nrp',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'

				WHERE id = $id
				";
				
				
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	}



if(isset($_POST["submit"]))
{
	

if(tambah($_POST) > 0 )
{
	echo "
	<script>
	alert('data berhasil ditambahkan!');
	document.location.href = 'index.php';
	</script>
	";
} else {
	echo "
	<script> 
		alert('data gagal ditambahkan!');
		document.location.href = 'coba1.php';
	</script>
	";
}

}


function cari($keyword) {
	$query = "SELECT * FROM mahasiswa
		WHERE
		nama LIKE '%$keyword%' OR
		nrp LIKE '%$keyword%' OR
		email LIKE '%$keyword%' OR
		jurusan LIKE '%$keyword%'

	";

	return query($query);

}

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username sudah ada apa belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username yang dipilih sudah terdaftar!');
			</script>";

			return false;
	}


	//cek konfirmasi password
	if($password !== $password2) {
		echo "
		<script>
			alert('konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}
	
	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	//ambil usernsme berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	//cek cookie dan username
	if ( $key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}

}




if( isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}

 
	if (isset($_POST["login"]) ) {
	
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	

	//cek username
	if (mysqli_num_rows($result) === 1) {

		//cek password
		$row = mysqli_fetch_assoc($result);
			if( password_verify($password, $row["password"]))
			{	
				//set session
				$_SESSION["login"] = true;

				//cek remember me
				if( isset($_POST['remember'])){
					//buat cookie
					setcookie('id', $row['id'], time() +60);
					setcookie('key', hash('sha256', $row['username']), time()+60);

				}


				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}


}


?>