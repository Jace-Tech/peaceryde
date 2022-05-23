<?php $active = $title = "Dashboard"; ?>

<?php require_once('../db/config.php'); ?>
<?php require_once('../models/User.php'); ?>
<?php require_once('../models/Admin.php'); ?>
<?php require_once('../models/Review.php'); ?>
<?php require_once('../functions/index.php'); ?>

<?php 

	$users = new User($connect);
	$subadmins = new Admin($connect);
	$reviews = new Review($connect);

?>


<!doctype html>
<html lang="en">
	<?php include('./components/main_header.php'); ?>
    <script> localStorage.setItem('sidebar-expanded', 'true') </script>
			<main>
				<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
					<div class="relative bg-indigo-200 p-4 sm:p-6 rounded-sm overflow-hidden mb-8">
						<div class="absolute right-0 top-0 -mt-4 mr-16 pointer-events-none hidden xl:block" aria-hidden="true"><svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
								<defs>
									<path id="welcome-a" d="M64 0l64 128-64-20-64 20z" />
									<path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z" />
									<path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z" />
									<linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
										<stop stop-color="#A5B4FC" offset="0%" />
										<stop stop-color="#818CF8" offset="100%" />
									</linearGradient>
									<linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
										<stop stop-color="#4338CA" offset="0%" />
										<stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
									</linearGradient>
								</defs>
								<g fill="none" fill-rule="evenodd">
									<g transform="rotate(64 36.592 105.604)">
										<mask id="welcome-d" fill="#fff">
											<use xlink:href="#welcome-a" />
										</mask>
										<use fill="url(#welcome-b)" xlink:href="#welcome-a" />
										<path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z" />
									</g>
									<g transform="rotate(-51 91.324 -105.372)">
										<mask id="welcome-f" fill="#fff">
											<use xlink:href="#welcome-e" />
										</mask>
										<use fill="url(#welcome-b)" xlink:href="#welcome-e" />
										<path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z" />
									</g>
									<g transform="rotate(44 61.546 392.623)">
										<mask id="welcome-h" fill="#fff">
											<use xlink:href="#welcome-g" />
										</mask>
										<use fill="url(#welcome-b)" xlink:href="#welcome-g" />
										<path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z" />
									</g>
								</g>
							</svg></div>
						<div class="relative">
							<h1 class="text-2xl md:text-3xl text-gray-800 font-bold mb-1">Good <?= getGreeting() ?>, <?= $LOGGED_USER['name'] ?> 👋</h1>
							<!-- <p>Here is what’s happening with your projects today:</p> -->
						</div>
					</div>
					<div class="grid grid-cols-12 gap-6">
						<!-- All Users -->
						<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-gray-200">
							<a href="./users.php" class="px-5 pt-5 block">
								<header class="flex justify-between items-start mb-2">
									<img src="images/icon-01.svg" width="32" height="32" alt="Icon 01" />
									<h2 class="text-lg font-semibold text-gray-800 mb-2">No of users</h2>
								</header>
								<div class="flex items-start my-8">
									<div class="text-3xl font-bold text-gray-800 mr-2">
										<?= count($users->get_all_users()); ?>
									</div>
								</div>
							</a>
						</div>

						<!-- All SubAdmins -->
						<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-gray-200">
							<a href="./subadmins.php" class="px-5 pt-5 block">
								<header class="flex justify-between items-start mb-2">
									<img src="images/icon-02.svg" width="32" height="32" alt="Icon 02" />
									<h2 class="text-lg font-semibold text-gray-800 mb-2">No of sub-admins</h2>
								</header>
								<div class="flex items-start my-8">
									<div class="text-3xl font-bold text-gray-800 mr-2">
										<?= count($subadmins->getAllSubAdmins()) ?>
									</div>
								</div>
							</a>
						</div>

						<!-- All  -->
						<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-gray-200">
							<a href="./reviews.php" class="px-5 pt-5 block">
								<header class="flex justify-between items-start mb-2">
									<img src="images/icon-03.svg" width="32" height="32" alt="Icon 03" />
									<h2 class="text-lg font-semibold text-gray-800 mb-2">No of reviews</h2>
								</header>
								<div class="flex items-start my-8">
									<div class="text-3xl font-bold text-gray-800 mr-2">
										<?= count($reviews->getAllReviews()); ?>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<script src="main.75545896273710c7378c.js"></script>
</body>

</html>