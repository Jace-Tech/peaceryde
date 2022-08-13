<style>
    .logo {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        object-fit: contain;
    }
</style>

<?php  
    if($LOGGED_ADMIN['type'] != "HIGH") {
        $admin = getSubAdminService($connect, $LOGGED_ADMIN['admin_id']);
    }
?>

<?php if (isset($active)) : ?>
    <div id="sidebar" class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 transform h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-gray-800 p-4 transition-all duration-200 ease-in-out" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false" @keydown.escape.window="sidebarOpen = false" x-cloak="lg" style="overflow-x: hidden;">
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <button class="lg:hidden text-gray-500 hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen"><span class="sr-only">Close sidebar</span> <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg></button>
            <a class="block" href="">
                <img src="../assets/peace.jpeg" class="logo" alt="logo">
            </a>
        </div>
        <div class="space-y-8">
            <div>
                <h3 class="text-xs uppercase text-white font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3>
                <ul class="mt-3">
                    <!-- DASHBOARD -->
                    <?php if (strtolower($active) === 'dashboard') : ?>
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-900">
                            <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="dashboard.php">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-gray-400 text-indigo-500" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                        <path class="fill-current text-gray-600 text-indigo-600" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                        <path class="fill-current text-gray-400 text-indigo-200" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                </div>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                            <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="dashboard.php">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-gray-400" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                                        <path class="fill-current text-gray-600" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                                        <path class="fill-current text-gray-400" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path>
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- MANAGE SUBADMINS -->
                    <?php if ($LOGGED_ADMIN['type'] == "HIGH") : ?>
                        <?php if (strtolower($active) === "manage") : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-900">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="subadmins.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600 text-indigo-500" d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"></path>
                                            <path class="fill-current text-gray-400 text-indigo-300" d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"></path>
                                            <path class="fill-current text-gray-600 text-indigo-500" d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"></path>
                                            <path class="fill-current text-gray-400 text-indigo-300" d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Manage Admins</span>
                                    </div>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="subadmins.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600" d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"></path>
                                            <path class="fill-current text-gray-400" d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"></path>
                                            <path class="fill-current text-gray-600" d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"></path>
                                            <path class="fill-current text-gray-400" d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Manage Admins</span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?> 
                    <?php endif; ?>

                    <!-- SERVICES -->
                    <?php if ($LOGGED_ADMIN['type'] == "HIGH") : ?>
                        <?php if (strtolower($active) === "service") : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-900">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="service.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <circle class="fill-current text-gray-400 text-indigo-300" cx="18.5" cy="5.5" r="4.5"></circle>
                                            <circle class="fill-current text-gray-600 text-indigo-500" cx="5.5" cy="5.5" r="4.5"></circle>
                                            <circle class="fill-current text-gray-600 text-indigo-500" cx="18.5" cy="18.5" r="4.5"></circle>
                                            <circle class="fill-current text-gray-400 text-indigo-300" cx="5.5" cy="18.5" r="4.5"></circle>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Manage Services</span>
                                    </div>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="service.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <circle class="fill-current text-gray-400" cx="18.5" cy="5.5" r="4.5"></circle>
                                            <circle class="fill-current text-gray-600" cx="5.5" cy="5.5" r="4.5"></circle>
                                            <circle class="fill-current text-gray-600" cx="18.5" cy="18.5" r="4.5"></circle>
                                            <circle class="fill-current text-gray-400" cx="5.5" cy="18.5" r="4.5"></circle>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Manage Services</span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <!-- MANAGE USERS -->
                    <?php if (strtolower($active) === "users") : ?>
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-900">
                            <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="users.php">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-gray-600 text-indigo-500" d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z"></path>
                                        <path class="fill-current text-gray-400 text-indigo-300" d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"></path>
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Manage Users</span>
                                </div>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                            <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="users.php">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-gray-600" :class="page.startsWith('team-') && 'text-indigo-500'" d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z" />
                                        <path class="fill-current text-gray-400" :class="page.startsWith('team-') && 'text-indigo-300'" d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Manage Users</span>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- MESSAGE -->
                    <?php if ($LOGGED_ADMIN['type'] == "HIGH") : ?>
                        <?php if (strtolower($active) === "message") : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-900">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="view_message.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600 text-indigo-500" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"></path>
                                            <path class="fill-current text-gray-400 text-indigo-300" :class="page === 'inbox' &amp;&amp; 'text-indigo-300'" d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Messages</span>
                                        <?php if (count($messages->get_unread_messages($user_id, $LOGGED_ADMIN['admin_id']))) : ?>
                                            <div class="text-xs inline-flex font-medium bg-indigo-400 text-white rounded-full text-center leading-5 ml-2 px-2">
                                                <?= count($messages->get_unread_messages($user_id, $LOGGED_ADMIN['admin_id'])) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </li>

                        <?php else : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="view_message.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"></path>
                                            <path class="fill-current text-gray-400" :class="page === 'inbox' &amp;&amp; 'text-indigo-300'" d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Messages</span>
                                        <?php if (count($messages->get_unread_messages($user_id, $LOGGED_ADMIN['admin_id']))) : ?>
                                            <div class="text-xs inline-flex font-medium bg-indigo-400 text-white rounded-full text-center leading-5 ml-2 px-2">
                                                <?= count($messages->get_unread_messages($user_id, $LOGGED_ADMIN['admin_id'])) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if (strtolower($active) === "message") : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-900">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="view_message.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600 text-indigo-500" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"></path>
                                            <path class="fill-current text-gray-400 text-indigo-300" :class="page === 'inbox' &amp;&amp; 'text-indigo-300'" d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Messages</span>
                                    </div>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="view_message.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"></path>
                                            <path class="fill-current text-gray-400" :class="page === 'inbox' &amp;&amp; 'text-indigo-300'" d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Messages</span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>

            <?php if ($LOGGED_ADMIN['type'] === "HIGH") : ?>
                <div>
                    <h3 class="text-xs uppercase text-white font-semibold pl-3">
                        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span> <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">More</span>
                    </h3>
                    <ul class="mt-3">
                        <?php if (strtolower($active) === "faq") : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-900">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="faqs.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600 text-indigo-500" d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z"></path>
                                            <path class="fill-current text-gray-400 text-indigo-300" d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">FAQs</span>
                                    </div>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="faqs.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600" d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z"></path>
                                            <path class="fill-current text-gray-400" d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">FAQs</span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>


                        <?php if (strtolower($active) === "review") : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-900">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="reviews.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600 text-indigo-500" d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z"></path>
                                            <path class="fill-current text-gray-600 text-indigo-500" d="M1 1h22v23H1z"></path>
                                            <path class="fill-current text-gray-400 text-indigo-300" :class="page === 'tasks' &amp;&amp; 'text-indigo-300'" d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reviews</span>
                                    </div>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                                <a class="block text-gray-50 hover:text-white truncate transition duration-150" href="reviews.php">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-gray-600" d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z"></path>
                                            <path class="fill-current text-gray-600" d="M1 1h22v23H1z"></path>
                                            <path class="fill-current text-gray-400" :class="page === 'tasks' &amp;&amp; 'text-indigo-300'" d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z"></path>
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reviews</span>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-gray-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-gray-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>