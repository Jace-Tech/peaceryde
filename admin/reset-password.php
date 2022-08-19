<?php  session_start(); ?>
<?php  if(isset($_COOKIE['RESET'])) header("location: ./verify.php");  ?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>PeaceRyde Africa LLC - Reset Password</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="style.311cc0a03ae53c54945b.css" rel="stylesheet">
	</head>

	<body class="font-inter antialiased bg-gray-100 text-gray-600">
		<?php include("./components/alert.php"); ?>
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
						<div class="flex-1">
							<div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
								<a class="block" href="./"><svg width="32" height="32" viewBox="0 0 32 32">
										<defs>
											<linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
												<stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
												<stop stop-color="#A5B4FC" offset="100%" />
											</linearGradient>
											<linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
												<stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
												<stop stop-color="#38BDF8" offset="100%" />
											</linearGradient>
										</defs>
										<rect fill="#6366F1" width="32" height="32" rx="16" />
										<path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5" />
										<path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)" />
										<path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)" />
									</svg>
								</a>
							</div>
						</div>
						<div class="max-w-sm mx-auto px-4 py-8">
							<h1 class="text-3xl text-gray-800 font-bold mb-6">Reset your Password ✨</h1>
							<form action="./handler/reset_handler.php" method="post">
								<div class="space-y-4">
									<div>
										<label class="block text-sm font-medium mb-1" for="email">Email Address <span class="text-red-500">*</span></label> 
										<input id="email" class="form-input w-full" name="email" type="email" />
									</div>
								</div>
								<div class="flex justify-end mt-6">
									<button name="reset" type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Send Email</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true"><img class="object-cover object-center w-full h-full" src="images/auth-image.jpg" width="760" height="1024" alt="Authentication image" /> <img class="absolute top-1/4 left-0 transform -translate-x-1/2 ml-8 hidden lg:block" src="images/auth-decoration.png" width="218" height="224" alt="Authentication decoration" /></div>
			</div>
		</main>
		<script src="main.75545896273710c7378c.js"></script>
	</body>

</html>