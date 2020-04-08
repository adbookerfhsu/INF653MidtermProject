<?php 
    session_start();
    if(isset($_SESSION['userid'])) {
        $firstname=$_SESSION['userid'];
        unset($_SESSION['userid']);
    }

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

<!DOCTYPE html>
<html lang="en">

<!-- head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos - INF 653 Midterm Project</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
    
</head>

<!-- body section -->
<main>
<header>
    <img src="./view/zippylogo.png" alt="Zippy Logo" class="center"/>
    <div id="pageLinks">
        <p></p>            
        </div>
</header>
    <body>
        <h1>Thank you for siging out, <?php echo $firstname ?>.</h1>
        <p><a href="index.php">Click here</a> to view our vehicle list.</p>
        <br>
    </body>
</main>
<?php include('view/footer.php'); ?>