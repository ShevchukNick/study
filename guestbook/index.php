<?php
require_once __DIR__ . '/db.php';
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
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3>registration</h3>
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
                <button type="submit" class="btn btn-primary">reg</button>
            </div>

        </form>
    </div>


    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <h3>login</h3>
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
    </div>

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
