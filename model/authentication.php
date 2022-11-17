<?php 


class Authentication 
{
	
	function __construct()
	{
		$this->database = new mysqli("localhost","root","","peminjaman_laptop");
	}

	public function login($inputanLogin)
	{ 
		session_start();
		$nis = $inputanLogin['nis'];
		$password = md5($inputanLogin['password']);
		$this->query = $this->database->query("SELECT * FROM `user` WHERE `NIS`='$nis' AND `password`='$password'");

		//cek apakah data query ada atau tidak
		//jika data ada :
		if($this->query->num_rows > 0) {

			//mengambil role user dari hasil query
			while ($r = $this->query->fetch_object()) {
					$isRole = $r->role;
				}

			$_SESSION['status']="login"; 
			$_SESSION['nis']=$nis;
			return $_SESSION['role']=$isRole;
		//jika data tidak kembalikan hasil null
		}else{
			return null;
		}  
	}

	public function logout()
	{
		return session_destroy();
	}

	public function register($datas)
	{
		if (isset($datas['nis']) && isset($datas['password']) && isset($datas['nama_ibu_kandung'])) {
			$nis = $datas['nis'];
			$password = $datas['password'];
			$namaIbuKandung = $datas['nama_ibu_kandung'];
			$this->query = $this->database->query("INSERT INTO `user` (`id`,`NIS`,`password`,`nama_ibu_kandung`) VALUES (null,$nis,'$password','$namaIbuKandung') ");
			header('Location: index');
		}else{
			echo "gagal";
		}
	}

	public function confirmAccount($dataConfirmationAccount)
	{
		session_start();
		$nis = $dataConfirmationAccount['nis'];
		$nameMother = $dataConfirmationAccount['biological_mothers_name'];
		$query = $this->database->query("SELECT * FROM `user` WHERE `NIS`=$nis AND `nama_ibu_kandung`= '$nameMother'");
		$isSuccess = $query->num_rows!=0;
		// var_dump($query->num_rows!=0);
		if($isSuccess){
		// 	echo "succes";
		// die();
			$_SESSION['forgotPassword'] = "yes";
			return $_SESSION['NISforgotPassword'] = $nis;
		}else{
			return null;
		}
	}

	public function newPassword($newPassword)
	{
		$nis = $_SESSION['NISforgotPassword'];
		$checkAccount= $this->database->query("SELECT * FROM `user` WHERE `NIS`=$nis");
		while ($ca = $checkAccount->fetch_object()) {
			$id = $ca->id;
			$NIS = $ca->NIS;
			$password = $ca->password;
			$nama_ibu_kandung = $ca->nama_ibu_kandung;
			$role = $ca->role;
			// echo $password;
			// echo '<br>';
			// echo $newPassword;
			// echo '<br>';
			// var_dump($password == $newPassword);	
			$passwordSamaDenganSebelumnya = $password == $newPassword;
		}
		// var_dump($passwordTidakSamaDenganSebelumnya);
		// die();
		if ($passwordSamaDenganSebelumnya) {
			return $error = [
				'errorMassage' => "Password sudah pernah digunakan, silahkan masukkan password yang lainnya"
			];
		}else{
			$this->database->query("UPDATE `user` SET `id`=$id, `NIS`=$NIS,`password`='$newPassword',`nama_ibu_kandung`='$nama_ibu_kandung',`role`='$role' WHERE `id`=$id");
		}
	}
}


$Authentication = new Authentication();


 ?>