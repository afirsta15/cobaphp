<?php
session_start();
if( !isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}



require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");



// pagination
// konfigurasi
/*
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

*/


//tombol cari ditekan
if( isset($_POST["cari"]))
{
  $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Halaman Admin !!!</title>

<style>
  
  .loader {

    width: 100px;
    position: absolute;
    top: 100.1px;
    left: 300px;
    z-index: -3;
    display: none;

  }

  @media print{
    .logout, .tambah, .form-cari, .aksi{
      display: none;
    }

  }

</style>

<script src="js/jquery-3.6.3.min.js"></script>
<!-- <script src="js/script.js"></script> -->
<script src="js/script1.js"></script>

</head>

<body>

<a href="logout.php" class="logout"> logout  </a> | 
<a href="cetak.php" target="_blank"> Cetak </a>

  <h1> Daftar Mahasiswa </h1>

<a href="tambah.php" class="tambah"> Tambah data mahasiswa </a>
<br><br>

<form action="" method="post" class="form-cari">  

 <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
 <button type="submit" name="cari" id="tombol-cari"> Cari! </button>

 <img src="img/200w.gif" class="loader">

</form>
<br><br>

<!--- navigasi 

<?php if( $halamanAktif >1 ) : ?>
   <a href="?halaman=>?= $halamanAktif - 1; ?>">&lt;</a>
<?php endif; ?>

<?php for( $i = 1; $i <= $jumlahDataPerHalaman; $i++ ) : ?>
  <?php if( $i == $halamanAktif ) : ?>
      <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"> <?= $i; ?></a>
    <?php else : ?>
      <a href="?halaman=<?= $i; ?>"> <?= $i; ?> </a>
    <?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
   <a href="?halaman=>?= $halamanAktif + 1; ?>">&gt;</a>
<?php endif; ?>

--->

<!-- <br><br>  -->

<div id="container">

  <table border="1" cellpadding="10" cellspacing="0">
  	<tr>
  		
  		<th> No.  </th>
  		<th class="aksi"> Aksi </th>
  		<th> Gambar </th>
  		<th> NRP </th>
  		<th> Nama </th>
  		<th> Email </th>
  		<th> Jurusan </th>

  	</tr>
  	
    <?php $i =1; ?>
  	 <?php foreach ($mahasiswa as $row ) : ?> 

  		<tr>
  			<td> <?= $i; ?> </td>
  			<td class="aksi">
  				<a href="ubah.php?id=<?= $row["id"];?>"> ubah </a> |
  				<a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?');"> 
          hapus </a>
  			</td>

  			<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
  			<td> <?= $row["nrp"]; ?> </td>
  			<td> <?= $row["nama"]; ?> </td>
  			<td> <?= $row["email"]; ?> </td>
  			<td> <?= $row["jurusan"]; ?> </td>

  		</tr>
  		<?php $i++; ?>
  		<?php endforeach; ?>

  </table>

   </div> 



</body>
</html>