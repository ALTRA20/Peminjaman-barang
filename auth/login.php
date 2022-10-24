<?php include '../controler/MethodsControler.php' ?>
<?php 
session_start();
    if (isset($_SESSION['status']) && isset($_SESSION['nis'])) {
        header("location:/peminjaman-barang/view/");
    }else{
        "";
    }
?>
<?php 
if (isset($_POST['btn-login'])) {
    $login = $methodsControler->login($_POST);
    echo $login['message'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <section class="row d-flex justify-content-center align-items-center border bg-primary" id="body" style="height:800px;">
        <form class="col-3 rounded px-4 pb-4 pt-4 bg-white" action="" method="POST">
          <h2 class="text-center">Login</h2>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">NIS</label>
            <input type="number" id="form2Example1" class="form-control" name="nis" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="text" id="form2Example2" class="form-control" name="password" />
          </div>

          <!-- 2 column grid layout for inline styling -->
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                <label class="form-check-label" for="form2Example31"> Remember me </label>
              </div>
            </div>

            <div class="col">
              <!-- Simple link -->
              <a href="#!">Forgot password?</a>
            </div>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" name="btn-login">Login</button>

          <!-- Register buttons -->
          <div class="text-center">
            <p id="coba">Not a member? <a href="#!">Register</a></p>
            <p>or sign up with:</p>
          </div>
        </form>
    </section>
</body>
</html>