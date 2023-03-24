<?php
include '../koneksi.php';
include 'header.php';
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = '../login.php';
		</script>";;
} ?>


<div class="content-all">
	<h2>TAMBAH KATEGORI SPP</h2>

	<form action="" method="post">
		<table>
			<tr>
				<td>ID SPP</td>
				<td>:</td>
				<td>
					<input type="text" name="id_spp" placeholder="Masukan ID SPP">
				</td>
			</tr>
			<tr>
				<td>TAHUN</td>
				<td>:</td>
				<td>
					<input type="text" name="tahun" placeholder="Masukan tahun">
				</td>
			</tr>
			<tr>
				<td>NOMINAL</td>
				<td>:</td>
				<td>
					<input type="text" name="nominal" placeholder="Masukan nominal">
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="tambah">SIMPAN</button>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>

</html>
<?php
if (isset($_POST['tambah'])) {
	$id_spp = $_POST['id_spp'];
	$tahun = $_POST['tahun'];
	$nominal  = $_POST['nominal'];

	$simpan = $konek->query("INSERT INTO spp (id_spp,tahun,nominal) VALUES('$id_spp','$tahun','$nominal')");
	if ($simpan) {
		echo "
 		<script>
 		alert('data kategori spp berhasil ditambahkan');
 		document.location.href = 'dataspp.php';
 		</script>
 		";
	} else {
		echo "
 		<script>
 		alert('data kategori spp gagal ditambahkan');
 		document.location.href = 'dataspp.php';
 		</script>
 		";
	}
}



?>

<?php include '../footer.php';  ?>