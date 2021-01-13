<?php

    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ../index.php');
        exit;
    } else {

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link href="css/style.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ACP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><i class="fa fa-file-text-o" aria-hidden="true" style="color:white"></i> Prognoze <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clanovi.php"><i class="fa fa-users" aria-hidden="true" style="color:white"></i> Clanovi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="posete.php"><i class="fa fa-line-chart" aria-hidden="true" style="color:white"></i> Posete</a>
            </li>
          </ul>
          <a href="odjava.php"><button class="btn btn-outline-odjava my-2 my-sm-0" type="submit">Odjava</button></a>
        </div>
      </nav>
      <div class="container">
        <div class="tipovi">
          <form class="tipovic" method="POST" action="">
            <div class="form-group">
              <label for="exampleFormControlInput1">Korisnicko ime</label>
              <input name="korime" type="text" class="form-control" id="exampleFormControlInput1" required="required">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Lozinka</label>
              <input name="lozinka" type="password" class="form-control" id="exampleFormControlInput1" required="required">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Clanarina</label>
              <input type="date" name="clanarina" class="form-control" id="validate-text" placeholder="Validate Text" required>
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
            <div class="form-group">
              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="tipstatus" id="gridRadios1" value="1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Aktivan
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <br>
              <button name="dodaj" type="submit" class="btn btn-success">Dodaj clana</button>
          </form>
        </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../js/sweetalert.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php

    include('../../includes/db.php');

    if(isset($_POST['dodaj'])) {

      $korime = htmlspecialchars($_POST['korime']);

      $loz = $_POST['lozinka'];
      $lozinka = password_hash($loz, PASSWORD_BCRYPT);

      $clanarina = $_POST['clanarina'];
      $cladatum = date("Y-m-d",strtotime($clanarina));
      $status = 1;

      $data = [
          'ime' => $korime,
          'lozinka' => $lozinka,
          'datum' => $cladatum,
          'status' => $status
      ];
      $sql = "INSERT INTO korisnici (ime, lozinka, clanarina, status) VALUES (:ime, :lozinka, :datum, :status)";
      $stmt= $connection->prepare($sql);
      $stmt->execute($data);

      if(!$stmt) {

        echo '<script>swal({
              icon: "error",
              });</script>';

      }

      else {

        echo '<script>swal({
              icon: "success",
              });</script>';

      }

    }

  }

?>
