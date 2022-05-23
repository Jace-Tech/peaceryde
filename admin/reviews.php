<?php require_once("./addons/session.php"); ?>
<?php require_once('../db/config.php'); ?>
<?php require_once('../models/Review.php'); ?>
<?php require_once('../models/User.php'); ?>
<?php require_once('../utils/country_fee.php'); ?>
<?php require_once('../functions/index.php'); ?>


<?php 
    $active = $title = "Review";
    $reviews = new Review($connect);
    $users = new User($connect);
?>

<!doctype html>
<html lang="en">
    <?php include('./components/main_header.php'); ?>
        <?php include('./components/alert.php'); ?>
            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                    <div class="sm:flex sm:justify-between sm:items-center mb-8">
                        <div class="mb-4 sm:mb-0">
                            <h1 class="text-2xl md:text-3xl text-gray-800 font-bold">Manage Reviews</h1>
                        </div>
                        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                            <form class="relative">
                                <label for="action-search" class="sr-only">Search</label> 
                                <input
                                    id="action-search" class="form-input pl-9 focus:border-gray-300" type="search"
                                    placeholder="Search…" /> 
                                <button class="absolute inset-0 right-auto group"
                                    type="submit" aria-label="Search">
                                    <svg
                                        class="w-4 h-4 shrink-0 fill-current text-gray-400 group-hover:text-gray-500 ml-3 mr-2"
                                        viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                                        <path
                                            d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                                        </svg>
                                    </button>
                                </form>
                        </div>
                    </div>
                    <?php if(!isset($_GET['q'])): ?>
                        <div class="grid grid-cols-12 gap-6">
                            <?php if(count($reviews->getAllReviews())): ?>
                                <?php foreach($reviews->getAllReviews() as $review): ?>
                                    <div
                                        class="col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-gray-200">
                                        <div class="flex flex-col h-full">
                                            <div class="grow p-5">
                                                <div class="flex justify-between items-start">
                                                    <header>
                                                        <div class="flex mb-2">
                                                            <a class="relative inline-flex items-start mr-5"
                                                                href="#0">
                                                                <?php if($review['is_featured']): ?>
                                                                    <div class="absolute top-0 right-0 -mr-2 bg-yellow-500 rounded-full shadow" aria-hidden="true">
                                                                        <svg class="w-8 h-8 fill-current text-white" viewBox="0 0 32 32">
                                                                            <path d="M21 14.077a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 010 1.5 1.5 1.5 0 00-1.5 1.5.75.75 0 01-.75.75zM14 24.077a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"></path>
                                                                        </svg>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="flex items-center justify-center bg-gray-200 rounded-full w-16 h-16 text-lg font-semibold uppercase text-gray-500">
                                                                    <?= getSubName($users->get_user($review['user_id'])['firstname'] . " " . $users->get_user($review['user_id'])['lastname']) ?>
                                                                </div>
                                                            </a>
                                                            <div class="mt-1 pr-1"><a
                                                                    class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
                                                                    <h2 class="text-xl leading-snug justify-center font-semibold">
                                                                        <?= $users->get_user($review['user_id'])['firstname']; ?> &nbsp;
                                                                        <?= $users->get_user($review['user_id'])['lastname']; ?>
                                                                    </h2>
                                                                </a>
                                                                <div class="flex mt-3 items-center space-x-1">
                                                                    <!-- <span class="text-gray-500 text-sm">Rating: </span> -->
                                                                    <?php for($i = 0; $i < intval($review['rating']); $i++): ?>
                                                                        <button><span class="sr-only">1 star</span> <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 16 16"><path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z"></path></svg></button>
                                                                    <?php endfor; ?>

                                                                    <div class="inline-flex items-center text-sm font-medium text-yellow-600">
                                                                        <?= $review['rating']; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </header>
                                                    <div class="relative inline-flex shrink-0" x-data="{ open: false }"><button
                                                            class="text-white hover:text-white rounded-full"
                                                            :class="{ 'bg-gray-100 text-gray-500': open }" aria-haspopup="true"
                                                            @click.prevent="open = !open" :aria-expanded="open"><span
                                                                class="sr-only">Menu</span> <svg class="w-8 h-8 fill-current"
                                                                viewBox="0 0 32 32">
                                                                <circle cx="16" cy="16" r="2" />
                                                                <circle cx="10" cy="16" r="2" />
                                                                <circle cx="22" cy="16" r="2" /></svg></button>
                                                        <div class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                                            @click.outside="open = false" @keydown.escape.window="open = false"
                                                            x-show="open"
                                                            x-transition:enter="transition ease-out duration-200 transform"
                                                            x-transition:enter-start="opacity-0 -translate-y-2"
                                                            x-transition:enter-end="opacity-100 translate-y-0"
                                                            x-transition:leave="transition ease-out duration-200"
                                                            x-transition:leave-start="opacity-100"
                                                            x-transition:leave-end="opacity-0" x-cloak>
                                                            <ul>
                                                                <li><a class="font-medium text-sm text-red-500 hover:text-red-600 flex py-1 px-3"
                                                                        href="#0" @click="open = false" @focus="open = true"
                                                                        @focusout="open = false">Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="text-sm">
                                                        <?= $review['review']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-t border-gray-200">
                                                <div class="flex divide-x divide-gray-200r">
                                                    <a
                                                        class="block flex-1 text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4"
                                                        href="message.php?msg=<?= $review['user_id']; ?>">
                                                        <div class="flex items-center justify-center">
                                                            <svg class="w-4 h-4 fill-current shrink-0 mr-2" viewBox="0 0 16 16">
                                                                <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                                            </svg> 
                                                            <span>Message</span>
                                                        </div>
                                                    </a>
                                                    <?php if($review['is_featured']): ?>
                                                        <form method="post" action="./handler/review_handler.php" class="block flex-1 text-center text-sm text-red-600 hover:text-red-800 font-medium px-3 py-4 group">
                                                            <button name="unfeature" value="<?= $review['review_id']; ?>" class="flex items-center justify-center">
                                                            <svg class="w-4 mr-2 h-4 fill-current text-red-500 shrink-0" viewBox="0 0 16 16"><path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z"></path></svg>
                                                                <span>Unfeature</span>
                                                            </button>
                                                        </form>
                                                    <?php else: ?>
                                                        <form method="post" action="./handler/review_handler.php" class="block flex-1 text-center text-sm text-gray-600 hover:text-gray-800 font-medium px-3 py-4 group">
                                                            <button name="feature" value="<?= $review['review_id']; ?>" class="flex items-center text-yellow-600 justify-center">
                                                            <svg class="w-4 mr-2 h-4 fill-current text-yellow-500 shrink-0" viewBox="0 0 16 16"><path d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"></path></svg>
                                                                <span>Feature</span>
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            <?php else: ?>
                                <div class="h-56 flex items-center col-span-full justify-center">
                                    <h4 class="text-gray-500">No reviews found!</h4>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="grid grid-cols-12 gap-6">
                            <?php if(count($reviews->getAllReviews())): ?>
                                <?php foreach($reviews->getAllReviews() as $review): ?>
                                    <div
                                        class="col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-gray-200">
                                        <div class="flex flex-col h-full">
                                            <div class="grow p-5">
                                                <div class="flex justify-between items-start">
                                                    <header>
                                                        <div class="flex mb-2"><a class="relative inline-flex items-start mr-5"
                                                                href="#0">
                                                                <div class="absolute top-0 right-0 -mr-2 bg-white rounded-full shadow"
                                                                    aria-hidden="true"><svg
                                                                        class="w-8 h-8 fill-current text-yellow-500"
                                                                        viewBox="0 0 32 32">
                                                                        <path
                                                                            d="M21 14.077a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 010 1.5 1.5 1.5 0 00-1.5 1.5.75.75 0 01-.75.75zM14 24.077a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z" />
                                                                        </svg></div><img class="rounded-full"
                                                                    src="images/user-64-01.jpg" width="64" height="64"
                                                                    alt="User 01" />
                                                            </a>
                                                            <div class="mt-1 pr-1"><a
                                                                    class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
                                                                    <h2 class="text-xl leading-snug justify-center font-semibold">
                                                                        Dominik McNeail</h2>
                                                                </a>
                                                                <div class="flex items-center"><span
                                                                        class="text-sm font-medium text-gray-400 -mt-0.5 mr-1">-&gt;</span>
                                                                    <span>🇮🇹</span></div>
                                                            </div>
                                                        </div>
                                                    </header>
                                                    <div class="relative inline-flex shrink-0" x-data="{ open: false }"><button
                                                            class="text-gray-400 hover:text-gray-500 rounded-full"
                                                            :class="{ 'bg-gray-100 text-gray-500': open }" aria-haspopup="true"
                                                            @click.prevent="open = !open" :aria-expanded="open"><span
                                                                class="sr-only">Menu</span> <svg class="w-8 h-8 fill-current"
                                                                viewBox="0 0 32 32">
                                                                <circle cx="16" cy="16" r="2" />
                                                                <circle cx="10" cy="16" r="2" />
                                                                <circle cx="22" cy="16" r="2" /></svg></button>
                                                        <div class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                                            @click.outside="open = false" @keydown.escape.window="open = false"
                                                            x-show="open"
                                                            x-transition:enter="transition ease-out duration-200 transform"
                                                            x-transition:enter-start="opacity-0 -translate-y-2"
                                                            x-transition:enter-end="opacity-100 translate-y-0"
                                                            x-transition:leave="transition ease-out duration-200"
                                                            x-transition:leave-start="opacity-100"
                                                            x-transition:leave-end="opacity-0" x-cloak>
                                                            <ul>
                                                                <li><a class="font-medium text-sm text-gray-600 hover:text-gray-800 flex py-1 px-3"
                                                                        href="#0" @click="open = false" @focus="open = true"
                                                                        @focusout="open = false">Option 1</a></li>
                                                                <li><a class="font-medium text-sm text-gray-600 hover:text-gray-800 flex py-1 px-3"
                                                                        href="#0" @click="open = false" @focus="open = true"
                                                                        @focusout="open = false">Option 2</a></li>
                                                                <li><a class="font-medium text-sm text-red-500 hover:text-red-600 flex py-1 px-3"
                                                                        href="#0" @click="open = false" @focus="open = true"
                                                                        @focusout="open = false">Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="text-sm">Fitness Fanatic, Design Enthusiast, Mentor, Meetup
                                                        Organizer & PHP Lover.</div>
                                                </div>
                                            </div>
                                            <div class="border-t border-gray-200">
                                                <div class="flex divide-x divide-gray-200r"><a
                                                        class="block flex-1 text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4"
                                                        href="messages.php">
                                                        <div class="flex items-center justify-center"><svg
                                                                class="w-4 h-4 fill-current shrink-0 mr-2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                                                </svg> <span>Send Email</span></div>
                                                    </a><a
                                                        class="block flex-1 text-center text-sm text-gray-600 hover:text-gray-800 font-medium px-3 py-4 group"
                                                        href="settings.php">
                                                        <div class="flex items-center justify-center"><svg
                                                                class="w-4 h-4 fill-current text-gray-400 group-hover:text-gray-500 shrink-0 mr-2"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                                                </svg> <span>Edit Profile</span></div>
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <div class="mt-8">
                                    <div class="flex justify-center">
                                        <nav class="flex" role="navigation" aria-label="Navigation">
                                            <div class="mr-2">
                                                <span class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white border border-gray-200 text-gray-300">
                                                    <span class="sr-only">Previous</span><wbr/> 
                                                    <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                                                        <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <ul class="inline-flex text-sm font-medium -space-x-px shadow-sm">
                                                <li><span
                                                        class="inline-flex items-center justify-center rounded-l leading-5 px-3.5 py-2 bg-white border border-gray-200 text-indigo-500">1</span>
                                                </li>
                                                <li><a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white"
                                                        href="#0">2</a></li>
                                                <li><a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white"
                                                        href="#0">3</a></li>
                                                <li><span
                                                        class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white border border-gray-200 text-gray-400">…</span>
                                                </li>
                                                <li><a class="inline-flex items-center justify-center rounded-r leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white"
                                                        href="#0">9</a></li>
                                            </ul>
                                            <div class="ml-2">
                                                <a href="#0"
                                                    class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white shadow-sm"><span
                                                        class="sr-only">Next</span><wbr/> 
                                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                                                            <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="h-56 flex items-center col-span-full justify-center">
                                    <h4 class="text-gray-500">No reviews found!</h4>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if(count([])): ?>
                    <div class="mt-8">
                        <div class="flex justify-center">
                            <nav class="flex" role="navigation" aria-label="Navigation">
                                <div class="mr-2">
                                    <span class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white border border-gray-200 text-gray-300">
                                        <span class="sr-only">Previous</span><wbr/> 
                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                                            <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z" />
                                        </svg>
                                    </span>
                                </div>
                                <ul class="inline-flex text-sm font-medium -space-x-px shadow-sm">
                                    <li><span
                                            class="inline-flex items-center justify-center rounded-l leading-5 px-3.5 py-2 bg-white border border-gray-200 text-indigo-500">1</span>
                                    </li>
                                    <li><a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white"
                                            href="#0">2</a></li>
                                    <li><a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white"
                                            href="#0">3</a></li>
                                    <li><span
                                            class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white border border-gray-200 text-gray-400">…</span>
                                    </li>
                                    <li><a class="inline-flex items-center justify-center rounded-r leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white"
                                            href="#0">9</a></li>
                                </ul>
                                <div class="ml-2">
                                    <a href="#0"
                                        class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white hover:bg-indigo-500 border border-gray-200 text-gray-600 hover:text-white shadow-sm"><span
                                            class="sr-only">Next</span><wbr/> 
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