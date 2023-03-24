<?php 
include 'koneksi.php';

	$hapus  = $konek -> query("DELETE FROM kelas WHERE id_kelas ='$_GET[id_kelas]' ");
	if($hapus){
		echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'datakelas.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('data gagal dihapus data digunakan ditabel lain');
		document.location.href = 'datakelas.php';
		</script>
		";

	}

 ?>