<?php 
include '../koneksi.php';
include '../header.php';
include 'sidebar.php';
 ?>

<link rel="stylesheet" href="/spp/style.css">

<div class="main-content">
<div class="form-data">
<div class="container">
<h3>History Pembayaran SPP</h3>
<p style="color: red;">Mencari History Pembayaran berdasarkan NISN </p>
<form action="" method="POST">
<table>
 		<tr>
 			<td>Cari Siswa</td>
 			<td>:</td>
 			<td>
 				<input type="text" name="nisn" placeholder="Masukan NIS">
 			</td>
 			<td>
 				<button type="submit" name="cari">Cari</button>
 			</td>
 		</tr>		
 	</table>
</form>
<?php

if(isset($_POST['cari'])){
    $nisn = $_POST['nisn'];
    $biodataSiswa = mysqli_query($konek, "SELECT * FROM siswa
                    JOIN kelas ON siswa.id_kelas=kelas.id_kelas
                    WHERE nisn='$nisn'");
    $historyPembayaran = mysqli_query($konek, "SELECT * FROM pembayaran
                        JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
                        JOIN spp ON pembayaran.id_spp=spp.id_spp
                        WHERE nisn='$nisn'");
    $bio_siswa = mysqli_fetch_assoc($biodataSiswa);
?>

<h3>Biodata Siswa</h3>
<table cellpadding="5">
    <tr>
        <td>NISN</td>
        <td>:</td>
        <td><?= $bio_siswa['nisn']; ?></td>
    </tr>
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td><?= $bio_siswa['nis']; ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $bio_siswa['nama']; ?></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td><?= $bio_siswa['nama_kelas']; ?></td>
    </tr>
    <tr>
        <td>Kompetensi Keahlian</td>
        <td>:</td>
        <td><?= $bio_siswa['kompetensi_keahlian']; ?></td>
    </tr>
</table>

<hr />
<table border="1">
    <tr>
        <td>NO</td>
        <td>TANGGAL PEMBAYARAN</td>
        <td>MELALUI PETUGAS</td>
        <td>BULAN | TAHUN YANG DIBAYAR</td>
        <td>NOMINAL YANG HARUS DIBAYAR</td>
        <td>JUMLAH YANG SUDAH DIBAYAR</td>
    </tr>
<?php 
$i = 1;
while($trans = mysqli_fetch_assoc($historyPembayaran)){ ?>
    <tr>
        <td align="center"><?= $i; ?></td>
        <td><?= $trans['tgl_bayar']; ?></td>
        <td><?= $trans['nama_petugas']; ?></td>
        <td><?= $trans['bulan_dibayar'] . " | " . $trans['tahun_dibayar']; ?></td>
        <td><?= "Rp. " . $trans['nominal']; ?></td>
        <td><?= "Rp. " . $trans['jumlah_bayar']; ?></td>
<?php $i++;?>
<?php } ?>
    </tr>

<?php } ?>
</table>


</div>
</div>
</div>

<?php include '../footer.php'; ?>