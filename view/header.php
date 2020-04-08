<!DOCTYPE html>
<html lang="en">

<!-- head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos - INF 653 Week 11 Assignment</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
    
</head>

<!-- body section -->
<body>
<header>
    <img src="view/zippylogo.png" alt="Zippy Logo" class="center"/>
    <div id="pageLinks">
        <?php 
            session_start();
            if (!isset($_SESSION['userid'])) { 
        ?>
            <p><a href="register.php">Register</a></p>
        <?php } else {
            $userid = $_SESSION['userid'];
        ?>    
            <p>Welcome, <?php echo $userid ?>! (<a href="logout.php">Log Out</a>)</p>
       <?php } ?>
    </div>
</header>