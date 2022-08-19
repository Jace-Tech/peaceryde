<?php session_start(); ?>

<?php //require_once('../db/conf.php'); ?>
<?php require_once('../db/config.php'); ?>
<?php require_once('../models/Admin.php'); ?>

<?php 
	$admin = new Admin($connect);
	if(!count($admin->getAllAdmins())) header('Location: ./signup.php');

	if(isset($_COOKIE['LOGGED_ADMIN'])) header('Location: ./dashboard.php');
?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>PeaceRyde</title>
		<link rel="shortcut icon" href="../assets/icon.png" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="style.311cc0a03ae53c54945b.css" rel="stylesheet">

		<style>
			.logo {
				width: 90px;
				height: 90px;
				border-radius: 50%;
				object-fit: contain;
			}
		</style>
	</head>

	<body class="font-inter antialiased bg-gray-100 text-gray-600">
		<script>
			if (localStorage.getItem('sidebar-expanded') == 'true') {
				document.querySelector('body').classList.add('sidebar-expanded');
			} else {
				document.querySelector('body').classList.remove('sidebar-expanded');
			}
		</script>

		<main class="bg-white">
			<?php include("./components/alert.php"); ?>
			<div class="relative flex">
				<div class="w-full md:w-1/2">
					<div class="min-h-screen h-full flex flex-col after:flex-1">
						<div class="flex-1 mt-2">
							<div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
								<a class="block" href="./">
									<img src="../assets/peace.jpeg" class="logo" alt="logo">
								</a>
							</div>
						</div>
						<div class="max-w-sm mx-auto px-4 py-8">
							<h1 class="text-3xl text-gray-800 font-bold mb-6">Admin ✨</h1>
							<form action="./handler/auth_handler.php" method="post">
								<div class="space-y-4">
									<div>
										<label class="block text-sm font-medium mb-1" for="email">Email Address</label> 
										<input name="email" class="form-input w-full" required type="email" />
									</div>
									<div>
										<label class="block text-sm font-medium mb-1" for="password">Password</label> 
										<input name="password" class="form-input w-full" required type="password" />
									</div>
								</div>
								<div class="flex items-center justify-between mt-6">
									<div class="mr-1">
										<a class="text-sm underline hover:no-underline" href="./reset-password">Forgot Password?</a>
									</div>
									<button type="submit" name="login" class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3">Sign In</button>
								</div>
							</form>
							<div class="pt-5 mt-6">
								<div class="mt-5" style="width: 350px;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
					<img class="object-cover object-center w-full h-full" src="images/auth-image.jpg" width="760" height="1024" alt="Authentication image" /> 
					<img class="absolute top-1/4 left-0 transform -translate-x-1/2 ml-8 hidden lg:block" src="images/auth-decoration.png" width="218" height="224" alt="Authentication decoration" />
				</div>
			</div>
		</main>
		<script src="main.75545896273710c7378c.js"></script>
	</body>

</html>