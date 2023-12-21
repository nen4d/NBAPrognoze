<?php

    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ../index.php');
        exit;
    } else {

      include('../../includes/db.php');

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
        <div class="tipovi">
            <table class="table table-responsive table-striped table-hover table-users">
              <div class="table">
                <thead>
                <th><a href="dodaj.php"><button class="btn btn-success">DODAJ</button></a></th>
                <tr>

                <th class="hidden-phone">Korisnicko ime</th>
                <th>Clanarina</th>
                <th class="hidden-phone">Status</th>

                </tr>
                </thead>

                <tbody>

                <?php

                $sql = "SELECT * FROM korisnici ORDER BY clanarina DESC";

                  foreach ($connection->query($sql) as $row) {

                    $id = $row['id'];

                 ?>

                <tr>



                <td class="hidden-phone"><?php echo $row['ime']; ?></td>
                <td><?php echo DateTime::CreateFromFormat('Y-m-d', $row['clanarina'])->format('d-m-Y'); ?></td>

                <?php if($row['status'] != 1) {
                  $status = "NEAKTIVAN";
                } else {
                  $status = "AKTIVAN";
                }
                ?>

                <td class="<?php echo $status; ?>">

                  <?php echo $status;  ?>

                </td>


                     <td><a href="izmeni.php?id=<?php echo $id; ?>"><button class="btn btn-warning">Izmeni</button></a></td>
                     <td><a href="clanovi.php?aktiviraj_id=<?php echo $id; ?>"<button class="btn btn-success">Aktiviraj</button></a></td>
                     <td><a href="clanovi.php?suspend_id=<?php echo $id; ?>"<button class="btn btn-danger">Suspenduj</button></a></td>
                 </tr>

                 <?php } ?>
               </div>
              </tbody>

            </table>
        </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    if(isset($_GET['suspend_id'])) {

      $id = $_GET['suspend_id'];
      $status = 0;

            $data = [
                'status' => $status,
            ];
            $sqlsus = "UPDATE korisnici SET status=$status WHERE id=$id";
            $stmt= $connection->prepare($sqlsus);
            $stmt->execute($data);

            if(!$stmt) {

                echo "<script>window.location.href='clanovi.php'</script>";

            }

            else {

                echo "<script>window.location.href='clanovi.php'</script>";

            }

    }

    if(isset($_GET['aktiviraj_id'])) {

      $id = $_GET['aktiviraj_id'];
      $status = 1;

            $data = [
                'status' => $status,
            ];
            $sqlsus = "UPDATE korisnici SET status=$status WHERE id=$id";
            $stmt= $connection->prepare($sqlsus);
            $stmt->execute($data);

            if(!$stmt) {

              echo "<script>window.location.href='clanovi.php'</script>";

            }

            else {

              echo "<script>window.location.href='clanovi.php'</script>";

            }

    }

  }

?>
