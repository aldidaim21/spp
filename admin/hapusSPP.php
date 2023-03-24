<?php 
include 'koneksi.php';

	$hapus  = $konek -> query("DELETE FROM spp WHERE id_spp ='$_GET[id_spp]' ");
	if($hapus){
		echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'dataspp.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('data gagal dihapus data digunakan ditabel lain');
		document.location.href = 'dataspp.php';
		</script>
		";

	}

 ?>