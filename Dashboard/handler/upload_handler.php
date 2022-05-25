<?php  

session_start();


include("../../db/config.php");
include("../../models/Upload.php");

$uploads = new Upload($connect);

if(isset($_POST['upload'])) {
    $id = $_POST['id'];
    $service = "NULL";
    $name = $_POST['name'];

    $fileUpload = $uploads->uploadFile($_FILES["myFile"], "../upload/");
    if($fileUpload['status'] == "success") {
        $uploaded = $uploads->uploadToDB($id, $fileUpload['file_name'], $name, $service);

        if($uploaded) {
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
    else {
        $alert = [
            "status" => "error",
            "message" => "Upload failed"
        ];

        $_SESSION['ALERT'] = json_encode($alert);
        header("Location: ../upload.php");
    }
}