<?php
include '../koneksi.php';
include 'header.php';

$admin = query("SELECT * FROM petugas ORDER BY id_petugas ASC");


// sesi
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = '../login.php';
		</script>";;
} ?>

<div class="content-all">

	<h2> DATA ADMIN SMK PUSDIKHUBAD</h2>





	<div class="tabel">
		<table cellspacing='0'>
			<thead>
				<tr>
					<th>NO</th>
					<th>ID PETUGAS</th>
					<th>NAMA PETUGAS</th>
					<th>LEVEL</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<?php $i = 1; ?>
			<?php foreach ($admin as $dta) : ?>
				<tbody>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $dta['id_petugas'] ?></td>
						<td><?= $dta['nama_petugas'] ?></td>
						<td><?= $dta['level'] ?></td>
						<td>
							<a class="edit" href="updateAD.php?id_petugas=<?= $dta['id_petugas'] ?>">EDIT</a>
							<a class="hapus" href="hapusAD.php?id_petugas=<?= $dta['id_petugas'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus data admin? ')">HAPUS</a>
						</td>
					</tr>
				</tbody>
			<?php endforeach ?>
		</table>
	</div>
	<!-- tambah data -->
	<a class="tambah" href="tambahAD.php">TAMBAH DATA</a>
</div>
<?php include '../footer.php'; ?>