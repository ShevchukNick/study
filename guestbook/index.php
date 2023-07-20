<?php
session_start();

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

if (isset($_POST['reg'])) {
    registration();
    header("Location: index.php");
    die;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>guestbook</title>
</head>
<body>

<div class="container">

        <div class="row my-3">
            <div class="col">
                <?php if (!empty($_SESSION['errors'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['errors'];
                    unset($_SESSION['errors'])?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['success'];
                    unset($_SESSION['success'])?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"aria-label="Close"></button>
                </div>
                <?php endif; ?>
            </div>
        </div>


    <?php if (empty($_SESSION['user']['name'])): ?>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3>registration</h3>
            </div>
        </div>
        <form action="" method="post" class="row g-3">

            <div class="col-md-6 offset-md-3">
                <div class="form-floating mb-3">
                    <input name="name" type="text" id="floatinput" class="form-control">
                    <label for="floatinput">name</label>
                </div>
            </div>

            <div class="col-md-6 offset-md-3">
                <div class="form-floating mb-3">
                    <input name="pass" type="password" id="floatinputpass" class="form-control">
                    <label for="floatinputpass">pass</label>
                </div>

            </div>
            <div class="col-md-6 offset-md-3">
                <button name="reg" type="submit" class="btn btn-primary">reg</button>
            </div>

        </form>


        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <h3>login</h3>
            </div>
        </div>
        <form action="" method="post" class="row g-3">

            <div class="col-md-6 offset-md-3">
                <div class="form-floating mb-3">
                    <input name="name" type="text" id="floatinput" class="form-control">
                    <label for="floatinput">name</label>
                </div>

            </div>
            <div class="col-md-6 offset-md-3">
                <div class="form-floating mb-3">
                    <input name="pass" type="password" id="floatinputpass" class="form-control">
                    <label for="floatinputpass">pass</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3">
                <button name="auth" type="submit" class="btn btn-primary">login</button>
            </div>
        </form>


    <?php else: ?>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p>Welcome USER!  <a href="?do=exit">log out</a></p>
            </div>
        </div>
        <form action="" method="post" class="row g-3 mb-5">
            <div class="col-md-6 offset-md-3">
                <div class="form-floating">
                    <textarea class="form-control" name="message" id="floattextarea" cols="30" rows="10"></textarea>
                    <label for="floattextarea">message</label>
                </div>
            </div>

            <div class="col-md-6 offset-md-3">
                <button name="add" type="submit" class="btn btn-primary">send</button>
            </div>
        </form>
    <?php endif; ?>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <hr>
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">author</h5>
                        <p class="card-text">text</p>
                        <p>date</p>
                    </div>
                </div>
            </div>
        </div>




</div>

</body>
</html>
