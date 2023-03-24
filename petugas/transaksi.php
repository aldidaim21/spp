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
if (!isset($_SESSION["login_petugas"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = 'login.php';
		</script>";;
}
?>

<!-- content -->


<div class="content-all">
	<!-- pencarian -->

	<h2>Pembayan SPP</h2>

	<form action="" method="POST">
		<div class="form">
			<input type="text" name="keyword" placeholder="Pencarian Nama siswa">
			<br>
			<button class="cari" type="submit" name="cari">Cari</button>

		</div>
	</form>

	<!-- tabel -->
	<div class="tabel">
		<table cellspacing='0'>
			<thead>
				<tr>
					<th>NO</th>
					<th>NISN</th>
					<th>NIS</th>
					<th>NAMA SISWA</th>
					<th>Opsi</th>
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
						<td>
							<a class="edit" href=" bayar.php?nisn=<?= $dta['nisn'] ?>">Bayar</a>
						</td>
					</tr>
				</tbody>

			<?php endforeach; ?>
		</table>


	</div>
	<!-- alert -->
	<?php if (isset($_POST["cari"])) { ?>
		<h3>pencarian atas nama <span><?= $_POST["keyword"] ?></span></h3>
	<?php } ?>
</div>
<!-- footer -->
<?php include "../footer.php"; ?>