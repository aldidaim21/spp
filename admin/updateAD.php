<?php
include '../koneksi.php';
$data = mysqli_query($konek, "SELECT * FROM petugas WHERE id_petugas='$_GET[id_petugas]'");
$dta = mysqli_fetch_assoc($data);
include 'header.php';

session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = '../login.php';
		</script>";;
} ?>
?>


<div class="content-all">
	<h2>UPDATE DATA ADMIN</h2>


	<form action="" method="post">
		<table>
			<tr>
				<td> Nama Lengkap</td>
				<td>
					<input type="text" name="nama_petugas" value="<?= $dta['nama_petugas'] ?>">
				</td>
			</tr>
			<tr>
				<div class="alert alert-warning">
					<span><b>Biarkan Jika tidak diganti</b></span>
				</div>
				<td> Username</td>
				<td>
					<input type="hidden" name="id_petugas" value="<?= $dta['id_petugas'] ?>">
					<input type="text" name="username" value="<?= $dta['username'] ?>">
				</td>
			</tr>
			<tr>
				<td> Password</td>
				<td>
					<input type="text" name="password" value="<?= $dta['password'] ?>">
					<input type="checkbox" name="cek" onclick="ShowPass()"> Show/Hide Password
				</td>
			</tr>
			<tr>
				<td> Level</td>
				<td>
					<input type="text" name="level" value="<?= $dta['level'] ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button class="btn btn-success" type="submit" name="ubah">UPDATE</button>

				</td>
			</tr>
		</table>
	</form>
</div>
<?php
if (isset($_POST['ubah'])) {
	$id_petugas   = $_POST['id_petugas'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_petugas = $_POST['nama_petugas'];
	$level = $_POST['level'];

	$ubah = $konek->query("UPDATE petugas SET
 	     username = '$username', 
 		 password     = '$password',
 		 nama_petugas = '$nama_petugas',
         level = '$level' WHERE id_petugas =" . $id_petugas);

	if ($ubah) {
		echo "
 		<script>
 		alert('data admin berhasil diupdate');
 		document.location.href = 'dataadmin.php';
 		</script>
 		";
	} else {
		echo "
 		<script>
 		alert('data admin gagal diupdate');
 		document.location.href = 'dataadmin.php';
 		</script>
 		";
	}
}


?>
</div>
<?php include '../footer.php';  ?>