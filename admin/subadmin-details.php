<?php require_once("./addons/models.php"); ?>

<?php
if (!isset($_GET['subadmin'])) header('Location: ../subadmins.php');
?>

<?php
    $active = $title = "manage";
    $admin = new Admin($connect);
    $user = new User($connect);
    $userServices = new UserService($connect);
    $services = new Service($connect);
    $trackings = new Tracking($connect);

    $ADMIN = getSubAdmin($connect, $_GET['subadmin']);
    $ADMIN_SERVICES = json_decode(getSubAdminService($connect, $_GET['subadmin'])['services'], true);
    $ADMIN_USERS = getSubAdminUsers($connect, $_GET['subadmin']);
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
                    <a href="./subadmins.php">
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-gray-600" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
                        </svg>
                    </a>
                </div>
                <h1 class="text-2xl md:text-3xl text-gray-700 font-bold">Sub Admin</h1>
            </div>
        </div>

        <div class="mt-16">
            <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Profile</h3>
            <div class="mt-4">
                <div class="px-2 py-2 border-b flex">
                    <p class="text-gray-600 text-sm font-bold mr-2">Full Name: </p>
                    <p class="text-gray-600 flex-1 text-sm">
                        <?= $ADMIN['name']; ?>
                    </p>
                </div>

                <div class="px-2 py-2 border-b flex">
                    <p class="text-gray-600 text-sm font-bold mr-2">Email: </p>
                    <p class="text-gray-600 flex-1 text-sm">
                        <?= $ADMIN['email']; ?>
                    </p>
                </div>

                <div class="px-2 py-2 border-b flex">
                    <p class="text-gray-600 text-sm font-bold mr-2">Country: </p>
                    <p class="text-gray-600 flex-1 text-sm">
                        <?= $ADMIN['country'] ?? "<i>NILL</i>"; ?>
                    </p>
                </div>

                <div class="px-2 py-2 border-b flex">
                    <p class="text-gray-600 text-sm font-bold mr-2">Date of Birth: </p>
                    <p class="text-gray-600 flex-1 text-sm">
                        <?= $ADMIN['date_of_birth'] ?? "<i>NILL</i>"; ?>
                    </p>
                </div>
            </div>
        </div>


        <div class="mt-16">
            <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Services</h3>
            <div class="mt-4">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <?php if (count($ADMIN_SERVICES)) : ?>
                            <?php foreach ($ADMIN_SERVICES as $role): ?>  
                                <div class="px-2 py-2 border-b flex">
                                    <p class="text-gray-600 flex-1 text-sm">
                                        <?= getService($connect, $role)['service']; ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-16">
            <h3 class="mt-2 text-gray-600 font-bold text-md uppercase">Users</h3>
            <div class="mt-4">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
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
                            <?php if (count($ADMIN_USERS)) : ?>
                                <?php foreach($ADMIN_USERS as $USER): ?>
                                    <tr>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="font-medium text-gray-800">
                                                    <a href="./user-details.php?user=<?= $USER['user']; ?>&redirect=subadmin-details.php?subadmin=<?= $_GET['subadmin'] ?>" class="text-indigo-500 text-sm font-medium">
                                                        <?= $user->get_user($USER['user'])['firstname'] .  "  " . $user->get_user($USER['user'])['lastname'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="font-medium text-gray-800 flex">
                                                    <form action="./handler/subadmin_handler.php" method="post">
                                                        <input type="hidden" name="user" value="<?= $USER['user'] ?>" />
                                                        <input type="hidden" name="admin" value="<?= $_GET['subadmin'] ?>" />
                                                        <button type="submit" class="btn btn-sm btn-red-500">Remove user</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
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