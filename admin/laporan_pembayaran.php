<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = '../login.php';
		</script>";;
} ?>
<!DOCTYPE html>
<html>

<head>
	<title>Laporan Pembayaran</title>
</head>

<body>
	<h3>SMK PUSDIKHUBAD<b><br />LAPORAN PEMBAYARAN SPP</b></h3>
	<br />
	<hr />
	Tanggal <?= $_GET['tgl1'] . " -- " . $_GET['tgl2'];  ?>
	<br />
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
		<tr>
			<th>NO</th>
			<th>NISN</th>
			<th>NIS</th>
			<th>NAMA SISWA</th>
			<th>KELAS</th>
			<th>Kategori SPP</th>
			<th>TANGGAL BAYAR</th>
			<th>JUMLAH</th>
			<th>Keterangan</th>
		</tr>
		<?php
		$lapor = $konek->query("SELECT pembayaran.*,siswa.*
							FROM pembayaran INNER JOIN siswa ON pembayaran.nisn=siswa.nisn
							WHERE tgl_bayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]'
							ORDER BY tgl_bayar ASC");
		$i = 1;
		$total = 0;
		while ($dta = mysqli_fetch_array($lapor)) :
		?>
			<tr>
				<td align="center"><?= $i ?></td>
				<td align="center"><?= $dta['nisn'] ?></td>
				<td align="center"><?= $dta['nis'] ?></td>
				<td align=""><?= $dta['nama'] ?></td>
				<td align="">
					<?php
					$id_kelas = $dta['id_kelas'];
					$datakelas = mysqli_query($konek, "SELECT * FROM kelas where id_kelas ='$id_kelas'");
					$dtkelas = mysqli_fetch_assoc($datakelas);
					?>
					<?= $dtkelas['nama_kelas'] ?>
				</td>
				<td align=""><?= $dta['id_spp'] ?></td>
				<td align=""><?= $dta['tgl_bayar'] ?></td>
				<td align="right"><?= $dta['jumlah_bayar'] ?></td>
				<td align="">Pembayaran SPP bulan <?= $dta['bulan_dibayar'] ?></td>
			</tr>
			<?php $i++; ?>
			<?php $total += $dta['jumlah_bayar']; ?>

		<?php endwhile; ?>
		<tr>
			<td colspan="7" align="right">TOTAL</td>
			<td align="right"><b><?= $total ?></b></td>
			<td></td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td></td>
			<td width="200px">
				<BR />
				<p>Cimahi , <?= date('d/m/y') ?> <br />
					Petugas,
					<br />
					<br />
					<br />
				<p>__________________________</p>
			</td>
		</tr>
	</table>


	<a href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>

</html>