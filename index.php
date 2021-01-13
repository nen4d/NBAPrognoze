<?php

		session_start();
    include('includes/db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NBAPrognoze</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="" >
					<span class="login100-form-title p-b-51">
						PRIJAVA
						<div class="insta"><p>Vise informacija i kako da se uclanite<br>instagram: <a href="https://www.instagram.com/nbaprognoze">NBAPrognoze</a></p></div>
					</span>


					<div class="wrap-input100 validate-input m-b-16" data-validate = "Upisite korisniko ime">
						<input class="input100" type="text" name="ime" placeholder="Korisnicko ime">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate = "Upisite lozinku">
						<input class="input100" type="password" name="lozinka" placeholder="Lozinka">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit"
                     name="prijava" value="Sign In">
							Prijavi se
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php

		$status = 1;

			if (isset($_POST['prijava'])) {
	        $ime = htmlspecialchars($_POST['ime']);
	        $lozinka = htmlspecialchars($_POST['lozinka']);
	        $query = $connection->prepare("SELECT * FROM korisnici  WHERE ime=:ime");
	        $query->bindParam("ime", $ime, PDO::PARAM_STR);
	        $query->execute();
	        $result = $query->fetch(PDO::FETCH_ASSOC);
	        if (!$result) {
	            echo '<script>swal("Pogresni podaci za prijavu.", {dangerMode: true} );</script>';
	        } else {

		            if (password_verify($lozinka, $result['lozinka'])) {

									if($status != $result['status']) {
										echo '<script>swal("Vasa clanarina je istekla.", {dangerMode: true} );</script>';
									} else {

		                $_SESSION['user'] = $result['ime'];
										echo("<script>location.href = 'prognoze/index.php';</script>");

									}

		            } else {
		                echo '<script>swal("Pogresni podaci za prijavu.", {dangerMode: true} );</script>';
		            }

							}
	        }

?>
