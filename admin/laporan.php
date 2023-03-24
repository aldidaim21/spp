<?php include 'header.php';

session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = '../login.php';
		</script>";;
} ?>




<div class="content-all">
	<h2>Laporan Data</h2>


	<table border="1">
		<tr>
			<th>Nama Laporan</th>
			<th width="200">Cetak</th>
		</tr>
		<tr>
			<td>
				Laporan Data Siswa
			</td>
			<td>
				<a href="laporan_siswa.php" target="_blank"><button> CETAK</button></a>
			</td>
		</tr>



		<form action="laporan_pembayaran.php" method="GET" target="_blank">
			<td>
				<b>Laporan Pembayaran</b>
			</td>
			<td>
				Mulai Tanggal <input type="date" name="tgl1" value="<?= date('Y-m-d') ?>">
				Sampai Tanggal <input type="date" name="tgl2" value="<?= date('Y-m-d') ?>">
				<button type="submit" name="tampil">Tampilkan</button>
			</td>
		</form>
		</tr>
	</table>
</div>
<?php include '../footer.php' ?>