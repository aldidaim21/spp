<!-- koneksi -->
<?php
include '../koneksi.php';
include 'header.php';
?>
<!-- koneksi -->
<!-- sesi -->
<?php session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = 'login.php';
		</script>";;
} ?>
<!-- sesi -->
<!-- konten -->
<div class="content-all">
	<h2> DATA KELAS SMK PUSDIKHUBAD</h2>


	<div class="tabel">
		<table cellspacing='0'>
			<thead>
				<tr>
					<th>NO</th>
					<th>ID KELAS</th>
					<th>NAMA KELAS</th>
					<th>KOMPETENSI KEAHLIAN</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<?php
			$data = $konek->query("SELECT * FROM kelas ORDER BY id_kelas ASC");

			$i = 1;
			while ($dta = mysqli_fetch_assoc($data)) :
			?>
				<tbody>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $dta['id_kelas'] ?></td>
						<td><?= $dta['nama_kelas'] ?></td>
						<td><?= $dta['kompetensi_keahlian'] ?></td>
						<td>
							<a class="edit" href="updateKLS.php?id_kelas=<?= $dta['id_kelas'] ?>">EDIT</a>
							<a class="hapus" href="hapusKLS.php?id_kelas=<?= $dta['id_kelas'] ?>" onclick="return confirm('apakah anda yakin menghapus data?')">HAPUS</a>
						</td>
					</tr>
				</tbody>
				<?php $i++; ?>
			<?php endwhile; ?>
		</table>
	</div>
	<a href="tambahKLS.php" class="tambah">TAMBAH KELAS</a>
</div>
<?php include '../footer.php';  ?>