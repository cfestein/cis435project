<?php
    session_start();
    if($_SESSION['quants'][$_POST['product_id']]>1){
        $_SESSION['quants'][$_POST['product_id']]--;
    }   
    else{
        return 1;
    }
?>