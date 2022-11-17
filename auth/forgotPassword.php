<?php include '../controler/MethodsControler.php' ?>
<?php 
	session_start();
	if (isset($_SESSION['forgotPassword'])!="yes") {
		header('Location: /peminjaman-barang/auth/confirmAccount.php');
	}else{
		"";
	}
?>
<?php 
$confirmNewPasswordClicked = isset($_POST['confirm_new_password']);
if ($confirmNewPasswordClicked) {
    $newPassword = $methodsControler->newPassword($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <section class="row d-flex justify-content-center align-items-center border bg-white" id="body" style="height:800px;">
        <form class="col-3 rounded px-4 pb-4 pt-4 bg-white border" action="" method="POST">
            <h3 class="mb-4">NEW PASSWORD</h3>
            <?php 
                $isErrorMassage = $newPassword['errorMassage']; 
                if(isset($isErrorMassage)) {
                   echo '<i class="text-danger">'.$isErrorMassage.'</i>';
                }  
            ?>
            <div class="form-outline mb-4">
                <label class="form-label" for="newPassword">New Password</label>
                <input type="password" id="newPassword" class="form-control" name="newPassword" placeholder="Enter your New password" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="confirmNewPassword">Confirm New Password</label>
                <input type="password" id="confirmNewPassword" class="form-control" name="confirmNewPassword" placeholder="Confirm New Password" />
            </div>
            <div class="form-outline mb-4 row">
                <button class="btn btn-primary" name="confirm_new_password">Submit</button>
            </div>
        </form>
    </section>
</body>
</html>

