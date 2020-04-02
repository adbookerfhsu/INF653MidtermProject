<?php include 'view/header.php'; ?>
<main>
    <body>
        <div>
                    
            <form action="" method="get">
                <label>Please enter your first name:</label>
                <input type="text" name="firstname">
                <input type="submit" value="Register" id="regbtn">
            </form>
            <?php if (isset($_GET['firstname'])) { 
                global $db;
                $_SESSION['firstname'] = $_GET['firstname'];?>
                <h1> Thank you for registering, <?php echo $_SESSION['firstname']; ?>.</h1>
                    <p><a href="index.php">Click here<a> to view our vehicle list</p>
            <?php }  ?>
            
        </div>
    <body>
</main>
<?php include 'view/footer.php'; ?>