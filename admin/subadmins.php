<?php $title  ?>
<?php require_once("./addons/session.php"); ?>
<?php require_once('../db/config.php'); ?>
<?php require_once('../models/Admin.php'); ?>
<?php require_once('../utils/country_fee.php'); ?>
<?php require_once('../functions/index.php'); ?>
<?php require_once('../models/Service.php'); ?>


<?php 
    $admin = new Admin($connect); 
    $service = new Service($connect); 

    $active = $title = "Manage";
?>

<!doctype html>
<html lang="en">
	<?php include('./components/main_header.php'); ?>
			<main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                    <div class="sm:flex sm:justify-between sm:items-center mb-8">
                        <div class="mb-4 sm:mb-0">
                            <h1 class="text-2xl md:text-3xl text-gray-800 font-bold">Manage Admins ✨</h1>
                        </div>
                        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                            <div class="table-items-action hidden">
                                <div class="flex items-center">
                                    <div class="hidden xl:block text-sm italic mr-2 whitespace-nowrap"><span class="table-items-count"></span> items selected</div><button class="btn bg-white border-gray-200 hover:border-gray-300 text-red-500 hover:text-red-600">Delete</button>
                                </div>
                            </div>

                            <div x-data="{ modalOpen: false }">
                                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white" @click.prevent="modalOpen = true" aria-controls="feedback-modal">
                                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                                    </svg> 
                                    <span class="hidden xs:block ml-2">Add Admin</span>
                                </button>
                                <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity" x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak></div>
                                <div id="feedback-modal" class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center transform px-4 sm:px-6" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="transition ease-in-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4" x-cloak>
                                    <form method="post" action="./handler/subadmin_handler.php" class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                        <div class="px-5 py-3 border-b border-gray-200">
                                            <div class="flex justify-between items-center">
                                                <div class="font-semibold text-gray-800">Create Sub Admin</div>
                                                <button class="text-gray-400 hover:text-gray-500" type="button" @click="modalOpen = false">
                                                    <div class="sr-only">Close</div><svg class="w-4 h-4 fill-current">
                                                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" /></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="px-5 py-4">
                                            <div class="space-y-3">
                                                <div>
                                                    <label class="block text-sm font-medium mb-1" for="name">Name <span class="text-red-500">*</span></label> 
                                                    <input name="name" id="name" class="form-input w-full px-2 py-2" required />
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium mb-1" for="email">Email <span class="text-red-500">*</span></label> 
                                                    <input name="email" id="email" class="form-input w-full px-2 py-2" type="email" required />
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium mb-1" for="feedback">Password <span class="text-red-500">*</span></label> 
                                                    <div class="relative">
                                                        <input id="form-search" data-password-input class="form-input w-full pl-3" type="password"> 
                                                        <button type="button" data-password-btn class="absolute inset-0 left-auto group btn hover:bg-gray-200 text-xs px-3" type="submit" aria-label="Search">
                                                            Auto generate
                                                        </button>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium mb-1" for="feedback">Services <span class="text-red-500">*</span></label> 
                                                    <div class="relative flex flex-col">
                                                        <?php if(count($service->getAllServices())): ?>
                                                            <?php foreach($service->getAllServices() as $service_item):?>
                                                                <div class="m-3">
                                                                    <label class="flex items-center">
                                                                        <input type="radio" value="<?= $service_item['service_id']; ?>" name="service" class="form-radio"> 
                                                                        <span class="text-sm ml-2"><?= $service_item['service']; ?></span>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach  ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="flex align-center">
                                                        <label class="block text-sm font-medium mb-1" for="feedback">Countries <span class="text-red-500">*</span></label> 
                                                        <div class="relative ml-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                                                            <button class="block" aria-haspopup="true" :aria-expanded="open" @focus="open = true" @focusout="open = false" @click.prevent="" aria-expanded="false">
                                                                <svg class="w-4 h-4 fill-current text-gray-400" viewBox="0 0 16 16">
                                                                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                                                                </svg>
                                                            </button>
                                                            <div class="z-10 absolute bottom-full left-1/2 transform -translate-x-1/2">
                                                                <div class="min-w-56 bg-gray-800 p-2 rounded overflow-hidden mb-2" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
                                                                    <div class="text-xs text-gray-200">Hold Ctrl [or Command on Mac] then select the countries</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="relative flex flex-col">
                                                        <?php if(count($country_fee)): ?>
                                                            <select class="form-control" name="country[]" multiple="multiple">
                                                                <?php foreach($country_fee as $country => $value):?>
                                                                    <?php if(!array_search($country, $admin->getTakenCountries())): ?>
                                                                        <div class="m-3">
                                                                            <option value="<?= $country; ?>">
                                                                                <?= $country; ?>
                                                                            </option>
                                                                        </div>
                                                                    <?php endif;  ?>
                                                                <?php endforeach  ?>
                                                            </select>
                                                        <?php endif; ?>
                                                        
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="px-5 py-4 border-t border-gray-200">
                                            <div class="flex flex-wrap justify-end space-x-2"><button class="btn-sm border-gray-200 hover:border-gray-300 text-gray-600" type="button" @click="modalOpen = false">Cancel</button> 
                                            <button type="submit" name="addAdmin" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Create</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-sm border border-gray-200">
                        <header class="px-5 py-4 border-b border-gray-100">
                            <h2 class="font-semibold text-gray-800">Sub Admins <span class="text-gray-400 font-medium"><?= count($admin->getAllAdmins()) - 1; ?></span></h2>
                        </header>

                        <div x-data="handleSelect">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full">
                                    <?php if(count($admin->getAllAdmins()) - 1): ?>
                                        <thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50 border-t border-b border-gray-200">
                                            <tr>
                                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Name</div>
                                                </th>
                                                
                                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Email</div>
                                                </th>
                                                
                                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Role</div>
                                                </th>
                                                
                                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Countries</div>
                                                </th>
                                                
                                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Status</div>
                                                </th>

                                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"><span class="sr-only">Menu</span></th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-sm divide-y divide-gray-200">
                                            <?php foreach ($admin->getAllSubAdmins() as $subadmin): extract($subadmin); ?>
                                                <tr> 
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                                <div class="flex items-center justify-center bg-gray-100 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                                                                    <?= getSubName($name) ?>
                                                                </div>
                                                            </div>
                                                            <div class="font-medium text-gray-800"><?= $name; ?></div>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="text-left"><?= $email; ?></div>
                                                    </td>
                                                    
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="text-left">
                                                            <?= $service->getService($admin_id); ?>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="text-left" style="text-transform: capitalize;">
                                                            <?= formatCountryArray($admin->getSubAdmin($admin_id)['countries']); ?>
                                                        </div>
                                                    </td>
                                                                                                
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <?php if($admin->getStatus($admin_id) == "active"): ?>
                                                            <div class="inline-flex font-medium bg-green-100 text-green-600 rounded-full text-xs text-center px-2.5 py-0.5" style="text-transform: capitalize;">
                                                                <?= $admin->getStatus($admin_id); ?>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="inline-flex font-medium bg-yellow-100 text-yellow-600 rounded-full text-xs text-center px-2.5 py-0.5" style="text-transform: capitalize;">
                                                                <?= $admin->getStatus($admin_id); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                        <div class="flex">
                                                            <?php if($admin->getStatus($admin_id) == "active"): ?>
                                                                <form action="./handler/subadmin_handler.php" method="post">
                                                                    <button name="suspendAdmin" value="<?= $admin_id; ?>" class="btn text-yellow-600 text-xs bg-yellow-100 btn-sm">Suspend</button>
                                                                </form>
                                                            <?php else: ?>
                                                                <form action="./handler/subadmin_handler.php" method="post">
                                                                    <button name="unSuspendAdmin" value="<?= $admin_id; ?>" class="btn text-green-600 text-xs bg-green-100 btn-sm">Unsuspend</button>
                                                                </form>
                                                            <?php endif; ?>
                                                            <div x-data="{ modalOpen: false }">
                                                                <button href="" class="btn bg-blue-100 btn-sm text-xs text-blue-600 ml-2" @click.prevent="modalOpen = true" aria-controls="feedback-modal-<?= $admin_id; ?>">Edit</button>
                                                                <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity" x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak></div>
                                                                <div id="feedback-modal-<?= $admin_id; ?>" class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center transform px-4 sm:px-6" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="transition ease-in-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4" x-cloak>
                                                                    <form method="post" action="./handler/subadmin_handler.php" class="bg-white rounded shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                                                        <div class="px-5 py-3 border-b border-gray-200">
                                                                            <div class="flex justify-between items-center">
                                                                                <div class="font-semibold text-gray-800">Edit Sub Admin</div>
                                                                                <button class="text-gray-400 hover:text-gray-500" type="button" @click="modalOpen = false">
                                                                                    <div class="sr-only">Close</div><svg class="w-4 h-4 fill-current">
                                                                                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" /></svg>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="px-5 py-4">
                                                                            <div class="space-y-3">
                                                                                <div>
                                                                                    <label class="block text-sm font-medium mb-1" for="name">Name <span class="text-red-500">*</span></label> 
                                                                                    <input name="name" id="name" value="<?= $name; ?>" class="form-input w-full px-2 py-2" required />
                                                                                    <input name="id" type="hidden" value="<?= $admin_id; ?>"/>
                                                                                </div>

                                                                                <div>
                                                                                    <label class="block text-sm font-medium mb-1" for="email">Email <span class="text-red-500">*</span></label> 
                                                                                    <input name="email" id="email" value="<?= $email ?>" class="form-input w-full px-2 py-2" type="email" required />
                                                                                </div>

                                                                                <div>
                                                                                    <label class="block text-sm font-medium mb-1" for="feedback">Services <span class="text-red-500">*</span></label> 
                                                                                    <div class="relative flex flex-col">
                                                                                        <?php if(count($service->getAllServices())): ?>
                                                                                            <?php foreach($service->getAllServices() as $service_item):?>
                                                                                                <div class="m-3">
                                                                                                    <?php if($service->getService($admin_id) == $service_item['service_id']): ?>
                                                                                                        <label class="flex items-center">
                                                                                                            <input type="radio" checked value="<?= $service_item['service_id']; ?>" name="service" class="form-radio"> 
                                                                                                            <span class="text-sm ml-2"><?= $service_item['service']; ?></span>
                                                                                                        </label>
                                                                                                    <?php else: ?>
                                                                                                        <label class="flex items-center">
                                                                                                            <input type="radio" checked value="<?= $service_item['service_id']; ?>" name="service" class="form-radio"> 
                                                                                                            <span class="text-sm ml-2"><?= $service_item['service']; ?></span>
                                                                                                        </label>
                                                                                                    <?php endif; ?>
                                                                                                </div>
                                                                                            <?php endforeach  ?>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div>
                                                                                    <div class="flex align-center">
                                                                                        <label class="block text-sm font-medium mb-1" for="feedback">Countries <span class="text-red-500">*</span></label> 
                                                                                        <div class="relative ml-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                                                                                            <button class="block" aria-haspopup="true" :aria-expanded="open" @focus="open = true" @focusout="open = false" @click.prevent="" aria-expanded="false">
                                                                                                <svg class="w-4 h-4 fill-current text-gray-400" viewBox="0 0 16 16">
                                                                                                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                                                                                                </svg>
                                                                                            </button>
                                                                                            <div class="z-10 absolute bottom-full left-1/2 transform -translate-x-1/2">
                                                                                                <div class="min-w-56 bg-gray-800 p-2 rounded overflow-hidden mb-2" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
                                                                                                    <div class="text-xs text-gray-200">Hold Ctrl [or Command on Mac] then select the countries</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="relative flex flex-col">
                                                                                        <?php if(count($country_fee)): ?>
                                                                                            <select class="form-control" name="country[]" multiple="multiple">
                                                                                                <?php foreach($country_fee as $country => $value):?>
                                                                                                    <?php if(in_array($country, json_decode($admin->getSubAdmin($admin_id)['countries'], true))): ?>
                                                                                                        <div class="m-3">
                                                                                                            <option value="<?= $country; ?>" selected>
                                                                                                                <?= $country; ?>
                                                                                                            </option>
                                                                                                        </div>
                                                                                                    <?php else: ?>
                                                                                                        <div class="m-3">
                                                                                                            <option value="<?= $country; ?>">
                                                                                                                <?= $country; ?>
                                                                                                            </option>
                                                                                                        </div>
                                                                                                    <?php endif;  ?>
                                                                                                <?php endforeach  ?>
                                                                                            </select>
                                                                                        <?php endif; ?>
                                                                                        
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="px-5 py-4 border-t border-gray-200">
                                                                            <div class="flex flex-wrap justify-end space-x-2"><button class="btn-sm border-gray-200 hover:border-gray-300 text-gray-600" type="button" @click="modalOpen = false">Cancel</button> 
                                                                            <button type="submit" name="editAdmin" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Update</button></div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <form action="./handler/subadmin_handler.php" method="post">
                                                                <input type="hidden" name="admin" value="<?= $admin_id; ?>">
                                                                <button name="deleteAdmin" value="<?= $admin_id; ?>" class="btn text-red-600 text-xs bg-red-100 btn-sm ml-2">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?> 
                                            
                                        </tbody>

                                    <?php else: ?>
                                        <tr>
                                            <td class="h-56">
                                                <div class="p-2 flex justify-center align-center ">
                                                    <h4 class="text-blue-500 text-sm">No Sub Admin Found</h4>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener("alpine:init", () => {
                            Alpine.data("handleSelect", () => ({
                                selectall: !1,
                                selectAction() {
                                    countEl = document.querySelector(".table-items-action"), countEl && (checkboxes = document.querySelectorAll("input.table-item:checked"), document.querySelector(".table-items-count").innerHTML = checkboxes.length, checkboxes.length > 0 ? countEl.classList.remove("hidden") : countEl.classList.add("hidden"))
                                },
                                toggleAll() {
                                    this.selectall = !this.selectall, checkboxes = document.querySelectorAll("input.table-item"), [...checkboxes].map(e => {
                                        e.checked = this.selectall
                                    }), this.selectAction()
                                },
                                uncheckParent() {
                                    this.selectall = !1, document.getElementById("parent-checkbox").checked = !1, this.selectAction()
                                }
                            }))
                        })
                    </script>
                    <div class="mt-8">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <nav class="mb-4 sm:mb-0 sm:order-1" role="navigation" aria-label="Navigation">
                                <ul class="flex justify-center">
                                    <!-- <li class="ml-3 first:ml-0"><a class="btn bg-white border-gray-200 text-gray-300 cursor-not-allowed" href="#0" disabled="disabled">&lt;- Previous</a></li>
                                    <li class="ml-3 first:ml-0"><a class="btn bg-white border-gray-200 hover:border-gray-300 text-indigo-500" href="#0">Next -&gt;</a></li> -->
                                </ul>
                            </nav>
                            <div class="text-sm text-gray-500 text-center sm:text-left">Showing <span class="font-medium text-gray-600">0</span> to <span class="font-medium text-gray-600">0</span> of <span class="font-medium text-gray-600"><?= count($admin->getAllAdmins()) - 1; ?></span> results</div>
                        </div>
                    </div>
                </div>
            </main>
		</div>
	</div>
	<script src="main.75545896273710c7378c.js"></script>

    <script>
        const btns = document.querySelectorAll('[data-password-btn]')
        const inputs = document.querySelectorAll('[data-password-input]')

        const generatePin = (length = 15) => {
            let password = "",
                prefix = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"

            for ($i = 0; $i < length; $i++){
                password += prefix.split("")[Math.floor(Math.random() * (prefix.length - 1))]
            }

            return password;
        }

        btns.forEach((btn, index) => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault();
                const pin = generatePin();

                inputs[index].value = pin
                inputs[index].type = "text"
                // inputs[index].readonly = true
                await navigator.clipboard.writeText(pin)

                btn.innerHTML = "copied to clipboard"

                setTimeout(() => {
                    btn.innerHTML = "Auto generate"
                }, 1000)
            })
        })
    </script>

    <?php getLinkColor($title); ?>

</body>

</html>