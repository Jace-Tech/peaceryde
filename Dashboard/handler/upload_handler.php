<?php  

session_start();


include("../../db/config.php");
include("../../models/Upload.php");
include("../../functions/index.php");
include("../../utils/store.php");

$uploads = new Upload($connect);
if(isset($_POST['upload'])) {
    $id = $_POST['id'];
    $service = "NULL";
    $name = $_POST['name'];


    $file = $_FILES["myFile"];

    // Check if there's eror uploading file
    if($file["error"][0]) {
        setUserAlert("Error uploading file", "error");
        header("Location: ./upload.php");
        exit();
    }

    $uploaded = true;
    $filenames = [];
    for($num = 0; $num < count($file['name']); $num++) {
        $fileNameArray = explode(".", $file['name'][$num]);
        $extension = end($fileNameArray);
        $time = time();
        $filename = "$name-$time.$extension";

        $tepFile = $file['tmp_name'][$num];
        $destination = "../upload/$filename";

        if(!move_uploaded_file($tepFile, $destination)) {
            $uploaded = false;
        }

        array_push($filenames, $filename);
    }

    if(!$uploaded) {
        setUserAlert("Error uploading file", "error");
        header("Location: ./upload.php");
        exit();
    }

    try {
        $query = "INSERT INTO `uploads`(`user_id`, `name`, `file`, `service_id`, `status`) VALUES (:userid, :name, :service, :filename, :status)";
        $result = $connect->prepare($query);
        $result->execute([
            'userid' => $id,
            'name' => $name,
            'service' => "FILE",
            'filename' => json_encode($filenames),
            'status' => "Awaiting approval"
        ]);

        if($result) {
            $subAdmin = fetchUsersSubAdmins($connect, $id);
            array_push($subAdmin, "MAIN_ADMIN");
            $user = getUser($connect, $id);

            $firstname = $user["firstname"];
            $lastname = $user["lastname"];

            setAdminNotification($connect, "./user-details.php#document?user=$id", json_encode($subAdmin), "<strong>$firstname $lastname</strong> just uploaded a new file");
            setUserAlert("File upload success", "success");
            header("Location: ../upload.php");
        }
    } catch (PDOException $e) {
        setUserAlert("Upload failed", "error");
        header("Location: ../upload.php");
    }
}