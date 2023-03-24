<?php
include '../koneksi.php';
include 'header.php';

session_start();
if (!isset($_SESSION["login_petugas"])) {
    echo "<script>
            alert('Anda Harus Login');
            document.location.href = '../login.php';
            </script>";;
}


if (isset($_GET['nisn']) && $_GET['nisn'] != '') {
    $nisn = $_GET['nisn'];
    $biodataSiswa = mysqli_query($konek, "SELECT * FROM siswa
    JOIN kelas ON siswa.id_kelas=kelas.id_kelas
    WHERE nisn='$nisn'");
    $historyPembayaran = mysqli_query($konek, "SELECT * FROM pembayaran
        JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
        JOIN spp ON pembayaran.id_spp=spp.id_spp
        WHERE nisn='$nisn'");
    $bio_siswa = mysqli_fetch_assoc($biodataSiswa);

?>

    <div class="content-all">
        <h2>History Siswa <?= $bio_siswa['nama']; ?></h2>


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
            while ($trans = mysqli_fetch_assoc($historyPembayaran)) { ?>
                <tr>
                    <td align="center"><?= $i; ?></td>
                    <td><?= $trans['tgl_bayar']; ?></td>
                    <td><?= $trans['nama_petugas']; ?></td>
                    <td><?= $trans['bulan_dibayar'] . " | " . $trans['tahun_dibayar']; ?></td>
                    <td><?= "Rp. " . $trans['nominal']; ?></td>
                    <td><?= "Rp. " . $trans['jumlah_bayar']; ?></td>
                    <?php $i++; ?>
                <?php } ?>
                </tr>

            <?php } ?>
        </table>


    </div>


    <?php include '../footer.php'; ?>