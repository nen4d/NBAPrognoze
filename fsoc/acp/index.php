<?php

    include('../../includes/db.php');

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
              <label for="exampleFormControlInput1">Tip</label>
              <input name="tip" type="text" class="form-control" id="exampleFormControlInput1" placeholder="L. James" required="required">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Granica</label>
              <input name="granicabroj" type="text" class="form-control" id="exampleFormControlInput1" placeholder="25.5" required="required">
            </div>
            <div class="form-group">
              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Granica</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="granica" id="gridRadios1" value="1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        PLUS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="granica" id="gridRadios2" value="0">
                      <label class="form-check-label" for="gridRadios2">
                        MINUS
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Single broj</label>
              <select name="broj" class="form-control" id="exampleFormControlSelect1">
                <?php

                  $kolid = "SELECT * FROM prognoze ORDER BY id";

                  foreach ($connection->query($kolid) as $kolidrow) {

                ?>
                <option><?php echo $kolidrow['id']; } ?></option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Analiza</label>
              <textarea name="analiza" class="form-control" id="exampleFormControlTextarea1" rows="8" required="required"></textarea>
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
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="tipstatus" id="gridRadios2" value="0">
                      <label class="form-check-label" for="gridRadios2">
                        Deaktiviran
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <br>
              <button name="izmeni" type="submit" class="btn btn-success">Izmeni</button>
          </form>
        </div>
      </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../js/sweetalert.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php

    if(isset($_POST['izmeni'])) {

      $tip = htmlspecialchars($_POST['tip']);
      $grbroj = $_POST['granicabroj'];
      $granica = $_POST['granica'];
      $id = $_POST['broj'];
      $opis = htmlspecialchars($_POST['analiza']);
      $datum = date("Y-m-d");
      $tipstatus = $_POST['tipstatus'];

      if($tipstatus == '1') {
        $tipstatus = '1';
      } else {
        $tipstatus = '0';
      }

      if($granica == '1') {
        $granica = 'ZmFyIGZhLXBsdXMtc3F1YXJl';
      } else {
        $granica = 'ZmFyIGZhLW1pbnVzLXNxdWFyZQ==';
      }

      $data = [
          'tip' => $tip,
          'granicabroj' => $grbroj,
          'granica' => $granica,
          'opis' => $opis,
          'datum' => $datum,
          'id' => $id,
          'status' => $tipstatus
      ];
      $sql = "UPDATE prognoze SET tip=:tip, granicabroj=:granicabroj, granica=:granica, opis=:opis, datum=:datum, status=:status WHERE id=:id";
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
