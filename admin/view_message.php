<?php $title = "dashboard"; ?>

<?php if(!isset($_GET['msg'])) header("location: ./message.php"); ?>

<?php require_once("./addons/session.php"); ?>
<?php require_once('../db/config.php'); ?>
<?php require_once('../functions/index.php'); ?>
<?php require_once('../models/User.php'); ?>

<?php
    $user = new User($connect);
    $active = $title = "Message";
?>


<!doctype html>
<html lang="en">
	<?php include('./components/main_header.php'); ?>
        <script>
            window.addEventListener("load", () => {
                console.clear()
                if(location.search.includes("?msg")){
                    setTimeout(500, () => {
                        document.body.setAttribute('x-data', "{ page: 'messages', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true', msgSidebarOpen: false }")
                    })
                }
                else {
                    setTimeout(500, () => {
                        document.body.setAttribute('x-data', "{ page: 'messages', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true', msgSidebarOpen: true }")
                    })
                }
            })
        </script>
			<main>
                <div class="relative flex">
                    <div id="messages-sidebar" class="absolute z-20 top-0 bottom-0 w-full md:w-auto md:static md:top-auto md:bottom-auto -mr-px md:translate-x-0 transform transition-transform duration-200 ease-in-out" :class="msgSidebarOpen ? 'translate-x-0' : '-translate-x-full'">
                        <div class="sticky top-16 bg-white overflow-x-hidden overflow-y-auto no-scrollbar shrink-0 border-r border-gray-200 md:w-72 xl:w-80 h-[calc(100vh-64px)]">
                            <!-- #Marketing group -->
                            <div>
                                <div class="sticky top-0 z-10">
                                    <div class="flex items-center bg-white border-b border-gray-200 px-5 h-16">
                                        <div class="w-full flex items-center justify-between">
                                            <div class="relative" x-data="{ open: false }">
                                                <button class="grow flex items-center truncate" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                                    <img class="w-8 h-8 rounded-full mr-2" src="images/user-avatar-32.png" width="32" height="32" alt="Group 01" />
                                                    <div class="truncate">
                                                        <span class="font-semibold text-gray-800">Messages</span>
                                                    </div>
                                                </button>
                                            </div>

                                            <div x-data="{ modalOpen: false }">
                                                <button class="p-1.5 shrink-0 rounded border border-gray-200 hover:border-gray-300 shadow-sm ml-2" @click.prevent="modalOpen = true" aria-controls="feedback-modal">
                                                    <svg class="w-4 h-4 fill-current text-gray-500" viewBox="0 0 16 16">
                                                        <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                                    </svg>
                                                </button>
												<div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity" x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
												<form method="post" action="./handler/message_handler.php" id="feedback-modal" class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center transform px-4 sm:px-6" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="transition ease-in-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4" style="display: none;">
													<div class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
														<div class="px-5 py-3 border-b border-gray-200">
															<div class="flex justify-between items-center">
																<div class="font-semibold text-gray-800">Broadcast Message</div>
                                                                <button class="text-gray-400 hover:text-gray-500" type="button" @click="modalOpen = false">
																	<div class="sr-only">Close</div><svg class="w-4 h-4 fill-current">
																		<path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path></svg>
																</button>
															</div>
														</div>
														<div class="px-5 py-4">
															<div class="space-y-3">
																<div><label class="block text-sm font-medium mb-1" for="feedback">Message <span class="text-red-500">*</span></label> 
                                                                <input type="hidden" value="<?= $LOGGED_USER['admin_id']; ?>" name="sender">
                                                                <textarea id="feedback" name="message" class="form-textarea w-full px-2 py-1" rows="4" required=""></textarea></div>
															</div>
														</div>
														<div class="px-5 py-4 border-t border-gray-200">
															<div class="flex flex-wrap justify-end space-x-2">
                                                                <button type="button" class="btn-sm border-gray-200 hover:border-gray-300 text-gray-600" @click="modalOpen = false">Cancel</button> 
                                                                <button type="submit" name="broadcast" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Send</button>
                                                            </div>
														</div>
													</div>
												</form>
											</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-4">
                                    <form class="relative">
                                        <label for="msg-search" class="sr-only">Search</label> 
                                        <input id="msg-search" class="form-input w-full pl-9 focus:border-gray-300" type="search" placeholder="Search…" /> 
                                        <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                                            <svg class="w-4 h-4 shrink-0 fill-current text-gray-400 group-hover:text-gray-500 ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                                                <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                                            </svg>
                                        </button>
                                    </form>
                                    <div class="mt-4">
                                        <div class="text-xs font-semibold text-gray-400 uppercase mb-3">Direct messages</div>
                                        <ul class="mb-6">
                                            <?php if(count($user->get_all_users())): ?>
                                                <?php foreach($user->get_all_users() as $_user): extract($_user); ?>
                                                    <li class="-mx-2">
                                                        <a href="?msg=<?= $user_id; ?>" class="flex items-center justify-between w-full p-2 rounded <?= $active = $user_id == $_GET['msg'] ? "bg-indigo-100" : "bg-gray-100"; ?>"  @click="msgSidebarOpen = false; $refs.contentarea.scrollTop = 99999999;">
                                                            <div class="flex items-center truncate">
                                                                <div class="flex shadow-sm mr-2 items-center justify-center <?= $active = $user_id == $_GET['msg'] ? "bg-gray-100" : "bg-gray-200"; ?> rounded-full w-8 h-8 text-xs font-semibold uppercase text-gray-500">
                                                                    <?= getSubName("$firstname $lastname") ?>
                                                                </div>
                                                                <div class="truncate">
                                                                    <span class="text-sm font-medium text-gray-800 ">
                                                                        <?= "$firstname $lastname" ?>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="flex items-center ml-2">
                                                                <?php if(count($messages->get_unread_messages($user_id, $LOGGED_USER['admin_id']))): ?>
                                                                    <div class="text-xs inline-flex font-medium bg-indigo-400 text-white rounded-full text-center leading-5 px-2">
                                                                        <?= count($messages->get_unread_messages($user_id, $LOGGED_USER['admin_id'])) ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else:  ?>
                                                <p class="text-gray-500 text-sm text-center py-8">No User Found</p>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grow flex flex-col md:translate-x-0 transform transition-transform duration-300 ease-in-out" :class="msgSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'">
                        <?php if(isset($_GET['msg'])): ?>
                            <div class="sticky top-16">
                                <div class="flex items-center justify-between bg-white border-b border-gray-200 px-4 sm:px-6 md:px-5 h-16">
                                    <div class="flex items-center">
                                        <button class="md:hidden text-gray-400 hover:text-gray-500 mr-4" @click.stop="msgSidebarOpen = !msgSidebarOpen" aria-controls="messages-sidebar" :aria-expanded="msgSidebarOpen">
                                            <span class="sr-only">Close sidebar</span> 
                                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                                            </svg>
                                        </button>
                                        <div class="flex -space-x-3 -ml-px">
                                            <a class="btn btn-sm border-indigo-200 text-indigo-600" href="./message.php">&lt;- </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grow px-4 sm:px-6 md:px-5 py-6">
                                <?php $conversation = $messages->get_conversation($LOGGED_USER['admin_id'], $user_id); ?>
                                <?php foreach ($conversation as $message): extract($message); ?>
                                    <?php $messages->mark_read($message_id); ?>
                                    <div class="flex items-start mb-4 last:mb-0" style="flex-direction: <?= $style = $sender_id === $LOGGED_USER['admin_id'] ? "row-reverse" : "row"; ?>">
                                        <div class="flex shadow-sm <?= $margin = $sender_id === $LOGGED_USER['admin_id'] ? "ml-2" : "mr-2" ?> items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                                            <?= $name = $sender_id === $LOGGED_USER['admin_id'] ? getSubName($LOGGED_USER['name']) : getSubName($user->get_user($_GET['msg'])['firstname'] . " " . $user->get_user($_GET['msg'])['lastname']); ?>
                                        </div>
                                        <div>
                                            <div class="text-sm <?= $theme =  $sender_id === $LOGGED_USER['admin_id'] ? "bg-indigo-500 text-white" : "bg-white text-gray-800" ?> p-3 rounded-lg border border-transparent shadow-md mb-1" style="border-top-right-radius: 0;">
                                                <?= $message ?>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="text-xs text-gray-500 font-medium" title="<?= date("l j, M Y H:i A", strtotime($date)) ?>">
                                                    <?= date("D, H:i A", strtotime($date)); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="sticky bottom-0">
                                <div class="flex items-center justify-between bg-white border-t border-gray-200 px-4 sm:px-6 md:px-5 h-16">
                                    <form class="grow flex" method="post" action="./handler/message_handler.php">
                                        <div class="grow mr-3">
                                            <label for="message-input" class="sr-only">Type a message</label> 
                                            <input type="hidden" name="reciever" value="<?= $_GET['msg']; ?>">
                                            <input type="hidden" name="sender" value="<?= $LOGGED_USER['admin_id']; ?>">
                                            <input id="message-input" name="message" class="form-input w-full bg-gray-100 border-transparent focus:bg-white focus:border-gray-300" placeholder="Aa" />
                                        </div>
                                        <button type="submit" name="send" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Send -&gt;</button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
		</div>
	</div>

	<script src="main.75545896273710c7378c.js"></script>
</body>

</html>