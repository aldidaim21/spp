<?php
include '../koneksi.php';
$sqlsiswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nisn = '$_GET[nisn]' ");
$sw = mysqli_fetch_assoc($sqlsiswa);

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
	<h2>EDIT DATA SISWA</h2>

	<?php if (isset($error)) : ?>
		<p style="font-family: arial; color: red; size: 14px;">Silahkan Lengkapi Form Terlebih Dahulu</p>
	<?php endif; ?>
	<form action="" method="get">
		<table>
			<tr>
				<td>NISN</td>
				<td>
					<input type="text" name="nisn" value="<?= $sw['nisn'] ?>" maxlength="40" size="30">
				</td>
			</tr>
			<tr>
				<td>NIS</td>
				<td>
					<input type="text" name="nis" value="<?= $sw['nis'] ?>" size="30">
				</td>
			</tr>
			<tr>
				<td>Nama Siswa</td>
				<td>
					<input type="text" name="nama" value="<?= $sw['nama'] ?>" maxlength="35" size="30">
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>
					<select name="id_kelas">
						<?php
						$data = mysqli_query($konek, "SELECT * FROM kelas ORDER BY id_kelas ASC");
						while ($kls = mysqli_fetch_assoc($data)) {
						?>
							<?php if ($sw['id_kelas'] == $kls['id_kelas']) {
								$selected = 'selected';
							} else {
								$selected = "";
							}
							?>
							<option value="<?= $kls['id_kelas']; ?>"><?= $kls['nama_kelas']; ?></option>
						<?php
						}
						?>

					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>
					<input type="text" name="alamat" value="<?= $sw['alamat'] ?>">
				</td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>
					<input type="text" name="no_telp" value="<?= $sw['no_telp'] ?>">
				</td>
			</tr>
			<tr>
				<td>Nominal</td>
				<td>
					<select name="id_spp">
						<?php
						$data = mysqli_query($konek, "SELECT * FROM spp ORDER BY id_spp ASC");
						while ($spp = mysqli_fetch_assoc($data)) {
						?>
							<?php if ($sw['id_spp'] == $spp['id_spp']) {
								$selected = 'selected';
							} else {
								$selected = "";
							}
							?>
							<option value="<?= $spp['id_spp']; ?>"><?= $spp['nominal']; ?></option>
						<?php
						}
						?>

					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit" name="ubah">UPDATE DATA</button>
				</td>
			</tr>
		</table>
	</form>
</div>

<?php
if (isset($_GET['ubah'])) {
	$nisn = $_GET['nisn'];
	$nis = $_GET['nis'];
	$nama = $_GET['nama'];
	$id_kelas = $_GET['id_kelas'];
	$alamat = $_GET['alamat'];
	$no_telp = $_GET['no_telp'];
	$id_spp = $_GET['id_spp'];

	$ubah = mysqli_query($konek, "UPDATE siswa SET nisn = '$nisn',
        nis = '$nis',
 		nama = '$nama',
 		id_kelas = '$id_kelas',
 		alamat = '$alamat',
 		no_telp  = '$no_telp' ,
        id_spp = '$id_spp' WHERE nisn = '$nisn'");

	if ($ubah) {
		echo "
 		<script>
 		alert('data berhasil diedit');
 		document.location.href = 'datasiswa.php';
 		</script>
 		";
	} else {
		echo "
 		<script>
 		alert('data gagal diedit');
 		</script>
 		";
	}
}


?>

<?php include '../footer.php'; ?>