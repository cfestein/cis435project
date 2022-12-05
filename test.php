<?php
//console.log("hey");
if(isset($_POST['product_id'])){
    
    session_start();
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['quants'] = array();
    }
    if(isset($_SESSION['quants'][$_POST['product_id']])){
        $_SESSION['quants'][$_POST['product_id']]++;
    }
    else{
        array_push($_SESSION['cart'],$_POST['product_id']);
        $_SESSION['quants'][$_POST['product_id']] = 1;
    }
    //include_once("db.inc");
}
/*$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
$query = 'INSERT INTO Products(product_name) VALUES (:category_id)';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->execute();
$statement->closeCursor();*/
?>