<?php
    $dsn = "mysql:host=hngomrlb3vfq3jcr.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=r6odg96pvkgct8fi";
    $username = "oaknzbxtidk1ongn";
    $password ="qdr1gbtw13lh16aa";
    
    

try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include ('erros/database_error.php');
    exit();
}
?>