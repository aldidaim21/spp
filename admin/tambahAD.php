<?php
include '../koneksi.php';
include 'header.php';

// sesi
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = '../login.php';
		</script>";;
}
?>

<div class="content-all">
	<h2>TAMBAH DATA ADMIN</h2>

	<form action="" method="get">
		<div class="tabel-form">

			<label for="">Id Petugas</label><br>
			<input type="text" name="id_petugas" placeholder="Masukan Id Petugas"><br>

			<label for="">Username</label><br>
			<input type="text" name="username" placeholder="Masukan Username"><br>

			<label for="">Nama Admin</label><br>
			<input type="text" name="nama_petugas" placeholder="Masukan Nama Lengkap"><br>

			<label for="petugas">Petugas</label><br>
			<input type="radio" name="level" value="petugas">
			<label for="admin">Admin</label><br>
			<input type="radio" name="level" value="admin">


			<button type="submit" name="tambah" class="bt-nambah">Tambah</button>
		</div>
	</form>
</div>
<?php
if (isset($_GET['tambah'])) {
	$id_petugas = $_GET['id_petugas'];
	$username = $_GET['username'];
	$password = $_GET['password'];
	$nama_petugas = $_GET['nama_petugas'];
	$level = $_GET['level'];

	$exec = mysqli_query($konek, "INSERT INTO petugas(id_petugas,username,password,nama_petugas,level) Values ('$id_petugas','$username','$password','$nama_petugas','$level')");

	if ($exec) {
		echo "
 		<script>
 		alert('data admin berhasil ditambahkan');
 		document.location.href = 'dataadmin.php';
 		</script>
 		";
	} else {
		echo "
 		<script>
 		alert('data admin gagal ditambahkan');
 		document.location.href = 'dataadmin.php';
 		</script>
 		";
	}
}


?>
<?php include '../footer.php';  ?>