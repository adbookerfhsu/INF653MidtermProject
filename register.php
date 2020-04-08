<?php 
    $firstname = filter_input(INPUT_GET, 'firstname');
?>

<!-- head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos - INF 653 Midterm Project</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
    
</head>

<!-- body section -->
<body>
<header>
    <img src="./view/zippylogo.png" alt="Zippy Logo" class="center"/>
    <div id="pageLinks">
    <p></p>
    </div>
<main>
    <body>
        <div>
        <?php if($firstname==NULL) { ?>           
            <form action="" method="get">
                <label for="firstname">Please enter your first name:</label>
                <input type="text" id="firstname" name="firstname" maxlength="50" required>
                <input type="submit" value="Register" id="button blue">
            </form>
            <?php } else {
                $lifetime = 60 * 60 * 24 * 7;
                session_set_cookie_params($lifetime, '/');
                session_start();
                $_SESSION['userid']=$firstname;
            ?>
            <h1> Thank you for registering, <?php echo $firstname ?>!</h1>
            <p><a href="index.php">Click here</a> to view our vehicle list.</p>
            <br>
            <?php } ?>
        </div>
    <body>
</main>
<?php include('view/footer.php'); ?>