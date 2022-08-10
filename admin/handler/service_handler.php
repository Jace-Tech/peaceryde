<?php

require_once("./models.php");

$SERVICE = new Service($connect);

if(isset($_POST['add'])) {
    $name = filter_field($_POST['name']);
    $addons = $_POST['addons'];
    $price = $_POST['price'];

    $data = [
        "name" => $name,
        "addons" => json_encode($addons),
        "price" => $price
    ];

    $result = $SERVICE->addService($data);

    if($result) {
        setAdminAlert("Service added successfully", 'success');
        header('Location: ../service.php');
    }
    else {
        setAdminAlert("Something went wrong", 'error');
        header('Location: ../service.php');
    }
}

if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    $result = $SERVICE->deleteService($id);
    if($result) {
        setAdminAlert("Service deleted successfully", 'success');
        header('Location: ../service.php');
    }
    else {
        setAdminAlert("Something went wrong", 'error');
        header('Location: ../service.php');
    }
}

if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $addons = $_POST['addons'];
    $price = $_POST['price'];
    $service = $_POST['name'];

    $data = [
        "service" => $service,
        "price" => $price,
        "addons" => json_encode($addons),
    ];

    $result = $SERVICE->editService($data, $id);

    if($result) {
        setAdminAlert("Service updated successfully", 'success');
        header('Location: ../service.php');
    }
    else {
        setAdminAlert("Something went wrong", 'error');
        header('Location: ../service.php');
    }
}

if(isset($_POST["delete-service"])) {
    $id = $_POST["delete-service"];
    $user = $_POST['user'];

    try {
        $query = "DELETE FROM user_services WHERE id = ?";
        $result = $connect->prepare($query);
        $result->execute([$id]); 
    
        if($result) {
            setAdminAlert("Service deleted successfully", 'success');
            header("Location: ../user-datails.php?user=$user");
        }
        else {
            setAdminAlert("Service failed delete", 'error');
            header("Location: ../user-datails.php?user=$user");
        }
    }
    catch (PDOException $e) {
        setAdminAlert("Service failed delete", 'error');
        header("Location: ../user-datails.php?user=$user");
    }
}