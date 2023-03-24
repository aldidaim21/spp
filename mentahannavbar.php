<nav>
    <a href="dashboard.php">Aplikasi Pembayaran SPP</a> |
    <a href="dashboard.php">Home</a> |
    <a href="dataadmin.php">DATA ADMIN</a> |
    <a href="datasiswa.php">DATA SISWA</a> |
    <a href="datakelas.php">DATA KELAS</a> |
    <a href="dataspp.php">DATA KATEGORI SPP</a> |
    <a href="transaksi.php">TRANSAKSI</a> |
    <a href="laporan.php">LAPORAN</a> |
    <a href="logout.php">LOGOUT</a>
</nav>


<?php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>
		alert('Login Untuk Mengakses Halaman');
		document.location.href = 'login.php';
		</script>";
    exit;
}
?>

<?php include 'header.php'; ?>
<h2 align="center">SELAMAT DATANG DI HALAMAN UTAMA WEB SPP</h2>
<H5 align="center">SMK PUSDIKHUBAD</H5>



<?php include 'footer.php'; ?>