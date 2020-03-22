<?php
    $dsn = "mysql:host=	hngomrlb3vfq3jcr.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=	kgp21rpv7ij4y8mf";
    $username = "pwptmv8c3plijz4l";
    $password = "upx9tlzf0xdvnlq9";
    
    

try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include ('../errors/database_error.php');
    exit();
}
?>