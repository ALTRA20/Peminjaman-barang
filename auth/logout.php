<?php 

include '../controler/MethodsControler.php';
session_start();
$methodsControler->logout();
	 header('Location: /peminjaman-barang/auth/login.php');
 ?>