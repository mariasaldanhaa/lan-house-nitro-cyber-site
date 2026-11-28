<?php
    session_start();
    session_destroy();
    header("Location: ../view/initialPage.php");
    exit;
?>