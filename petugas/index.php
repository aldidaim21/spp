<?php
include 'header.php';
session_start();
if (!isset($_SESSION["login_petugas"])) {
	echo "<script>
            alert('Anda Harus Login');
            document.location.href = '../login.php';
            </script>";;
}
?>


<div class="gambar">
	<img src="../asset/img/pano2.jpg" class="cover" alt="">
</div>

<div class="content-dashboard">
	<div class="content-dashboard1">
		<h1>Website Petugas<br> Pembayaran SPP</h1>
		<h1>SMK PUSDIKHUBAD CIMAHI</h1>
	</div>
</div>
<?php include '../footer.php' ?>