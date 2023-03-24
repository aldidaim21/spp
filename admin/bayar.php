<?php
include '../koneksi.php';
include 'header.php';
if (isset($_GET['nisn']) && $_GET['nisn'] != '') {
    $data = $konek->query("SELECT * FROM siswa WHERE nisn = '$_GET[nisn]'");
    $dta = mysqli_fetch_assoc($data);

    session_start();
    if (!isset($_SESSION["login"])) {
        echo "<script>
            alert('Anda Harus Login');
            document.location.href = '../login.php';
            </script>";;
    } ?>



    <!-- konten -->
    <div class="content-all">
        <h2>Pembayaran Siswa</h2>





        <table>
            <form action="" method="get">
                <table>
                    <tr>
                        <td>NISN </td>
                        <td>: <input type="text" name="nisn" value="<?= $dta['nisn'] ?>"></td>
                    </tr>
                    <!-- <tr>
			<td>NIS </td>
			<td>: <input type="text" name="nis" value="<?= $dta['nis'] ?>"></td>
		</tr>
        
		<tr>
			<td>Nama Siswa </td>
			<td>: <input type="text" name="nama" value="<?= $dta['nama'] ?>"></td>
		</tr>
		<tr>
			<td>ID Kelas </td>
			<td>: <input type="text" name="id_kelas" value="<?= $dta['id_kelas'] ?>"></td>
		</tr>
		<tr>
			<td>Alamat </td>
			<td>: <input type="text" name="alamat" value="<?= $dta['alamat'] ?>"></td>
		</tr>
        <tr>
			<td>No Telepon </td>
			<td>: <input type="text" name="no_telp" value="<?= $dta['no_telp'] ?>"></td>
		</tr> -->
                    <tr>
                        <td>ID Pembayaran </td>
                        <td>: <input type="text" name="id_pembayaran" placeholder="Masukan ID Pembayaran"></td>
                    </tr>
                    <tr>
                        <td>ID Petugas </td>
                        <td>:
                            <select name="id_petugas">
                                <option value="" selected>-PETUGAS-</option>
                                <?php
                                $dataptg = mysqli_query($konek, "SELECT * FROM petugas ORDER BY id_petugas ASC");
                                while ($dptg = mysqli_fetch_assoc($dataptg)) {
                                ?>
                                    <option value="<?= $dptg['id_petugas']; ?>"><?= $dptg['nama_petugas']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </tr>
                    </tr>
                    <tr>
                        <td>Tanggal Bayar </td>
                        <td>: <input type="date" name="tgl_bayar"></td>
                    </tr>
                    <tr>
                        <td>Untuk Pembayaran Bulan</td>
                        <td>:
                            <select name="bulan_dibayar" id="bulan_dibayar">
                                <option value="Januari">Januari</option>
                                <option value="Fabruari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Untuk Pembayaran Tahun</td>
                        <td>: <input type="text" name="tahun_dibayar" placeholder="Masukan Tahun"></td>
                    </tr>
                    <tr>
                        <td>ID Kategori SPP </td>
                        <td>: <input type="text" name="id_spp" value="<?= $dta['id_spp'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Bayar </td>
                        <td>:
                            <?php
                            $id_spp = $dta['id_spp'];
                            $datanominal = mysqli_query($konek, "SELECT * FROM spp where id_spp ='$id_spp'");
                            $dtna = mysqli_fetch_assoc($datanominal);
                            ?>
                            <input type="text" name="jumlah_bayar" value="<?= $dtna['nominal'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right">
                            <button type="submit" name="bayar">Bayar</button>
                        </td>
                    </tr>
                </table>
            </form>
        <?php
    }
        ?>
    </div>
    <?php
    if (isset($_GET['bayar'])) {
        $id_pembayaran = $_GET['id_pembayaran'];
        $id_petugas = $_GET['id_petugas'];
        $nisn = $_GET['nisn'];
        $tgl_bayar = $_GET['tgl_bayar'];
        //$tgl_bayar = date_format ( $tanggal_bayar, 'Y-m-d' );
        $bulan_dibayar = $_GET['bulan_dibayar'];
        $tahun_dibayar = $_GET['tahun_dibayar'];
        $id_spp = $_GET['id_spp'];
        $jumlah_bayar = $_GET['jumlah_bayar'];

        $exec = mysqli_query($konek, "INSERT INTO pembayaran(id_pembayaran,id_petugas,nisn,tgl_bayar,bulan_dibayar,tahun_dibayar,id_spp,jumlah_bayar) Values ('$id_pembayaran','$id_petugas','$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar','$id_spp','$jumlah_bayar')");

        if ($exec) {
            echo "
 		<script>
 		alert('data pembayaran berhasil ditambahkan');
 		document.location.href = 'transaksi.php';
 		</script>
 		";
        } else {
            echo "
 		<script>
 		alert('data pembayaran gagal ditambahkan');
 		document.location.href = 'transaksi.php';
 		</script>
 		";
        }
    }


    ?>

    <?php include '../footer.php' ?>