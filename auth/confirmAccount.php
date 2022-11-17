<?php include '../controler/MethodsControler.php' ?>
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
            <h3 class="mb-4">CONFIRMATION ACCOUNT</h3>
            <div class="form-outline mb-4">
                <label class="form-label" for="nis">NIS</label>
                <input type="number" id="nis" class="form-control" name="nis" placeholder="Enter your NIS" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="key">Nama Ibu Kandung</label>
                <input type="password" id="key" class="form-control" name="biological_mothers_name" placeholder="masukkan Nama Ibu Kandung" />
            </div>
            <div class="form-outline mb-4 row">
                <button class="btn btn-primary" name="confirm_account">Submit</button>
            </div>
        </form>
    </section>
</body>
</html>
<?php 

if (isset($_POST['confirm_account'])) {
    $methodsControler->confirmAccount($_POST);

}



?>