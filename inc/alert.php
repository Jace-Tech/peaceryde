<script src="./js/sweetalert.js"></script>
<?php 

if(isset($_SESSION['ALERT'])) {
        $alert = json_decode($_SESSION['ALERT'], true);
        $message = $alert['message'];
        $type = $alert['status'];
        $textAlert = $alert['text'] ?? "";
    ?>
        <script> 
            swal("<?= $message ?>", "<?= $textAlert ?>", "<?= $type ?>");
        </script>
    <?php

}

unset($_SESSION['ALERT']);
?>