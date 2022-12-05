<?php
    session_start();
    $_SESSION['quants'][$_POST['product_id']]++;
?>