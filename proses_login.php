<?php

include 'koneksi.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$username  = $_POST['username'];
	$password  = $_POST['password'];

	if ($username == "" || $password == "") {
		echo "
				<script>
				alert('Username atau Password tidak boleh kosong');
				document.location.href = '/spp/login.php';
				</script>
				";
	} else {
		$data = $konek->query("SELECT * FROM petugas WHERE username ='" . $username . "' AND password = '" . $password . "'");
		$dt = mysqli_num_rows($data);
		$dta = mysqli_fetch_Assoc($data);

		if ($dt > 0) {

			if ($dta['level'] == "admin") {

				// buat session login dan username
				session_start();
				$_SESSION['login']    = TRUE;
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "admin";
				// alihkan ke halaman dashboard admin
				header("location:admin/index.php");

				// cek jika user login sebagai pegawai
			} else if ($dta['level'] == "petugas") {
				// buat session login dan username
				session_start();
				$_SESSION['login_petugas']    = TRUE;
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "petugas";
				// alihkan ke halaman dashboard pegawai
				header("location:petugas/index.php");
			} else {
				echo "
				<script>
				alert('username atau password anda salah');
				document.location.href = 'login.php';
				</script>
				";
			}
		} else {
			echo "
		<script>
		alert('username atau password anda salah');
		document.location.href = 'login.php';
		</script>
		";
		}
	}
} ?>
}