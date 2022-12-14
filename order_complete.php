<?php
    session_start();
    include_once("db.inc");
    if(isset($_POST['product_id'])&& isset($_POST['email']) && isset($_POST['order_num'])&& isset($_POST['name'])){
        $order_id = $_POST['order_num'];
        $product_id = $_POST['product_id'];
        //$query = "DELETE * FROM order_product WHERE order_id=$order_id AND product_id=$product_id";
        //$statement = $db->prepare($query);
        //$statement->execute();
        //$statement->closeCursor();

        $to      = $_POST['email'];
        $subject = 'Your Food Is Ready! @ Mckinley Café';
        $message = 'Your '.$_POST['name'].' is ready for pickup at the Mckinley Café!';
    
        mail($to, $subject, $message);
    }

?>