<?php
include '../koneksi.php';
$data = mysqli_query($konek, "SELECT * FROM kelas WHERE id_kelas='$_GET[id_kelas]'");
$dtA = mysqli_fetch_assoc($data);
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
	<h2>EDIT DATA KELAS</h2>

	<form action="" method="post">
		<table>
			<tr>
				<td>ID Kelas</td>
				<td>:</td>
				<td>
					<input type="text" name="id_kelas" placeholder="Masukan ID Kelas" value="<?= $dtA['id_kelas'] ?>">
				</td>
			</tr>
			<tr>
				<td>Nama Kelas</td>
				<td>:</td>
				<td>
					<input type="text" name="nama_kelas" placeholder="Masukan Nama Kelas" value="<?= $dtA['nama_kelas'] ?>">
				</td>
			</tr>
			<tr>
				<td>Kompetensi Keahlian</td>
				<td>:</td>
				<td>
					<input type="radio" name="kompetensi_keahlian" value="Rekayasa Perangkat Lunak">
					<label for="RPL">Rekayasa Perangkat Lunak</label><br>
					<input type="radio" name="kompetensi_keahlian" value="Teknik Elektronika Industri">
					<label for="ELIN">Teknik Elektronika Industri</label><br>
					<input type="radio" name="kompetensi_keahlian" value="Teknik Mekatronika">
					<label for="MEKA">Teknik Mekatronika</label><br>
					<input type="radio" name="kompetensi_keahlian" value="Teknik dan Bisnis Sepeda Motor">
					<label for="TBSM">Teknik dan Bisnis Sepeda Motor</label><br>
					<input type="radio" name="kompetensi_keahlian" value="Teknik Kendaraan Ringan">
					<label for="TKR">Teknik Kendaraan Ringan</label><br>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="ubah">UPDATE</button>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
if (isset($_POST['ubah'])) {
	$id_kelas = $_POST['id_kelas'];
	$nama_kelas  = $_POST['nama_kelas'];
	$kompetensi_keahlian   = $_POST['kompetensi_keahlian'];

	$simpan = $konek->query("UPDATE kelas SET id_kelas = '$id_kelas', nama_kelas = '$nama_kelas', kompetensi_keahlian = '$kompetensi_keahlian' WHERE id_kelas =" . $id_kelas);
	if ($simpan) {
		echo "
 		<script>
 		alert('data kelas berhasil diedit');
 		document.location.href = 'datakelas.php';
 		</script>
 		";
	} else {
		echo "
 		<script>
 		alert('data kelas gagal diedit');
 		document.location.href = 'datakelas.php';
 		</script>
 		";
	}
}


?>
<?php include '../footer.php';  ?>