<?php 

include "../model/MethodsModel.php";
include "../model/authentication.php";


class MethodsControler extends MethodsModel
{
	
	function __construct()
	{
		$this->database = new mysqli("localhost","root","","peminjaman_laptop");
		$this->methods = new MethodsModel();
		$this->authenticate = new Authentication();
	}

	public function Login($inputanLogin)
	{
		$login = $this->authenticate->login($inputanLogin);
		$loginSuccesful = $login != null;
		// var_dump($login==null);
		// echo $_SESSION['status'];
		// die();
		if ($loginSuccesful) {
			header('Location: /peminjaman-barang/view/');
		}else{
			return $error = [
				"message" => "Akun tidak ditemukan silahkan periksa nis atau password anda"
			];
		}
	}

	public function logout()
	{
		$this->authenticate->logout();
	}

	public function insertDataPeminjaman($dataPeminjaman)
	{
		$isInsert = $this->methods->InsertDataPeminjamanBarang($dataPeminjaman);
		$this->authenticate->logout();
	}

	public function findItemsByNumberItems($table, $number)
	{
		// echo $number;
		// die();
		return $barang = $this->methods->findItemsByNumberItems($table, $number);
	}

	public function cariBarangWhereId($dataPeminjaman)
	{
		$isInsert = $this->methods->InsertDataPeminjamanBarang($dataPeminjaman);

			return $authenticate->logout();
		
	}




}

// $dataPeminjaman = [
// 	'nama' => "aldo",
// 	'nis' => 7642,
// 	'kelas' => 12,
// 	'jurusan' => "TI",
// 	'id' => 1,
// 	'merk' => "asus",
// 	'seri' => "dsh382",
// 	'nomor' => "1",
// 	'jenis_barang' => "laptop"
// ];

// $inputanLogin = [
// 	'nis' => 7642,
// 	'password' => md5("aldo 14")
// ];

$methodsControler = new MethodsControler;
// $user->insertDataPeminjaman($dataPeminjaman);
// $login = $user->login($inputanLogin);
	

 ?>