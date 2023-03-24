<!-- koneksi php -->
<?php
include '../koneksi.php';
$data = $konek->query("SELECT * FROM siswa ORDER BY nisn ASC ");
$i = 1;


session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('Anda Harus Login');
		document.location.href = '../login.php';
		</script>";;
} ?>

<!-- link html -->


<!-- document html -->
<!DOCTYPE html>
<html>

<head>
	<title>Laporan Siswa</title>
	<link rel="stylesheet" href="../asset/style.css">

</head>

<body>

	<div class="content-all">

		<h4 class="text-center">Laporan Pembayaran SPP</h4>

		<hr>


		<table class="tabel">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">NISN</th>
					<th scope="col">NIS</th>
					<th scope="col">Nama Siswa</th>
					<th scope="col">Kelas</th>
					<th scope="col">Alamat</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $row) : ?>
					<tr>
						<th scope="row"><?= $i++; ?></th>
						<td><?= $row['nisn'] ?></td>
						<td><?= $row['nis'] ?></td>
						<td><?= $row['nama'] ?></td>
						<td><?= $row['id_kelas'] ?></td>
						<td><?= $row['alamat'] ?></td>
					</tr>
			</tbody>
		<?php endforeach ?>
		<a href="#" onclick="window.print();"><button class="print">CETAK</button></a>
		</table>
	</div>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</html>