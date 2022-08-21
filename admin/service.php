<?php $active = $title = "service"; ?>
<?php require_once("./addons/models.php"); ?>

<?php
    if($LOGGED_ADMIN['type'] != "HIGH") header("Location: ./dashboard");
    $SERVICE = new Service($connect);
    $services = $SERVICE->getAllServices();
?>

<!doctype html>
<html lang="en">
<?php include('./components/main_header.php'); ?>
<main>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class=" m-auto">
            <div class="mb-5 flex justify-between">
                <h1 class="text-2xl md:text-3xl text-gray-700 font-bold">Manage Services</h1>

                <div x-data="{ modalOpen: false }">
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white" @click.prevent="modalOpen = true" aria-controls="feedback-modal">
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                            <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                        </svg>
                        <span class="hidden xs:block ml-2">Add Service</span>
                    </button>
                    <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity" x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak></div>
                    <div id="feedback-modal" class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center transform px-4 sm:px-6" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="transition ease-in-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4" x-cloak>
                        <form method="post" action="./handler/service_handler.php" class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                            <div class="px-5 py-3 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div class="font-semibold text-gray-800">Create a Service</div>
                                    <button class="text-gray-400 hover:text-gray-500" type="button" @click="modalOpen = false">
                                        <div class="sr-only">Close</div><svg class="w-4 h-4 fill-current">
                                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="px-5 py-4">
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="name">Service Name <span class="text-red-500">*</span></label>
                                        <input name="name" id="name" class="form-input w-full px-2 py-2" required />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="question">Price <span class="text-red-500">*</span></label>
                                        <input type="number" name="price" id="question" class="form-input w-full px-2 py-2" required />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium mb-1">Payment Addons </label>
                                        <div class="grid">
                                            <?php foreach (getAllPayAddons($connect) as $addon) : ?>
                                                <label class="flex gap-2 items-center">
                                                    <input type="checkbox" value="<?= $addon['id'] ?>" class="appearance-none default:ring-2 checked:blue-500 w-3 h-3" name="addons[]">
                                                    <span class="ml-1 text-sm text-gray-400 truncate"><?= $addon['name'] ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 py-4 border-t border-gray-200">
                                <div class="flex flex-wrap justify-end space-x-2">
                                    <button class="btn-sm border-gray-200 hover:border-gray-300 text-gray-600" type="button" @click="modalOpen = false">Cancel</button>
                                    <button type="submit" name="add" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mb-6 border-b border-gray-200"></div>
            <div>
                <h2 class="mb-5 text-md font-bold text gray-700 uppercase">Services</h2>
                <?php if (count($services)) : ?>
                    <?php foreach ($services as $service) : ?>
                        <div class="p-4 border-b flex">
                            <p class="text-gray-600 flex-1 text-sm">
                                <?= $service['service']; ?>
                            </p>

                            <div class="flex items-center gap-2">
                                <div x-data="{ modalOpen: false }" class="flex items-center justify-center ml-3">
                                    <a href="#" @click.prevent="modalOpen = true" aria-controls="feedback-modal-<?= slugify($service['service']); ?>" class="text-indigo-500 font-bold text-xs ">Edit</a>
                                    <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity" x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                                    <div id="feedback-modal-<?= slugify($service['service']); ?>" class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center transform px-4 sm:px-6" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="transition ease-in-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4" style="display: none;">
                                        <form method="post" action="./handler/service_handler.php" class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                            <div class="px-5 py-3 border-b border-gray-200">
                                                <div class="flex justify-between items-center">
                                                    <div class="font-semibold text-gray-800">Edit a Service</div>
                                                    <button class="text-gray-400 hover:text-gray-500" type="button" @click="modalOpen = false">
                                                        <div class="sr-only">Close</div><svg class="w-4 h-4 fill-current">
                                                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="px-5 py-4">
                                                <div class="space-y-3">
                                                    <div>
                                                        <label class="block text-sm font-medium mb-1" for="name">Service Name <span class="text-red-500">*</span></label>
                                                        <input name="name" id="name" value="<?= $service['service'] ?? ""; ?>" class="form-input w-full px-2 py-2" required />
                                                        <input type="hidden" name="id" value="<?= $service['id'] ?>">
                                                    </div>

                                                    <div>
                                                        <label class="block text-sm font-medium mb-1" for="question">Price <span class="text-red-500">*</span></label>
                                                        <input type="number" name="price" value="<?= $service['price'] ?? ""; ?>" id="question" class="form-input w-full px-2 py-2" required />
                                                    </div>

                                                    <div>
                                                        <label class="block text-sm font-medium mb-1">Payment Addons </label>
                                                        <div class="grid">
                                                            <?php foreach (getAllPayAddons($connect) as $addon) : ?>
                                                                <label class="flex gap-2 items-center">
                                                                    <input type="checkbox" value="<?= $addon['id'] ?>" <?= $service['addons'] !== "null" ? in_array($addon['id'], json_decode($service['addons']) ?? [] ) ? "checked" : "" : "" ?> class="appearance-none default:ring-2 checked:blue-500 w-3 h-3" name="addons[]">
                                                                    <span class="ml-1 text-sm text-gray-400 truncate"><?= $addon['name'] ?></span>
                                                                </label>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="px-5 py-4 border-t border-gray-200">
                                                <div class="flex flex-wrap justify-end space-x-2">
                                                    <button class="btn-sm border-gray-200 hover:border-gray-300 text-gray-600" type="button" @click="modalOpen = false">Cancel</button>
                                                    <button type="submit" name="edit" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <form class="flex items-center" action="./handler/service_handler.php" method="post">
                                    <input type="hidden" name="id" value="<?= $service['id']; ?>"/>
                                    <button name="delete" class="font-bold text-xs text-red-500">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="flex items-center h-56 justify-center">
                        <p class="text-gray-400 text-sm">No Service Found!</p>
                    </div>
                <?php endif;  ?>
            </div>
            <!-- <div class="mt-6">
                            <div class="flex justify-end"><a class="btn bg-white border-gray-200 hover:border-gray-300 text-indigo-500" href="#0">See All Questions -&gt;</a></div>
                        </div> -->
        </div>
    </div>
</main>
</div>
</div>
<script src="main.75545896273710c7378c.js"></script>
</body>

</html>