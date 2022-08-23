<script src="./js/sweetalert.js"></script>
<?php 

if(isset($_SESSION['ALERT'])) {
        $alert = json_decode($_SESSION['ALERT'], true);
        $message = $alert['message'];
        $type = $alert['status'];
        $text = $alert['text'];
    ?>
        <script> 
            swal("<?= $message ?>", "<?= $text ?>", "<?= $type ?>");
        </script>
    <?php

}

unset($_SESSION['ALERT']);
?>