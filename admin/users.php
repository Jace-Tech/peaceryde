<?php require_once("./addons/session.php"); ?>
<?php require_once('../db/config.php'); ?>
<?php require_once('../models/Review.php'); ?>
<?php require_once('../models/UserService.php'); ?>
<?php require_once('../models/Service.php'); ?>
<?php require_once('../models/Tracking.php'); ?>
<?php require_once('../models/User.php'); ?>
<?php require_once('../utils/country_fee.php'); ?>
<?php require_once('../functions/index.php'); ?>


<?php
$active = $title = "users";
$users = new User($connect);
$userServices = new UserService($connect);
$services = new Service($connect);
$trackings = new Tracking($connect);

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $searchResult = $users->searchUser($query);
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
					<h1 class="text-2xl md:text-3xl text-gray-800 font-bold">Manage Users</h1>
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
			<?php if (!isset($_GET['q'])) : ?>
				<div class="grid grid-cols-12 gap-6">
					<?php if (count($users->get_all_users())) : ?>
						<?php foreach ($users->get_all_users() as $user) :  ?>
							<div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200">
								<div class="flex flex-col h-full">
									<div class="grow p-5">
										<div class="relative">
											<div class="absolute top-0 right-0 inline-flex" x-data="{ open: false }">
												<button class="text-gray-400 hover:text-gray-500 rounded-full" :class="{ 'bg-gray-100 text-gray-500': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open" aria-expanded="false">
													<span class="sr-only">Menu</span>
													<svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
														<circle cx="16" cy="16" r="2"></circle>
														<circle cx="10" cy="16" r="2"></circle>
														<circle cx="22" cy="16" r="2"></circle>
													</svg>
												</button>
												<div class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
													<ul>
                                                        <li>
															<div x-data="{ modalOpen: false }">
                                                                <button @click.prevent="modalOpen = true" aria-controls="feedback-modal-<?= $user['user_id'] ?>" class="block px-2 text-gray-600 text-sm border-0 bg-white">Update Track</button>
                                                                <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity" x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true"></div>
                                                                <div id="feedback-modal" class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center transform px-4 sm:px-6" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="transition ease-in-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">
                                                                    <div class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                                                        <div class="px-5 py-3 border-b border-gray-200">
                                                                            <div class="flex justify-between items-center">
                                                                                <div class="font-semibold text-gray-800">Update Tracking</div><button class="text-gray-400 hover:text-gray-500" @click="modalOpen = false">
                                                                                    <div class="sr-only">Close</div><svg class="w-4 h-4 fill-current">
                                                                                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <form action="./handler/track_handler.php" method="POST" id="track-form-alt" class="px-5 py-4">
                                                                            <div class="text-sm">
																				<?php if(count($trackings->getUserTracking($user['user_id']))): ?>
																					<div class="font-medium text-gray-800 mb-3">Previous Track: <?= $trackings->getUserTracking($user['user_id'])[0]['tracking']; ?></div>
																				<?php else: ?>
																					<div class="font-medium text-gray-800 mb-3">Previous Track: <span class="text-gray-500"><?= "No track found" ?></span></div>
																				<?php endif; ?>
                                                                            </div>
                                                                            <div class="space-y-3">
                                                                                <div>
                                                                                    <label class="block text-sm font-medium mb-1" for="name">Tracking <span class="text-red-500">*</span></label> 
                                                                                    <input id="name" name="track" class="form-input w-full px-2 py-1" required="">
                                                                                    <input type="hidden" value="<?= $user['user_id']; ?>" name="id">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <div class="px-5 py-4 border-t border-gray-200">
                                                                            <div class="flex flex-wrap justify-end space-x-2">
                                                                                <button type="button" class="btn-sm border-gray-200 hover:border-gray-300 text-gray-600" @click="modalOpen = false">Cancel</button> 
                                                                                <button form="track-form-alt" type="submit" name="tracking" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Update Track</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>	
														</li>
													</ul>
												</div>
											</div>
										</div>
										<header>
											<div class="flex justify-center mb-2">
												<a class="relative inline-flex items-start" href="#0">
													<div class="flex shadow-sm mr-2 items-center bg-gray-200 justify-center rounded-full w-12 h-12 text-md font-semibold uppercase text-gray-500">
														<?= getSubName($user['firstname'] . " " .  $user['lastname']) ?>
													</div>
												</a>
											</div>

											<div class="text-center">
												<a class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
													<h2 class="text-xl leading-snug justify-center font-semibold">
														<?= "{$user['firstname']} {$user['lastname']}" ?>
													</h2>
												</a>
											</div>
										</header>
										<div class="text-center mt-2">
											<div class="text-sm">
												<?= $services->getUserService($userServices->getService($user["user_id"])['service_id'])['service']; ?>
											</div>
										</div>
									</div>
									<div class="border-t border-gray-200">
										<a class="block text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4" href="message.php">
											<div class="flex items-center justify-center">
												<svg class="w-4 h-4 fill-current shrink-0 mr-2" viewBox="0 0 16 16">
													<path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
												</svg>
												<span>Send Message</span>
											</div>
										</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					<?php else : ?>
						<div class="h-56 flex items-center col-span-full justify-center">
							<h4 class="text-gray-500">No user found!</h4>
						</div>
					<?php endif; ?>
				</div>
			<?php else : ?>
				<div class="grid grid-cols-12 gap-6">
					<?php if (count($searchResult)) : ?>
						<?php foreach ($searchResult as $user) : ?>
							<div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200">
								<div class="flex flex-col h-full">
									<div class="grow p-5">
										<div class="relative">
											<div class="absolute top-0 right-0 inline-flex" x-data="{ open: false }">
												<button class="text-gray-400 hover:text-gray-500 rounded-full" :class="{ 'bg-gray-100 text-gray-500': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open" aria-expanded="false">
													<span class="sr-only">Menu</span>
													<svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
														<circle cx="16" cy="16" r="2"></circle>
														<circle cx="10" cy="16" r="2"></circle>
														<circle cx="22" cy="16" r="2"></circle>
													</svg>
												</button>
												<div class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
													<ul>
														<li>
                                                            <div x-data="{ modalOpen: false }">
                                                                <button @click.prevent="modalOpen = true" aria-controls="feedback-modal-<?= $user['user_id'] ?>" class="block px-2 text-gray-600 text-sm border-0 bg-white">Update Track</button>
                                                                <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity" x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true"></div>
                                                                <div id="feedback-modal" class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center transform px-4 sm:px-6" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="transition ease-in-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">
                                                                    <div class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                                                        <div class="px-5 py-3 border-b border-gray-200">
                                                                            <div class="flex justify-between items-center">
                                                                                <div class="font-semibold text-gray-800">Update Tracking</div><button class="text-gray-400 hover:text-gray-500" @click="modalOpen = false">
                                                                                    <div class="sr-only">Close</div><svg class="w-4 h-4 fill-current">
                                                                                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <form action="./handler/track_handler.php" method="POST" id="track-form-alt" class="px-5 py-4">
                                                                            <div class="text-sm">
																				<?php if(count($trackings->getUserTracking($user['user_id']))): ?>
																					<div class="font-medium text-gray-800 mb-3">Previous Track: <?= $trackings->getUserTracking($user['user_id'])[0]['tracking']; ?></div>
																				<?php else: ?>
																					<div class="font-medium text-gray-800 mb-3">Previous Track: <span class="text-gray-500"><?= "No track found" ?></span></div>
																				<?php endif; ?>
                                                                            </div>
                                                                            <div class="space-y-3">
                                                                                <div>
                                                                                    <label class="block text-sm font-medium mb-1" for="name">Tracking <span class="text-red-500">*</span></label> 
                                                                                    <input id="name" name="track" class="form-input w-full px-2 py-1" required="">
                                                                                    <input type="hidden" value="<?= $user['user_id']; ?>" name="id">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <div class="px-5 py-4 border-t border-gray-200">
                                                                            <div class="flex flex-wrap justify-end space-x-2">
                                                                                <button type="button" class="btn-sm border-gray-200 hover:border-gray-300 text-gray-600" @click="modalOpen = false">Cancel</button> 
                                                                                <button form="track-form-alt" type="submit" name="tracking" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Update Track</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<header>
											<div class="flex justify-center mb-2">
												<a class="relative inline-flex items-start" href="#0">
													<div class="flex shadow-sm mr-2 items-center bg-gray-200 justify-center rounded-full w-12 h-12 text-md font-semibold uppercase text-gray-500">
														<?= getSubName($user['firstname'] . " " .  $user['lastname']) ?>
													</div>
												</a>
											</div>

											<div class="text-center">
												<a class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
													<h2 class="text-xl leading-snug justify-center font-semibold">
														<?= "{$user['firstname']} {$user['lastname']}" ?>
													</h2>
												</a>
											</div>
										</header>
										<div class="text-center mt-2">
											<div class="text-sm">
												<?= $services->getUserService($userServices->getService($user["user_id"])['service_id'])['service']; ?>
											</div>
										</div>
									</div>
									<div class="border-t border-gray-200">
										<a class="block text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4" href="messages.php">
											<div class="flex items-center justify-center">
												<svg class="w-4 h-4 fill-current shrink-0 mr-2" viewBox="0 0 16 16">
													<path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
												</svg>
												<span>Send Message</span>
											</div>
										</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else : ?>
						<div class="h-56 flex items-center col-span-full justify-center">
							<h4 class="text-gray-500">No User found!</h4>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if (count([])) : ?>
			<div class="mt-8">
				<div class="flex justify-center">
					<nav class="flex" role="navigation" aria-label="Navigation">
						<div class="mr-2">
							<span class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white border border-gray-200 text-gray-300">
								<span class="sr-only">Previous</span><wbr />
								<svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
									<path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z" />
								</svg>
							</span>
						</div>
						<ul class="inline-flex text-sm font-medium -space-x-px shadow-sm">
							<li><span class="inline-flex items-center justify-center rounded-l leading-5 px-3.5 py-2 bg-white border border-gray-200 text-indigo-500">1</span>
							</li>
							<li><a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white" href="#0">2</a></li>
							<li><a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white" href="#0">3</a></li>
							<li><span class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white border border-gray-200 text-gray-400">…</span>
							</li>
							<li><a class="inline-flex items-center justify-center rounded-r leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white" href="#0">9</a></li>
						</ul>
						<div class="ml-2">
							<a href="#0" class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white shadow-sm"><span class="sr-only">Next</span><wbr />
								<svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
									<path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
								</svg>
							</a>
						</div>
					</nav>
				</div>
			</div>
		<?php endif; ?>
	</main>
	</div>
	</div>
	<script src="main.75545896273710c7378c.js"></script>
	</body>

</html>
