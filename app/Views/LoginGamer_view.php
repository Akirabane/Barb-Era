<!DOCTYPE html>
<html lang="en">
<head>
	<title>Barb'Era</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>/assets/logo.png"/>
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
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="<?php echo base_url() ?>/Gamer/Verification">
					<span class="login100-form-title">
						Connectez-vous
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<p>
							<span class="txt1 p-b-9">
								<a class="txt3" href="<?php echo base_url() ?>/Gamer/mdpRecup">Mot de passe oublié</a>
							</span>
						</p>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<p>
							<span class="txt1 p-b-9">
								<a class="txt3" href="<?php echo base_url() ?>/Gamer/NewGamer">Créer un compte</a>
							</span>
						</p>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Connexion
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