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

<div class="content-all">
	<!-- content -->
	<h2> DATA KATEGORI SPP SMK PUSDIKHUBAD</h2>


	<div class="tabel">
		<table cellspacing="0">
			<thead>
				<tr>
					<th>NO</th>
					<th>ID SPP</th>
					<th>TAHUN</th>
					<th>NOMINAL</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<?php
			$data = $konek->query("SELECT * FROM spp ORDER BY id_spp ASC");

			$i = 1;
			while ($dta = mysqli_fetch_assoc($data)) :
			?>
				<tbody>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $dta['id_spp'] ?></td>
						<td><?= $dta['tahun'] ?></td>
						<td><?= $dta['nominal'] ?></td>
						<td>
							<a class="edit" href="updateSPP.php?id_spp=<?= $dta['id_spp'] ?>">EDIT</a>
							<a class="hapus " href="hapusSPP.php?id_spp=<?= $dta['id_spp'] ?>" onclick="return confirm('apakah anda yakin menghapus data?')">HAPUS</a>
						</td>
					</tr>
				</tbody>
				<?php $i++; ?>
			<?php endwhile; ?>
		</table>
	</div>
	<a class="tambah" href="tambahSPP.php">TAMBAH DATA</a>
</div>
<?php include '../footer.php';  ?>