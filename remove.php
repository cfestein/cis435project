<?php
    session_start();
    foreach(array_keys($_SESSION['cart'],$_POST['product_id']) as $key){
        unset($_SESSION['cart'][$key]);
    }
    unset($_SESSION['quants'][$_POST['product_id']]);
?>