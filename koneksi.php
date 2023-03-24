<?php
$konek = mysqli_connect('localhost', 'root', '', 'db_spp');
// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

function query($query)
{
	global $konek;
	$result = mysqli_query($konek, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function cari($keyword)
{
	$query = "SELECT * FROM siswa
			WHERE 
			nis LIKE '%$keyword%' OR
			nisn LIKE '%$keyword%' OR
			nama LIKE '%$keyword%'
			";
	return query($query);
}


function cari_admin($keyword_admin)
{
	$query = "SELECT * FROM petugas
			WHERE 
			nama_petugas LIKE '%$keyword_admin%'
			";
	return query($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

</body>