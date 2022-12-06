<?php
    session_start();
    include_once("db.inc");
    //var_dump($_SESSION['cart']);
    //console.log('hi');
    //$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if(isset($_POST['email']) && isset($_POST['total']) && isset($_POST['order_time']) && isset($_POST['name'])){
        $count = 0;
        $email = $_POST['email'];
        $total = $_POST['total'];
        $order_time = $_POST['order_time'];
        $name = $_POST['name'];
        foreach($_SESSION['cart'] as $id){
            $count++;
        }
        $query = "INSERT INTO Orders(quantity, contact, total, est_time, cust_name) VALUES ('$count','$email','$total','$order_time','$name')";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();

        $query = "SELECT * FROM Orders  WHERE order_num = ( SELECT MAX(order_num) FROM Orders )";
        $statement = $db->prepare($query);
        $statement->execute();
        $product = $statement->fetchAll();
        foreach($product as $row){
            $order_num = $row['order_num'];
        }
        $statement->closeCursor();

        foreach($_SESSION['cart'] as $id){
            
            $quant = $_SESSION['quants'][$id];
            $query = "INSERT INTO order_product(product_id,amount,order_id) VALUES('$id','$quant','$order_num')";
            $statement = $db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
        }
        $_SESSION['cart'] = array();
        $_SESSION['quants'] = array();
    }

?>