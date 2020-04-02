<?php include 'view/header.php'; ?>
<main>
    <body>
        <div>
             <h1> Thank you for registering, <?php echo $_SESSION['firstname']; ?>.</h1>
                    <p><a href="index.php">Click here<a> to view our vehicle list</p>
             <?php
            $_SESSION = array();         
            session_destroy();
            $name = session_name();
            $expire = strtotime('-1 year');
            $params = session_get_cookie_params();
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];
            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
            ?>
            
        </div>
    <body>
</main>
<?php include 'view/footer.php'; ?>