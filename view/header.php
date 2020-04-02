<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos - INF 653 Midterm Project</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./view/css/main.css" />
    
</head>

<!-- the body section -->
<body>
<header><img src="./view/zippylogo.png" alt="Zippy Logo" class="center"/>
<?php if(isset($_SESSION['firstname'])) { ?>
    <p>Welcome, <?php echo $_SESSION['firstname'] ?>. (<a href="logout.php">Log Out</a>)</p>
    
<?php } else { ?>
    <p><a href="register.php" id="register">Register</a></p>
<?php } ?>
</header>