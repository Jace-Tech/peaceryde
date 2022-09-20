<?php 

if(isset($_POST['markall'])) {
    try {
        $query = "UPDATE `notification` SET `isRead` = ?";
        $result = $connect->prepare($query);
        $result->execute([1]);
    
        setAdminAlert("Notification updated successfully", "success");
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    } catch (PDOException $e) {
        setAdminAlert($e->getMessage(), "error");
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
}