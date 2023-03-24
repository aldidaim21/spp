<?php



session_start();

include '../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];

    if ($nis == "") {
        $error = true;
    } else {
        $data = $konek->query("SELECT * FROM siswa WHERE nis ='" . $nis . "'");
        $dt = mysqli_num_rows($data);
        $dta = mysqli_fetch_Assoc($data);

        if ($dt > 0) {
            $data_user = mysqli_fetch_assoc($data);
            $_SESSION['id'] = $data_user['id'];
            $_SESSION['login_siswa']    = TRUE;
            $_SESSION['nis'] = $nis;
            $_SESSION['status'] = "login";
            $_SESSION['nama'] = $nama;
            $_SESSION['alamat'] = $alamat;
            $_SESSION['nisn'] = $nisn;
            header("location:index.php");
        } else {
            echo "
        <script>
        alert('Username atau Password anda salah');
        document.location.href = 'login_siswa.php';
        </script>
        ";
        }
    }
}
