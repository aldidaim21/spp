    <?php
    include '../koneksi.php';
    include 'header.php';


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
        JOIN kelas ON siswa.id_kelas=kelas.id_kelas
        WHERE nis='$nis'");
        $bio_siswa = mysqli_fetch_assoc($biodataSiswa);


    ?>
        <div class="content-all">
            <div class="content-dashboard1">
                <h2>Biodata Siswa</h2>

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
                        <td style="text-transform: uppercase;"><?= $bio_siswa['nama']; ?></td>
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
            </div>
        </div>
    <?php } ?>