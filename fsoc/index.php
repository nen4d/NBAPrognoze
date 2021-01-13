<?php

  session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">
      <div class="login">
        <form method="POST" action="">
          <h1>Login</h1>
          <input name="password" class="form-control" type="password">
          <button type="submit" name="prijava" class="btn btn-info1">Dark</button>
        </form>
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

      include('../includes/db.php');

			if (isset($_POST['prijava'])) {

        $id = 1;
        $lozinka = htmlspecialchars($_POST['password']);
        $query = $connection->prepare("SELECT * FROM admin WHERE id=1");
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);


	            if (password_verify($lozinka, $result['password'])) {
	                $_SESSION['user_id'] = $result['id'];
									header('Location: acp/index.php');
                  exit;

	            } else {
	                echo '<script>swal("Pogresni podaci za prijavu.", {dangerMode: true} );</script>';
	            }
	        }


?>
