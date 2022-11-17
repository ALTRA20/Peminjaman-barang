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
		if ($loginSuccesful) {
			header('Location: /peminjaman-barang/view/');
		}else{
			return $error = [
				"errorMassage" => "Akun tidak ditemukan silahkan periksa nis atau password anda"
			];
		}
	}

	public function confirmAccount($dataConfirmationAccount)
	{
		$checkAccount = $this->authenticate->confirmAccount($dataConfirmationAccount);
		$checkAccountSucces = $checkAccount != null;
		if ($checkAccountSucces) {
			header('Location: /peminjaman-barang/auth/forgotPassword.php');
		}else{
			return $error = [
				"message" => "Akun tidak ditemukan silahkan periksa nis atau nama ibu kandung anda"
			];
		}
	}

	public function newPassword($newPassword)
	{
		$newPasswordHash = md5($newPassword['newPassword']);
		$confirmNewPasswordHash = md5($newPassword['confirmNewPassword']);
		if ($newPasswordHash == $confirmNewPasswordHash) {
			$cekPassword = $this->authenticate->newPassword($newPasswordHash);
			if(isset($cekPassword['errorMassage'])){
				return $error = [
					'errorMassage' => $cekPassword['errorMassage']
				];
			}else{
				header('Location: /peminjaman-barang/auth/login.php');
			}
		}else{
			return $error = [
				"message" => "Password yang anda masukkan berbeda"
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