<?php 
include 'koneksi.php';

	$hapus  = $konek -> query("DELETE FROM siswa WHERE nisn ='$_GET[nisn]' ");
	if($hapus){
		echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'datasiswa.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('data gagal dihapus data digunakan ditabel lain');
		document.location.href = 'datasiswa.php';
		</script>
		";

	}

 ?>