<?php include '../controler/MethodsControler.php' ?>
<?php 

$isSessionStatus = isset($_SESSION['status']);
$isSessionNis = isset($_SESSION['nis']);
    if ($isSessionStatus && $isSessionNis) {
        header("location:/peminjaman-barang/view/");
    }else{
        "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <section class="row d-flex justify-content-center align-items-center border bg-white" id="body" style="height:800px;">
        <div class="col-4 me-4" style="background:url('/peminjaman-barang/src/img/smartphone-login.jpg'); background-position: center; height:85%; background-repeat: no-repeat;"></div>
        <form class="col-3 rounded px-4 pb-4 pt-4 bg-white border" action="" method="POST">
          <h2 class="text-center" style="font-family: Danger Night ;">Login</h2>
          <?php 
$isClickButtonLogin = isset($_POST['btn-login']);
if ($isClickButtonLogin) {
    $login = $methodsControler->login($_POST);
    $error = isset($login['errorMassage']);
    if ($error) {
        echo '<i class="text-danger">'.$login['errorMassage'].'</i>';
    }
}
?>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">NIS</label>
            <input type="number" id="form2Example1" class="form-control" name="nis" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" id="form2Example2" class="form-control" name="password" />
          </div>

          <div class="form-outline mb-4 row">
            <button type="submit" class="btn btn-primary mb-4" name="btn-login">Login</button>
          </div>
          <!-- Submit button -->

          <!-- 2 column grid layout for inline styling -->
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">              
              <a href="confirmAccount.php">Forgot password?</a>
            </div>
          </div>

        </form>
    </section>
</body>
</html>