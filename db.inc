<?php
    $dsn = "mysql:host=141.215.80.154;dbname=group9_db";
    $username = 'group9';
    $password = 'IaF35@Opm2c';

    try {
        $db = new PDO($dsn, $username, $password);
        // echo "successfully connected to the database";
    } catch (PDOException $e) {
        $error_message = $e->getMessage(); //
print("data_connection_error:".$error_message); include('error.php'); exit(); }
?>
