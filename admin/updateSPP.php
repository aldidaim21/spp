<?php
include '../koneksi.php';
$data = mysqli_query($konek, "SELECT * FROM spp WHERE id_spp='$_GET[id_spp]'");
$dtA = mysqli_fetch_assoc($data);
include 'header.php';

session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = '../login.php';
		</script>";;
} ?>

<div class="content-all">
	<h2>EDIT DATA KATEGORI SPP</h2>

	<form action="" method="post">
		<table>
			<tr>
				<td>ID SPP</td>
				<td>:</td>
				<td>
					<input type="text" name="id_spp" placeholder="Masukan ID Kategori SPP" value="<?= $dtA['id_spp'] ?>">
				</td>
			</tr>
			<tr>
				<td>TAHUN</td>
				<td>:</td>
				<td>
					<input type="text" name="tahun" placeholder="Tahun" value="<?= $dtA['tahun'] ?>">
				</td>
			</tr>
			<tr>
				<td>nominal</td>
				<td>:</td>
				<td>
					<input type="text" name="nominal" placeholder="Nominal" value="<?= $dtA['nominal'] ?>">
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
	$id_spp = $_POST['id_spp'];
	$tahun  = $_POST['tahun'];
	$nominal  = $_POST['nominal'];

	$simpan = $konek->query("UPDATE spp SET id_spp = '$id_spp', tahun = '$tahun', nominal = '$nominal' WHERE id_spp =" . $id_spp);
	if ($simpan) {
		echo "
 		<script>
 		alert('data kategori spp berhasil diedit');
 		document.location.href = 'dataspp.php';
 		</script>
 		";
	} else {
		echo "
 		<script>
 		alert('data kategori spp gagal diedit');
 		document.location.href = 'dataspp.php';
 		</script>
 		";
	}
}


?>
<?php include '../footer.php';  ?>