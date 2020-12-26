<?php

    require '../fw/fw.php';

    unset($_SESSION['login']);
    header("Location: login");
    exit;
?>
