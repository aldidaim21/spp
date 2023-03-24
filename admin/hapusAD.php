<?php 
	include '../koneksi.php';
	$hapus = $konek -> query("DELETE FROM petugas WHERE id_petugas= '$_GET[id_petugas]' ");
	if ($hapus) {
		echo "
		<script>
		alert('data admin berhasil dihapus');
		document.location.href= 'dataadmin.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('data admin digunakan ditabel siswa');
		alert('data admin gagal dihapus');
		document.location.href= 'dataadmin.php';
		</script>
		";
	}
