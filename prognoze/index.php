<?php

		session_start();
    if(!isset($_SESSION['user'])){
        header('Location: ../index.php');
        exit;
    } else {

			include('../includes/db.php');

			$ime = $_SESSION['user'];

			$sql = "SELECT * FROM korisnici WHERE ime = '$ime'";

				foreach ($connection->query($sql) as $row) {
			$datum = "$row[clanarina]";
			$accstatus = "$row[status]";

			if($accstatus != '1') {

				echo "<script>window.location.href='../index.php'</script>";

			}

			else {

			}

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
	<link rel="stylesheet" type="text/css" href="css/fa/all.css">
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<div class="nbaprognoze">
					<h1>NBA Prognoze</h1>
				</div>

				<div class="tipovi">


					<p>
					<br>
					Prijavljeni ste kao: <b><?php echo $ime; ?></b><br>
					Vasa clanarina traje do: <b><?php echo DateTime::CreateFromFormat('Y-m-d', $datum)->format('d/M/Y'); ?></b><br>
					Datum analize:
					<b>
						<?php

							$sth = $connection->prepare("SELECT datum FROM prognoze WHERE id='1'");
							$sth->execute();

							$datumrez = $sth->fetch(PDO::FETCH_ASSOC);

							$datumupdate = $datumrez['datum'];

							echo DateTime::CreateFromFormat('Y-m-d', $datumupdate)->format('d/M/Y');

						;?>
					</b>
					</p><hr>

					<div class="tip">

						<?php

							$sql1 = "SELECT * FROM prognoze WHERE status='1' ORDER BY id";

								foreach ($connection->query($sql1) as $row1) {

						?>

						<h2><?php echo "$row1[single]"; ?> - <b><?php echo "$row1[tip]" . "\n"; echo "$row1[granicabroj]" ?> <i class="fas fa-arrow-right"></i> <i class="<?php echo $granica = base64_decode($row1['granica']); ?>"></i><hr class="tipline"><?php } ?></b></h2>

						<hr>

					</div>
					<div class="analiza">

						<?php

							$sql2 = "SELECT * FROM prognoze WHERE status='1' ORDER BY id";

								foreach ($connection->query($sql2) as $row2) {

						?>

							<br>
							<h2><b><?php echo "$row2[single]" . "\n - \n"; echo "$row2[tip]" ?></b></h2>
							<p><?php echo "$row2[opis]"; ?></p><br>

							<?php }; ?>


					</div>
				</div>
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

		}

	};

?>
