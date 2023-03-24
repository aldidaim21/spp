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
	<h2>TAMBAH DATA SISWA </h2>


	<form action="" method="get">
		<table>
			<tr>
				<td>NISN</td>
				<td>
					<input type="text" name="nisn" placeholder="Masukan Nomor Induk Siswa Nasional">
				</td>
			</tr>

			<tr>
				<td>NIS</td>
				<td>
					<input type="text" name="nis" placeholder="Masukan Nomor Induk Siswa">
				</td>
			</tr>
			<tr>
				<td>Nama Siswa</td>
				<td>
					<input type="text" name="nama" placeholder="Masukan Nama Siswa">
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>
					<select name="id_kelas">
						<option value="" selected>-pilih kelas-</option>
						<?php
						$data = mysqli_query($konek, "SELECT * FROM kelas ORDER BY id_kelas ASC");
						while ($dta = mysqli_fetch_assoc($data)) {
						?>
							<option value="<?= $dta['id_kelas']; ?>"><?= $dta['id_kelas']; ?></option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>
					<input type="text" name="alamat">
				</td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>
					<input type="text" name="no_telp">
				</td>
			</tr>
			<tr>
				<td>Nominal</td>
				<td>
					<select name="id_spp" required>
						<option value="" selected>-pilih kelas-</option>
						<?php
						$data = mysqli_query($konek, "SELECT * FROM spp ORDER BY id_spp ASC");
						while ($spp = mysqli_fetch_assoc($data)) {
						?>
							<option value="<?= $spp['id_spp']; ?>"><?= $spp['id_spp']; ?></option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button class="btn btn-success" type="submit" name="tambah">SIMPAN DATA</button>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
if (isset($_GET['tambah'])) {
	$nisn        = $_GET['nisn'];
	$nis   		 = $_GET['nis'];
	$nama 	     = $_GET['nama'];
	$id_kelas 	 = $_GET['id_kelas'];
	$alamat      = $_GET['alamat'];
	$no_telp  	 = $_GET['no_telp'];
	$id_spp	     = $_GET['id_spp'];

	$simpan = mysqli_query($konek, "INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) Values ('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')");
	if ($simpan) {
		echo "
            <script>
            alert('data siswa berhasil ditambahkan');
            document.location.href = 'datasiswa.php';
            </script>
            ";
	} else {
		echo "
            <script>
            alert('data siswa gagal ditambahkan');
            document.location.href = 'datasiswa.php';
            </script>
            ";
	}
}


?>
<?php include '../footer.php'; ?>