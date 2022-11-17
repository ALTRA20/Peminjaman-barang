<?php include '../controler/MethodsControler.php' ?>
<?php 
session_start();
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
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
	<section class="row bg-dark p-5" style="height:800px;">
		<div class="col-2  border border-white border-top-0 border-bottom-0 border-start-0">
			<div>
				 <form class="d-flex form-inline m-2 my-lg-0">
			      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			    </form>
			</div>
			<div class="col-12 mt-5" style="">
				<img src="/peminjaman-barang/src/img/logoYappi.png" alt="" class="" style="width: inherit;">
			</div>
			<div class="d-flex flex-column flex-column-reverse align-items-center" style="height:24em;">
				<form class="border border-success rounded-pill text-center bg-danger" action="/peminjaman-barang/auth/logout.php">
					<button class="bg-transparent border-0 text-white px-5 py-3" style="">Logout</button>
				</form>
				<div class="border border-success bg-warning rounded-pill text-center my-2 px-5 py-1" style="">
					<a href='/peminjaman-barang/bantuan/' class="text-decoration-none text-dark">Bantuan</a>
				</div>
			</div>
		</div>
		<div class="col-10 ">
		<I><h1 class="text-white text-center">PEMINJAMAN BARANG SMK YAPPI WONOSARI</h1></I>
			<div class="row d-flex justify-content-center align-items-center" style="height: 100%;">
				<a href='inputNomor.php?jenis_barang=kamera' class="col-2 d-flex flex-column-reverse p-0 my-2 mx-3" style="background:url('/peminjaman-barang/src/img/Kamera.jpg'); background-size: cover; background-position: center; height:170px;">
					<div class="text-center" style="background:rgba(0, 0, 0, 0.7);">
						<h4 class="text-white">Kamera</h4>
					</div>
				</a>
				<a href='inputNomor.php?jenis_barang=laptop' class="col-2 d-flex flex-column-reverse p-0 my-2 mx-3" style="background:url('/peminjaman-barang/src/img/laptop.jpg'); background-size: cover; background-position: center; height:170px;">
					<div class="text-center" style="background:rgba(0, 0, 0, 0.7);">
						<h4 class="text-white">Laptop</h4>
					</div>
				</a>
				<a href='inputNomor.php?jenis_barang=proyektor' class="col-2 d-flex flex-column-reverse p-0 my-2 mx-3" style="background:url('/peminjaman-barang/src/img/proyektor.jpg'); background-size: cover; background-position: center; height:170px;">
					<div class="text-center" style="background:rgba(0, 0, 0, 0.7);">
						<h4 class="text-white">Proyektor</h4>
					</div>
				</a>
				
			</div>
		</div>
	</section>
</body>
</html>