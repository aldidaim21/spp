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
?>

<div class="content-all">
	<h2>TAMBAH KELAS</h2>

	<form action="" method="post">
		<table>
			<tr>
				<td>ID_Kelas</td>
				<td>:</td>
				<td>
					<input type="text" name="id_kelas" placeholder="Masukan ID Kelas">
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>
					<input type="text" name="nama_kelas" placeholder="Masukan Nama Kelas">
				</td>
			</tr>
			<tr>
				<td>Kompetensi Keahlian</td>
				<td>:</td>
				<td>
					<input type="text" name="kompetensi_keahlian" placeholder="Masukan Nama Kompetensi Keahlian">
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

	<?php
	if (isset($_POST['tambah'])) {
		$id_kelas = $_POST['id_kelas'];
		$nama_kelas = $_POST['nama_kelas'];
		$kompetensi_keahlian  = $_POST['kompetensi_keahlian'];

		$simpan = $konek->query("INSERT INTO kelas (id_kelas,nama_kelas,kompetensi_keahlian) VALUES('$id_kelas','$nama_kelas','$kompetensi_keahlian')");
		if ($simpan) {
			echo "
 		<script>
 		alert('data kelas berhasil ditambahkan');
 		document.location.href = 'datakelas.php';
 		</script>
 		";
		} else {
			echo "
 		<script>
 		alert('data kelas gagal ditambahkan');
 		document.location.href = 'datakelas.php';
 		</script>
 		";
		}
	}


	?>
</div>
<?php include '../footer.php';  ?>