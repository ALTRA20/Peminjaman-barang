<?php 


class Authentication 
{
	
	function __construct()
	{
		$this->database = new mysqli("localhost","root","","peminjaman_laptop");
	}

	public function login ($inputanLogin)
	{ 
		session_start();
		$nis = $inputanLogin['nis'];
		$password = md5($inputanLogin['password']);
		$this->query = $this->database->query("SELECT * FROM `user` WHERE `NIS`='$nis' AND `password`='$password'");

		//cek apakah data query ada atau tidak
		//jika data ada :
		if($this->query->num_rows > 0) {

			//mengambil role user dari hasil query
			$role = $this->database->query("SELECT `role` FROM `user` WHERE `NIS`='$nis' AND `password`='$password'");
			
			while ($r = $role->fetch_object()) {
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
}


$Authentication = new Authentication();


 ?>