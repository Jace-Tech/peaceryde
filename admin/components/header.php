<?php
require_once("../models/Message.php");
require_once("../models/User.php");

$messages = new Message($connect);
$users = new User($connect);

$ADMIN_UNREAD_MESSAGE = $messages->get_user_unread_messages($LOGGED_USER['admin_id']);



?>
<header class="sticky top-0 bg-white border-b border-gray-200 z-30">
	<div class="px-4 sm:px-6 lg:px-8">
		<div class="flex items-center justify-between h-16 -mb-px">
			<div class="flex"><button class="text-gray-500 hover:text-gray-600 lg:hidden" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen"><span class="sr-only">Open sidebar</span> <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<rect x="4" y="5" width="16" height="2" />
						<rect x="4" y="11" width="16" height="2" />
						<rect x="4" y="17" width="16" height="2" />
					</svg></button></div>
			<div class="flex items-center space-x-3">

				<div class="relative inline-flex" x-data="{ open: false }">
					<button class="w-8 h-8 flex items-center justify-center bg-gray-100 hover:bg-gray-200 transition duration-150 rounded-full" :class="{ 'bg-gray-200': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
						<span class="sr-only">Notifications</span>
						<svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
							<path class="fill-current text-gray-500" d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z" />
							<path class="fill-current text-gray-400" d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z" />
						</svg>
						<?php if (count($messages->get_user_unread_messages($LOGGED_USER['admin_id']))) : ?>
							<div class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></div>
						<?php endif; ?>
					</button>
					<div class="origin-top-right z-10 absolute top-full right-0 -mr-48 sm:mr-0 min-w-80 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
						<div class="text-xs font-semibold text-gray-400 uppercase pt-1.5 pb-2 px-4">Notifications</div>
						<ul>
                            <?php if(count($ADMIN_UNREAD_MESSAGE)): ?>
                                <?php foreach($ADMIN_UNREAD_MESSAGE as $msg): ?>
                                    <li class="border-b border-gray-200 last:border-0">
                                        <a class="block py-2 px-4 hover:bg-gray-50" href="./view_message.php?msg=<?= $msg['message_id']; ?>" @click="open = false" @focus="open = true" @focusout="open = false">
                                            <span class="block text-sm mb-2">📣 
                                                <span class="font-medium text-gray-800">New message from  <span class="text-indigo-500"> <?= $users->get_user($msg['sender_id'])['firstname'] . " " . $users->get_user($msg['sender_id'])['lastname']; ?></span> <br></span> 
                                                <?= $text = (strlen($msg['message']) <= 30) ? $msg['message'] : substr($msg['message'], 0, 30) . "...";  ?>
                                            </span> 
                                            <span class="block text-xs font-medium text-gray-400">
                                                <?= date("M d, Y", strtotime($msg['date'])); ?>
                                            </span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="px-3 py-2 text-center text-gray-400">
                                    <?= "No notification available" ?>
                                </li>
                            <?php endif; ?>
						</ul>
					</div>
				</div>
				<hr class="w-px h-6 bg-gray-200" />
				<div class="relative inline-flex" x-data="{ open: false }"><button class="inline-flex justify-center items-center group" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open"><img class="w-8 h-8 rounded-full" src="images/user-avatar-32.png" width="32" height="32" alt="User" />
						<div class="flex items-center truncate">
							<span class="truncate ml-2 text-sm font-medium group-hover:text-gray-800">
								<?= $LOGGED_USER['name'] ?>
							</span>
							<svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400" viewBox="0 0 12 12">
								<path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
							</svg>
						</div>
					</button>
					<div class="origin-top-right z-10 absolute top-full right-0 min-w-44 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
						<div class="pt-0.5 pb-2 px-3 mb-1 border-b border-gray-200">
							<div class="font-medium text-gray-800">
								<?= $LOGGED_USER['name'] ?>
							</div>
							<div class="text-xs text-gray-500 italic">Administrator</div>
						</div>
						<ul>
							<li>
								<form method="post" action="./handler/logout.php">
									<button class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" name="logout">Sign Out</button>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>