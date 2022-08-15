<?php  

session_start();


include("../../db/config.php");
include("../../models/Upload.php");

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
    print_r($filenames);
    print_r($uploaded);
    die();

    if(!$uploaded) {
        setUserAlert("Error uploading file", "error");
        header("Location: ./upload.php");
        exit();
    }

    $pushed = $uploads->uploadToDB($id, json_encode($filenames), $name, $service);
    if($pushed) {
        $alert = [
            "status" => "success",
            "message" => "File uploaded successfully"
        ];

        $_SESSION['ALERT'] = json_encode($alert);
        header("Location: ../upload.php");
    }
    else {
        $alert = [
            "status" => "error",
            "message" => "Upload failed"
        ];

        $_SESSION['ALERT'] = json_encode($alert);
        header("Location: ../upload.php");
    }
}