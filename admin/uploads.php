<?php require_once("./addons/models.php"); ?>

<?php
$active = $title = "users";
$users = new User($connect);
$files = new Upload($connect);


if (isset($_GET['id'])) {
	$user_id = $_GET['id'];
	$USER = $users->get_user($user_id);
	$FILES = $files->getUserUploads($user_id);
} else {
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
				<h1 class="text-2xl md:text-3xl text-gray-700 font-bold">
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
		<div x-data="handleSelect">
			<div class="overflow-x-auto">
				<table class="table-auto w-full">
					<?php if (count($FILES)) : ?>
						<thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50 border-t border-b border-gray-200">
							<tr>
								<th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
									<div class="font-semibold text-left">Name</div>
								</th>

								<th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
									<div class="font-semibold text-left">Status</div>
								</th>

								<th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"><span class="sr-only">Menu</span></th>
							</tr>
						</thead>

						<tbody class="text-sm divide-y divide-gray-200">
							<?php foreach ($FILES as $file): ?>
								<tr>
									<td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
										<div class="flex items-center">
											<div class="font-medium text-gray-800"><?= $file['name']; ?></div>
										</div>
									</td>

									<td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
										<?php if ($file['status'] == "approved") : ?>
											<div class="inline-flex font-medium bg-green-100 text-green-600 rounded-full text-xs text-center px-2.5 py-0.5" style="text-transform: capitalize;">
												<?= $file['status']; ?>
											</div>
										<?php else : ?>
											<div class="inline-flex font-medium bg-gray-100 text-gray-600 rounded-full text-xs text-center px-2.5 py-0.5" style="text-transform: capitalize;">
												<?= $file['status']; ?>
											</div>
										<?php endif; ?>
									</td>

									<td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
										<div class="flex">
											<a download="<?= $file['name'] ?>" href="../Dashboard/upload/<?= json_decode($file['file'], true)[0]; ?>" class="btn btn-sm btn-primary mr-2">View</a>
											<?php if ($status == "approved") : ?>
												<form action="./handler/uploads_handler.php" method="post">
													<input type="hidden" name="user" value="<?= $user_id; ?>" />
													<input type="hidden" name="id" value="<?= $file['id']; ?>" />
													<button name="disapprove" class="btn text-red-600 text-xs bg-red-100 btn-sm">Disapprove</button>
												</form>
											<?php else : ?>
												<form action="./handler/uploads_handler.php" method="post">
													<input type="hidden" name="user" value="<?= $user_id; ?>" />
													<input type="hidden" name="id" value="<?= $file['id']; ?>" />
													<button name="approve" class="btn text-green-600 text-xs bg-green-100 btn-sm">Disapprove</button>
												</form>
											<?php endif; ?>

										</div>
									</td>
								</tr>
							<?php endforeach; ?>

						</tbody>

					<?php else : ?>
						<tr>
							<td class="h-56">
								<div class="p-2 flex justify-center align-center ">
									<h4 class="text-blue-500 text-sm">No upload found</h4>
								</div>
							</td>
						</tr>
					<?php endif; ?>
				</table>
			</div>
		</div>
	</div>
</main>
</div>
</div>
<script src="main.75545896273710c7378c.js"></script>
</body>

</html>