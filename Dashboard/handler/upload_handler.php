<?php  

session_start();


include("../../db/config.php");
include("../../models/Upload.php");
include("../../functions/index.php");

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
            setUserAlert("File upload success", "success");
            header("Location: ../upload.php");
        }
    } catch (PDOException $e) {
        print_r($e);
    }

    // $alert = [
    //     "status" => "error",
    //     "message" => "Upload failed"
    // ];

    // $_SESSION['ALERT'] = json_encode($alert);
    // header("Location: ../upload.php");
}