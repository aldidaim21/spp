<?php
include 'header.php';
include '../koneksi.php';
session_start();
if (!isset($_SESSION["login_siswa"])) {
	echo "<script>
			alert('Anda Harus Login');
			document.location.href = 'login_siswa.php';
			</script>";;
}
if (isset($_SESSION['nis']) && $_SESSION['nis'] != '') {
	$nis = $_SESSION['nis'];
	$biodataSiswa = mysqli_query($konek, "SELECT * FROM siswa
    WHERE nis='$nis'");
	$bio_siswa = mysqli_fetch_assoc($biodataSiswa);
}
?>


<div class="gambar">
	<img src="../asset/img/pano2.jpg" class="cover" alt="">
</div>



<div class="content-dashboard">
	<div class="content-dashboard1">
		<h1>Website <br> Pembayaran SPP</h1>
		<h1>SMK PUSDIKHUBAD CIMAHI</h1>
		<br>
		<h1>Welcome <?php echo $bio_siswa['nama']; ?></h1>
	</div>


	<div class="content-yt">
		<h1>About Us</h1>
		<iframe src=" https://www.youtube.com/embed/2Tisimd8Hfg" width="560" height="316" class="yt" frameborder="0">
		</iframe>
		<br><br>
		<iframe src="https://www.youtube.com/embed/FLbOPO1zYpU" width="560" height="316" class="yt" frameborder="0">
		</iframe>
		<br><br>
		<iframe src="https://www.youtube.com/embed/etM6Y0zItL8"" width=" 560" height="316" class="yt" frameborder="0">
		</iframe>
	</div>

</div>
<?php include '../footer.php' ?>