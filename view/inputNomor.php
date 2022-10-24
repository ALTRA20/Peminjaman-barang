<?php include "../model/MethodsModel.php"; ?>
<?php 
session_start();
// echo $_SESSION['status'];		
if (isset($_SESSION['status']) && isset($_SESSION['nis'])) {
        "";
    }else{
        header("location: ../auth/login.php");
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Peminjaman</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body class="px-5">
<?php 
	$jenisBarang = $_REQUEST['jenis_barang'];
 ?>
	
	<section class="row p-5">
		<div class="col " style="background:url('/peminjaman/src/img/<?= $jenisBarang ?>.jpg'); background-size: cover; background-position: center; height:600px;"></div>
		<div class="col d-flex justify-content-center align-items-center">
		 	<form class="me-1" method="" action="confirm.php" role="search" style="width:inherit; height: fit-content;">
		 		<input type="hidden" name="jenis_barang" class="form-control" value="<?= $jenisBarang ?>">
		 		<input type="number" autocomplete="true" name="no_barang" class="form-control me-2 mb-5" type="search" placeholder="Nomor <?= $jenisBarang ?>" aria-label="no_barang" autofocus style="width: 100%;">
		 		<button type="submit" class="btn btn-outline-success mt-5" style="width: 100%; height: inherit;">Konfirmasi</button>
		 	</form>
		</div>
	</section>
	<a href="/peminjaman/view" class="btn btn-lg btn-warning fs-2 my-2" style="width:100%">Home</a>
</body>
</html>