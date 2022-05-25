<?php require_once("./addons/session.php"); ?>
<?php require_once('../db/config.php'); ?>
<?php require_once('../models/Review.php'); ?>
<?php require_once('../models/UserService.php'); ?>
<?php require_once('../models/Service.php'); ?>
<?php require_once('../models/Tracking.php'); ?>
<?php require_once('../models/Upload.php'); ?>
<?php require_once('../models/User.php'); ?>
<?php require_once('../utils/country_fee.php'); ?>
<?php require_once('../functions/index.php'); ?>


<?php
	$active = $title = "users";
	$users = new User($connect);
    $files = new Upload($connect);


	if (isset($_GET['id'])) {
		$user_id = $_GET['id'];
		$USER = $users->get_user($user_id);
        $FILES = $files->getUserUploads($user_id);

        print_r($FILES);
	}
    else {
        header("Location: ../users.php");
    }
?>

<!doctype html>
<html lang="en">
	<?php include('./components/main_header.php'); ?>
	<?php include('./components/alert.php'); ?>
	<main>
		<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
			<div class="sm:flex sm:justify-between sm:items-center mb-8">
				<div class="mb-4 sm:mb-0">
					<h1 class="text-2xl md:text-3xl text-gray-800 font-bold">
                        <?= $USER["firstname"] . " " . $USER["lastname"] . " Documents"; ?>
                    </h1>
				</div>
				<div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
					<form class="relative" action="" method="get">
						<label for="action-search" class="sr-only">Search</label>
						<input id="action-search" name="q" class="form-input pl-9 focus:border-gray-300" type="search" placeholder="Search…" />
						<button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
							<svg class="w-4 h-4 shrink-0 fill-current text-gray-400 group-hover:text-gray-500 ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
								<path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
								<path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
							</svg>
						</button>
					</form>
				</div>
			</div>
			
		</div>
	</main>
	</div>
	</div>
	<script src="main.75545896273710c7378c.js"></script>
	</body>

</html>
