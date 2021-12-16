<!DOCTYPE html>
<html lang="en">
<head>
	<title>Barb'Era</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/login/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="<?php echo base_url() ?>/Gamer/mdpRecup2">
					<span class="login100-form-title">
						Récupérez votre mot de passe
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your email address">
						<input class="input100" type="text" name="mail" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Recevoir le mot de passe
						</button>
					</div>

					<div class="flex-col-c p-t-40 p-b-40">
						<span class="txt1 p-b-9">
							<a class="txt3" href="<?php echo base_url() ?>">Retourner sur le site</a>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>