<!-- koneksi -->
<?php
include '../koneksi.php';
include 'header.php';

$siswa = query("SELECT * FROM siswa");


if (isset($_POST["cari"])) {
	$siswa = cari($_POST["keyword"]);
}

// sesi
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = 'login.php';
		</script>";;
}
?>

<!-- konten -->
<div class="content-all">


	<h2> DATA SISWA SMK PUSDIKHUBAD</h2>

	<form action="" method="POST">
		<div class="form">
			<input type="text" name="keyword" placeholder="Cari Siswa">
			<br>
			<button class="cari" type="submit" name="cari">Cari</button>

		</div>
	</form>

	<div class="tabel">
		<table cellspacing='0'>
			<thead>
				<tr>
					<th>NO</th>
					<th>NISN</th>
					<th>NIS</th>
					<th>NAMA SISWA</th>
					<th>KELAS</th>
					<th>ALAMAT</th>
					<th>NO TELEPON</th>
					<th>ID SPP</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<?php $i = 1; ?>
			<?php foreach ($siswa as $dta) : ?>
				<tbody>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $dta['nisn'] ?></td>
						<td><?= $dta['nis'] ?></td>
						<td><?= $dta['nama'] ?></td>
						<td><?= $dta['id_kelas'] ?></td>
						<td><?= $dta['alamat'] ?></td>
						<td><?= $dta['no_telp'] ?></td>
						<td><?= $dta['id_spp'] ?></td>
						<td>
							<a class="edit" href=" updateSW.php?nisn=<?= $dta['nisn'] ?>">EDIT</a>
							<a class="hapus" href="hapusSW.php?nisn=<?= $dta['nisn'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus data? data SPP Siswa yang bersangkutan akan ikut terhapus')">HAPUS</a>
						</td>
					</tr>
				</tbody>
			<?php endforeach; ?>
		</table>
		<!-- alert -->
		<?php if (isset($_POST["cari"])) { ?>
			<h3>pencarian atas nama <span><?= $_POST["keyword"] ?></span></h3>
		<?php } ?>

	</div>
	<a href="tambahSW.php" class="tambah">TAMBAH DATA</a>
	<p align="center" style="font-family: arial; color: red; size: 10px;">Menghapus Data Siswa Maka Akan menghapus Data Pembayaran dan data tagihan Siswa pada tabel SPP</p>
</div>

<?php include '../footer.php'; ?>