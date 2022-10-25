<?php require_once("./addons/models.php"); ?>

<?php
if (!isset($_GET['user'])) header('Location: ./users.php');

if (isset($_GET['_tification_id'])) {
    markNotificationAsSeen($connect, $_GET['_tification_id']);
}
?>

<?php
$active = $title = "users";
$users = new User($connect);
$userServices = new UserService($connect);
$services = new Service($connect);
$trackings = new Tracking($connect);

// GET BI-FORM
$BI_DETAILS = getBiDetails($connect, $_GET["user"]);

$USER = $users->get_user($_GET['user']);
$USER_SERVICES = $userServices->getAllUserServices($_GET['user']);
$USERS_DOCS = getUsersUploads($connect, $_GET['user']);

$USERS_ADMIN = fetchUsersSubAdmins($connect, $_GET['user']);
?>

<!doctype html>
<html lang="en">
<?php include('./components/main_header.php'); ?>
<?php include('./components/alert.php'); ?>
<main>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8 border-b pb-2">
            <div class="mb-4 sm:mb-0 flex items-center">
                <div class="mr-2">
                    <a href=" <?= $_GET['redirect'] ?? './users' ?>">
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-gray-600" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
                        </svg>
                    </a>
                </div>
                <h1 class="text-2xl md:text-3xl text-gray-700 font-bold">User Details</h1>
            </div>
        </div>

        <!-- USER DETAILS -->
        <div class="mt-16">
            <div class="flex items-center justify-between flex-wrap g-3">
                <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Profile</h3>
                <?php if (!isset($_GET['edit'])) : ?>
                    <a href="./user-details.php?user=<?= $_GET['user']; ?>&edit=<?= $_GET['user']; ?>" class="btn btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Edit</a>
                <?php endif; ?>
            </div>
            <div class="mt-4">
                <?php if (!isset($_GET['edit'])) : ?>
                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Title: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['title'] ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Firstname: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['firstname'] ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Middle Name: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['middle_name'] ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Lastname: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['lastname'] ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Email: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['email'] ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Gender: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['gender'] ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Country: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['country'] ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Passport: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['passport'] && !empty($USER['passport']) ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Phone No: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['phone'] ?? "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <div class="px-2 py-2 border-b flex">
                        <p class="text-gray-600 text-sm font-bold mr-2">Date of Birth: </p>
                        <p class="text-gray-600 flex-1 text-sm">
                            <?= $USER['date_of_birth'] ?? strtoupper($USER['date_of_birth']) !== "NULL" ? date("d, M Y", strtotime($USER['date_of_birth'])) : "<i>NILL</i>"; ?>
                        </p>
                    </div>

                    <?php  if(count($BI_DETAILS)): ?>
                        <div class="px-2 py-2 border-b flex">
                            <p class="text-gray-600 text-sm font-bold mr-2">Shares: </p>
                            <p class="text-gray-600 flex-1 text-sm">
                                <?= $BI_DETAILS['shares'] ?? "<i>NILL</i>"; ?>
                            </p>
                        </div>

                        <div class="px-2 py-2 border-b flex">
                            <p class="text-gray-600 text-sm font-bold mr-2">Company Name: </p>
                            <p class="text-gray-600 flex-1 text-sm">
                                <?= $BI_DETAILS['company_name'] ?? "<i>NILL</i>"; ?>
                            </p>
                        </div>

                        <div class="px-2 py-2 border-b flex">
                            <p class="text-gray-600 text-sm font-bold mr-2">Coperate Address: </p>
                            <p class="text-gray-600 flex-1 text-sm">
                                <?= $BI_DETAILS['coperate_address'] ?? "<i>NILL</i>"; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <form class="form" method="post" action="./handler/user_handler.php">
                        <div class="grid grid-cols-12 gap-6 py-3">
                            <div class="col-span-full md:col-span-6">
                                <label for="" class="block text-sm font-medium">Firstname</label>
                                <input class="w-full p-2 border-gray-300 form-input" type="text" name="firstname" value="<?= $USER['firstname'] ?? "" ?>">
                            </div>

                            <div class="col-span-full md:col-span-6">
                                <label for="" class="block text-sm font-medium">Lastname</label>
                                <input class="w-full p-2 border-gray-300 form-input" type="text" name="lastname" value="<?= $USER['lastname'] ?? "" ?>">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 py-3">
                            <div class="col-span-full md:col-span-6">
                                <label for="" class="block text-sm font-medium">Middle name</label>
                                <input class="w-full p-2 border-gray-300 form-input" type="text" name="middlename" value="<?= $USER['middle_name'] ?? "" ?>">
                            </div>

                            <div class="col-span-full md:col-span-6">
                                <label for="" class="block text-sm font-medium">Email</label>
                                <input type="hidden" name="user" value="<?= $_GET['user'] ?>" />
                                <input class="w-full p-2 border-gray-300 form-input" type="email" name="email" value="<?= $USER['email'] ?? "" ?>">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 py-3">
                            <div class="col-span-full md:col-span-6">
                                <label for="" class="block text-sm font-medium">Phone No</label>
                                <input class="w-full p-2 border-gray-300 form-input" type="text" name="phone" value="<?= $USER['phone'] ?? "" ?>">
                            </div>

                            <div class="col-span-full md:col-span-6">
                                <label for="" class="block text-sm font-medium">Passport No</label>
                                <input class="w-full p-2 border-gray-300 form-input" type="text" name="passport" value="<?= $USER['passport'] ?? "" ?>">
                            </div>
                        </div>

                        <?php if(count($BI_DETAILS)): ?>
                            <div class="grid grid-cols-12 gap-6 py-3">
                                <div class="col-span-full md:col-span-6">
                                    <label for="" class="block text-sm font-medium">Shares</label>
                                    <input class="w-full p-2 border-gray-300 form-input" type="number" name="share" value="<?= $BI_DETAILS['shares'] ?? "" ?>">
                                </div>

                                <div class="col-span-full md:col-span-6">
                                    <label for="" class="block text-sm font-medium"> Company Name</label>
                                    <input class="w-full p-2 border-gray-300 form-input" type="text" name="company_name" value="<?= $BI_DETAILS['company_name'] ?? "" ?>">
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-6 py-3">
                                <div class="col-span-full">
                                    <label for="" class="block text-sm font-medium">Coperate Address</label>
                                    <input class="w-full p-2 border-gray-300 form-input" type="text" name="coperate_address" value="<?= $BI_DETAILS['coperate_address'] ?? "" ?>">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="grid grid-cols-12 gap-6 py-3">
                            <div class="col-span-full md:col-span-6">
                                <label for="" class="block text-sm font-medium">Gender </label>
                                <select name="gender" value="<?= $USER['gender'] ?? "" ?>" class="w-full p-2 border-gray-300" id="">
                                    <option value="" disabled>Choose gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="col-span-full md:col-span-6">
                                <label for="" class="block text-sm font-medium">Date of Birth</label>
                                <input class="w-full p-2 border-gray-300 form-input" type="date" name="dob" value="<?= $USER['date_of_birth'] ?? "" ?>">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button name="update-user" class="btn btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Update Profile</button>
                        </div>
                    </form>
                <?php endif; ?>

            </div>
        </div>

        <!-- SERVICES -->
        <div class="mt-16">
            <div class="flex items-center justify-between flex-wrap">
                <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Services</h3>

                <a href="./user-details.php?page=service&user=<?= $_GET['user']; ?>" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                    </svg>
                    <span class="hidden xs:block ml-2">Add Service</span>
                </a>
            </div>

            <div class="mt-4">
                <?php if (isset($_GET['page']) && $_GET['page'] == "service") : ?>
                    <form class="block w-full" action="./handler/user_handler.php" method="post">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-full sm:col-span-6 xl:col-span-6">
                                <label class="text-sm font-semibold block mb-2 text-gray-600">Service</label>
                                <select name="service" id="" class="w-full p-2 text-sm border-gray-300 rounded-sm">
                                    <option value="" disabled selected>Choose service</option>
                                    <?php foreach ($services->getAllServices() as $_service) : ?>
                                        <option value="<?= $_service['service_id']; ?>">
                                            <?= $_service['service'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-span-full sm:col-span-6 xl:col-span-6">
                                <label class="text-sm font-semibold block mb-2 text-gray-600">Service Status</label>
                                <select name="serviceStatus" id="" class="w-full p-2 text-sm border-gray-300 rounded-sm">
                                    <option value="" disabled selected>Choose service status</option>
                                    <option value="awaiting uploads">Awaiting uploads</option>
                                    <option value="approved">Approved</option>
                                    <option value="declined">Declined</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-full sm:col-span-6 xl:col-span-6">
                                <label class="text-sm font-semibold block mb-2 text-gray-600">Amount paid</label>
                                <input type="text" name="amount" class="form-input w-full p-2 border-gray-300 rounded-sm" id="">
                            </div>

                            <div class="col-span-full sm:col-span-6 xl:col-span-6">
                                <label class="text-sm font-semibold block mb-2 text-gray-600">Payment Status</label>
                                <select name="paymentStatus" id="" class="w-full p-2 text-sm border-gray-300 rounded-sm">
                                    <option value="" disabled selected>Choose payment status</option>
                                    <option value="pending">Pending</option>
                                    <option value="success">Success</option>
                                    <option value="declined">Declined</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-6">
                            <div class="col-span-full">
                                <input type="hidden" name="id" value="<?= $_GET['user']; ?>">
                                <button name="add-service" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                                    <span class="hidden xs:block">Add Service</span>
                                </button>
                            </div>
                        </div>
                    </form>
                <?php else : ?>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <?php if (count($USER_SERVICES)) : ?>
                                <thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50 border-t border-b border-gray-200">
                                    <tr>
                                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="font-semibold text-left">Sevice</div>
                                        </th>

                                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="font-semibold text-left">Status</div>
                                        </th>

                                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="font-semibold text-left">Payment Status</div>
                                        </th>

                                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"><span class="sr-only">Menu</span></th>
                                    </tr>
                                </thead>

                                <tbody class="text-sm divide-y divide-gray-200">
                                    <?php foreach ($USER_SERVICES as $service) : ?>
                                        <tr>
                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="font-medium text-gray-800"><?= getService($connect, $service['service_id'])['service']; ?></div>
                                                </div>
                                            </td>

                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <?php if (strtolower($service['status']) == "approved") : ?>
                                                        <div class="font-light text-sm bg-green-500 text-white px-2 py-1" style="font-size: .8rem; text-transform: capitalize;"><?= $service['status']; ?></div>
                                                    <?php else : ?>
                                                        <div class="font-light text-sm bg-yellow-500 text-white px-2 py-1" style="font-size: .8rem; text-transform: capitalize;"><?= $service['status']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="font-light text-gray-500 "><?= getServicePayment($connect, $_GET['user'], $service['id'])['status'] ?? "<i>NILL</i>"; ?></div>
                                                </div>
                                            </td>

                                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <?php if (isset($_GET['update'])) : ?>
                                                    <?php if ($_GET['update'] === $service['service_id']) : ?>
                                                        <form action="./handler/user_handler.php" method="post">
                                                            <input type="hidden" name="user" value="<?= $_GET['user'] ?>" />
                                                            <input type="hidden" name="service" value="<?= $_GET['update'] ?>" />
                                                            <div class="flex items-center">
                                                                <input type="text" placeholder="Status..." name="status" class="form-input text-xs">
                                                                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white btn-sm text-sm" name="update-status">Update</button>
                                                            </div>
                                                        </form>
                                                    <?php else : ?>
                                                        <a href="./user-details.php?user=<?= $_GET['user'] ?>&update=<?= $service['service_id']; ?>" class="btn btn-sm text-xs bg-indigo-500 hover:bg-indigo-600 text-white">Update Status</a>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <a href="./user-details.php?user=<?= $_GET['user'] ?>&update=<?= $service['service_id']; ?>" class="btn btn-sm text-xs bg-indigo-500 hover:bg-indigo-600 text-white">Update Status</a>
                                                    <form action="./handler/service_handler.php" method="post">
                                                        <input type="hidden" name="user" value="<?= $_GET['user']; ?>" />
                                                        <button name="delete-service" value="<?= $service['id']; ?>" class="btn btn-sm text-xs bg-red-500 hover:bg-indigo-600 text-white">Delete Service</button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            <?php else : ?>
                                <tr>
                                    <td class="h-56">
                                        <div class="p-2 flex justify-center align-center ">
                                            <h4 class="text-blue-500 text-sm">No Service found</h4>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- DOCUMENTS -->
        <div class="mt-16" id="document">
            <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Documents</h3>
            <div class="mt-4">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <?php if (count($USERS_DOCS)) : ?>
                            <thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50 border-t border-b border-gray-200">
                                <tr>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Document Name</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Status</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"><span class="sr-only">Menu</span></th>
                                </tr>
                            </thead>

                            <tbody class="text-sm divide-y divide-gray-200">
                                <?php foreach ($USERS_DOCS as $document) : ?>
                                    <tr>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="font-medium text-gray-800">
                                                    <a download="<?= $document['name']; ?>" href="../Dashboard/uploads/<?= json_decode($document['file'], true)[0]; ?>" class="text-indigo-500 text-sm font-medium">
                                                        <?= $document['name']; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <?php if (strtolower($service['status']) == "approved") : ?>
                                                    <div class="font-light text-sm bg-green-500 text-white px-2 py-1" style="font-size: .8rem; text-transform: capitalize;"><?= $document['status']; ?></div>
                                                <?php else : ?>
                                                    <div class="font-light text-sm bg-yellow-500 text-white px-2 py-1" style="font-size: .8rem; text-transform: capitalize;"><?= $document['status']; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </td>

                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <form action="./handler/user_handler.php" method="post" class="flex items-center">
                                                <input type="hidden" name="doc" value="<?= $document['id'] ?>">
                                                <input type="hidden" name="user" value="<?= $_GET['user'] ?>">
                                                <?php if (strtolower($document['status'] !== "approved")) : ?>
                                                    <button name="approve" class="btn bg-green-500 text-sm text-white">Approve</button>
                                                <?php else : ?>
                                                    <button name="disapprove" class="btn bg-red-500 text-sm text-white">Disapprove</button>
                                                <?php endif; ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        <?php else : ?>
                            <tr>
                                <td class="">
                                    <div class="py-2 flex align-center ">
                                        <h4 class="text-blue-500 text-sm">No document found</h4>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
<script>
    const input = document.querySelector("[data-password-input]")
    const btn = document.querySelector("[data-password-btn]")

    console.log(btn, input)


    const getRandomPassword = (length = 8) => {
        let password = ""
        const texts = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"
        for (let index = 0; index < length; index++) {
            password += texts[Math.floor(Math.random() * texts.length)]
        }
        return password
    }

    btn.addEventListener("click", () => {
        input.value = getRandomPassword()
        input.type = "text";
        input.readOnly = true;
    })
</script>
<script src="main.75545896273710c7378c.js"></script>
</body>

</html>