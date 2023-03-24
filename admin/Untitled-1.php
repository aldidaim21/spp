<b>LAPORAN DATA SISWA</b>
<br />
<hr />

<table class="table table-striped table-hover">
	<tr>
		<th>NO</th>
		<th>NISN</th>
		<th>NIS</th>
		<th>NAMA SISWA</th>
		<th>KELAS</th>
		<th>Alamat</th>
	</tr>
	<?php
	$data = $konek->query("SELECT * FROM siswa ORDER BY nisn ASC ");
	$i = 1;
	while ($dta = mysqli_fetch_assoc($data)) :
	?>
		<tr>
			<td align="center"><?= $i ?></td>
			<td align="center"><?= $dta['nisn'] ?></td>
			<td align="center"><?= $dta['nis'] ?></td>
			<td align=""><?= $dta['nama'] ?></td>
			<td align=""><?= $dta['id_kelas'] ?></td>
			<td align=""><?= $dta['alamat'] ?></td>
		</tr>
		<?php $i++;	?>
	<?php endwhile; ?>
</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Cimahi , <?= date('d/m/y') ?> <br />
				petugas,
				<br />
				<br />
				<br />
			<p>________________________________</p>
		</td>
	</tr>
</table>


<a href="#" onclick="window.print();"><button class="print">CETAK</button></a>