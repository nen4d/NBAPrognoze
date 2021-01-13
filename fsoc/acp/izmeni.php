<?php

    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ../index.php');
        exit;
    } else {

      include('../../includes/db.php');

      if (!isset($_GET['id'])) {
          echo "<script>window.location.href='clanovi.php?greska'</script>";
      } else if (!ctype_digit($_GET['id'])) {
          echo "<script>window.location.href='clanovi.php?greska'</script>";
      } else {
          $id = (int)$_GET['id'];
      }


        if(isset($_GET['id'])) {

          $checkid = "SELECT COUNT(*) FROM korisnici WHERE id = $id";
          $res = $connection->query($checkid);
          $count = $res->fetchColumn();
          if(!$count) {
            echo "<script>window.location.href='clanovi.php?greska'</script>";
          } else {

          $sql = "SELECT * FROM korisnici WHERE id=$id";

            foreach ($connection->query($sql) as $row) {

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
            <li class="nav-item">
              <a class="nav-link" href="index.php"><i class="fa fa-file-text-o" aria-hidden="true" style="color:white"></i> Prognoze</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="clanovi.php"><i class="fa fa-users" aria-hidden="true" style="color:white"></i> Clanovi <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-line-chart" aria-hidden="true" style="color:white"></i> Posete</a>
            </li>
          </ul>
          <a href="odjava.php"><button class="btn btn-outline-odjava my-2 my-sm-0" type="submit">Odjava</button></a>
        </div>
      </nav>
      <div class="container">
        <div class="izmeni">
          <div class="col-sm-offset-4 col-sm-4">
            <form method="post" action="">
      				<div class="form-group">
              			<label for="validate-text">Korisnicko ime</label>
      					<div class="input-group">
      						<input type="text" name="ime" class="form-control" value="<?php echo $id = $row['ime']; ?>" id="validate-text" placeholder="Validate Text" required>
      						<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
      					</div>
                <br>
                			<label for="validate-text">Clanarina</label>
        					<div class="input-group">
        						<input type="date" name="clanarina" class="form-control" id="validate-text" value="<?php echo $id = $row['clanarina']; } } ?>" placeholder="Validate Text" required>
        						<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
        					</div>
                  <br>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="aktivan" id="exampleRadios1" value="option1" checked>
                      Aktivan
                    </label>
                  </div>
                  <br>
                  <button type="submit" name="sacuvaj" class="btn btn-success">Sacuvaj</button>
      				</div>
            </div>


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

    if(isset($_POST['sacuvaj'])) {

      $ime = htmlspecialchars($_POST['ime']);

      $id5 = $_GET['id'];

      $datum1 = $_POST['clanarina'];
      $datum2 = date("Y-m-d",strtotime($datum1));

      $status = 1;

      $data1 = [
        'ime' => $ime,
        'clanarina' => $datum2,
        'status' => $status,
        'id' => $id5
      ];

      $sql5 = "UPDATE korisnici SET ime=:ime, clanarina=:clanarina, status=:status WHERE id=:id";
      $stmt5 = $connection->prepare($sql5);
      $stmt5->execute($data1);

      if(!$stmt5) {

        echo "<script>alert('Uspesno ste izmenuli podatke')</script>";
        echo "<script>window.location.href='clanovi.php?uspesno'</script>";

      } else {

        echo "<script>window.location.href='clanovi.php?uspesno'</script>";

      }

      }

    }

  }

?>
