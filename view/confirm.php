<?php include '../controler/MethodsControler.php' ?>
<?php 
	session_start();
    if (isset($_SESSION['status']) && isset($_SESSION['nis'])) {
        "";
    }else{
        header("location:/peminjaman-barang/auth/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Items</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<?php 
	$typeOfItems = $_REQUEST['jenis_barang'];
	$number = $_REQUEST['no_barang'];
	$nis = $_SESSION['nis'];
	$findItemByNumber = $methodsControler->findItemsByNumberItems($typeOfItems, $number);
	$findLoanDataBytypeOfItemsAndNumber = $methodsControler->dataPeminjaman($typeOfItems, $number);
	$findStudentByNis = $methodsControler->getWhereNis('siswa', $nis);

	$someoneBorrowed = $findLoanDataBytypeOfItemsAndNumber->num_rows > 0;
	$itemAvailable = $findItemByNumber->num_rows > 0;
 ?>
<?php if ($someoneBorrowed) : ?>
	<div class="d-flex justify-content-center align-items-center">
		<h3 class="text-danger"><?= $typeOfItems ?> nomor <?= $number ?> Sedang Dipinjam</h3>
	</div>
<?php else: ?>
	<?php if ($itemAvailable) : ?>
		
		<?php while ($item = $findItemByNumber->fetch_object()) : ?>
			<section class="row d-flex justify-content-center align-items-center fs-5" style="height:800px;">
				<div class="border border-dark col-3 py-4" style="width: 30%;height:60%;">
					<h4 class="text-center ">Konfirmasi Peminjaman</h4>
					<div>
						<i class="text-danger">*INFORMASI LAPTOP</i>
						<div class="d-flex mt-1">
							<div class="" style="background:url('/peminjaman-barang/src/img/<?= $item->img ?>'); background-size: cover; background-position: center; width: 70px; height:60px;"></div>
							<div>
								<p class="m-0 ms-2"><b class="me-1" style="">Merk laptop : </b> <?= $item->merk ?></p>
					 			<p class="m-0 ms-2"><b class="me-1" style="">Seri laptop : </b> <?= $item->seri ?></p>
					 			<p class="m-0 ms-2"><b class="me-1" style="">Nomor laptop : </b> <?= $item->nomor ?></p>
							</div>
						</div>
						<?php while ($student = mysqli_fetch_assoc($findStudentByNis)) : ?>
						<i class="text-danger">*IDENTITAS DIRI</i>
						<p class="m-0 d-block"><b class="d-inline">Nama : </b><?= $student['nama'] ?></p>
						<p class="m-0 d-block"><b class="d-inline">Nis : </b><?= $student['NIS'] ?></p>
						<p class="m-0 d-block"><b class="d-inline">Kelas : </b><?= $student['kelas'] ?></p>
						<p class="m-0 d-block"><b class="d-inline">Jurusan : </b><?= $student['jurusan'] ?></p>
						<i><b>*Meminjam pada tanggal <?= date("d F Y") ?></b></i>
					</div>
					<form class="d-inline" method="POST" action="">
						<!-- user -->
						<input type="hidden" name="nis" id="" value="<?= $student['NIS'] ?>">
						<input type="hidden" name="nama" id="" value="<?= $student['nama'] ?>">
						<input type="hidden" name="kelas" id="" value="<?= $student['kelas'] ?>">
						<input type="hidden" name="jurusan" id="" value="<?= $student['jurusan'] ?>">
						<!-- laptop -->
						<input type="hidden" name="id" id="" value="<?= $item->id ?>">
						<input type="hidden" name="merk" id="" value="<?= $item->merk ?>">
						<input type="hidden" name="seri" id="" value="<?= $item->seri ?>">
						<input type="hidden" name="nomor" id="" value="<?= $item->nomor ?>">
						<button type="submit" name="konfirmasi" class="btn btn-lg btn-success mt-4">Konfirmasi</button>
					</form>
					
					<?php if ($typeOfItems==="kamera") : ?>
					 	<a href='/peminjaman-barang/view/inputNomor.php?jenis_barang=kamera' class='btn btn-lg btn-danger mt-4'>Kembali</a>
					<?php endif; ?>
					<?php if ($typeOfItems==="laptop") :  ?>
					 	<a href='/peminjaman-barang/view/inputNomor.php?jenis_barang=laptop' class='btn btn-lg btn-danger mt-4'>Kembali</a>
					<?php endif; ?>
					<?php if ($typeOfItems==="proyektor") :  ?>
					 	<a href='/peminjaman-barang/view/inputNomor.php?jenis_barang=proyektor' class='btn btn-lg btn-danger mt-4'>Kembali</a>
					<?php endif; ?>
				</div>
			</section>
			<?php endwhile; ?>
		<?php endwhile; ?>
	<?php else: ?>
		<div class="d-flex justify-content-center align-items-center">
			<h3 class="text-danger">Barang Sedang Tidak Ditemukan</h3>
		</div>
	<?php endif ?>
<?php endif ?>

<?php 
//insert data
if (isset($_POST['konfirmasi'])) {
	$_POST['jenis_barang']=$typeOfItems;
	 $methodsControler->insertDataPeminjaman($_POST);
	 header('Location: /peminjaman-barang/auth/login.php');
}

 ?>