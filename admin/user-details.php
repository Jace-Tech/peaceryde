<?php require_once("./addons/models.php"); ?>

<?php
if (!isset($_GET['user'])) header('Location: ../users.php');
?>

<?php
$active = $title = "users";
$users = new User($connect);
$userServices = new UserService($connect);
$services = new Service($connect);
$trackings = new Tracking($connect);

$USER = $users->get_user($_GET['user']);
$USER_SERVICES = $userServices->getAllUserServices($_GET['user']);
$USERS_DOCS = getUsersUploads($connect, $_GET['user']);
$USER_SUB_ADMIN = getUsersSubAdmin($connect, $_GET['user']);
$USERS_ADMIN = getSubAdmin($connect, $USER_SUB_ADMIN['sub_admin']);
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
                    <a href=" <?= $_GET['redirect'] ?? './users.php' ?>">
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-gray-600" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
                        </svg>
                    </a>
                </div>
                <h1 class="text-2xl md:text-3xl text-gray-700 font-bold">User Details</h1>
            </div>
        </div>

        <div class="mt-16">
            <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Profile</h3>
            <div class="mt-4">
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
                    <p class="text-gray-600 text-sm font-bold mr-2">Date of Birth: </p>
                    <p class="text-gray-600 flex-1 text-sm">
                        <?= $USER['date_of_birth'] ?? "<i>NILL</i>"; ?>
                    </p>
                </div>
            </div>
        </div>


        <div class="mt-16">
            <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Sub Admin</h3>
            <div class="mt-4">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <?php if ($USERS_ADMIN) : ?>
                            <thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50 border-t border-b border-gray-200">
                                <tr>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Admin Name</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <span class="sr-only">Menu</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="text-sm divide-y divide-gray-200">
                                <tr>
                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800">
                                                <a href="../Dashboard/upload/<?= $USERS_ADMIN['admin_id']; ?>" class="text-indigo-500 text-sm font-medium">
                                                    <?= $USERS_ADMIN['name']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <?php if (isset($_GET['change_admin'])) : ?>
                                            <form action="./handler/user_handler.php" method="post">
                                                <div class="flex">
                                                    <select name="subadmin" class="form-select text-sm" id="">
                                                        <?php foreach (getAllSubAdmins($connect) as $admin) : ?>
                                                            <option <?= $admin['admin_id'] === $USERS_ADMIN['admin_id'] ? " selected" : "" ?> value="<?= $admin['admin_id'] ?>">
                                                                <?= $admin['name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input type="hidden" name="id" value="<?= $admin['admin_id'] ?>">
                                                    <input type="hidden" name="user" value="<?= $_GET['user'] ?>">
                                                    <button name="change_admin" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Change</button>
                                                </div>
                                            </form>
                                        <?php else : ?>
                                            <a href="?user=<?= $_GET['user'] ?>&change_admin=<?= $USERS_ADMIN['admin_id'] ?>" class="text-indigo-500 inline-block">Change subadmin</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>

                        <?php else : ?>
                            <tr>
                                <td class="">
                                    <?php if (isset($_GET['add_admin'])) : ?>
                                        <form action="./handler/user_handler.php" method="post">
                                            <div class="flex">
                                                <select name="subadmin" class="form-select text-sm rounded-r-none" id="">
                                                    <option value="" selected disabled>Choose subadmin</option>
                                                    <?php if (count(getAllSubAdmins($connect))) : ?>
                                                        <?php foreach (getAllSubAdmins($connect) as $admin) : ?>
                                                            <option value="<?= $admin['admin_id'] ?>">
                                                                <?= $admin['name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <input type="hidden" name="user" value="<?= $_GET['user'] ?>">
                                                <button name="assign" class="btn btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">Assign</button>
                                                <a href="?user=<?= $_GET['user'] ?>" class="btn btn-sm bg-red-500 hover:bg-red-600 text-white">Cancel</a>
                                            </div>
                                        </form>
                                    <?php else : ?>
                                        <div class="py-2 flex align-center ">
                                            <h4 class="text-blue-500 text-sm">No subadmin assigned.</h4>
                                            <a href="?user=<?= $_GET['user'] ?>&add_admin" class="inline-block ml-2 text-sm font-medium text-indigo-500">Click to assign subadmin</a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-16">
            <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Services</h3>
            <div class="mt-4">
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
                                                <div class="font-light text-gray-500 "><?= getServicePayment($connect, $_GET['user'], $service['service_id'])['status'] ?? "<i>NILL</i>"; ?></div>
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
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <a href="?user=<?= $_GET['user'] ?>&update=<?= $service['service_id']; ?>" class="btn btn-sm text-xs bg-indigo-500 hover:bg-indigo-600 text-white">Update Status</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        <?php else : ?>
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

        <div class="mt-16">
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
                                                    <a href="../Dashboard/upload/<?= $document['file']; ?>" class="text-indigo-500 text-sm font-medium">
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