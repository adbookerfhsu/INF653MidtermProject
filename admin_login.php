<?php
    require_once('model/database.php');
    require_once('model/admin_db.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim(filter_input(INPUT_POST, 'username'));
        $password = trim(filter_input(INPUT_POST, 'password'));

        if (empty($username)) $error_username = 'Please enter your username.';
        if (empty($password)) $error_password = 'Please enter your password.';

        if (empty($error_username) && empty($error_password)) {
            if (is_valid_admin_login($username, $password)) {
                session_start();
                $_SESSION['is_valid_admin'] = true;
                header("Location: admin.php");
            } else {
                $error_username = 'Username and password do not validate.';
            }
        }
    }
    
?>
<?php include 'view/headeradmin.php' ; ?>
<main>
    <h1>Admin Login - Please sign in!</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="admin_Login_form" >
            
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <span class="error_message"><?php if(!empty($error_username)) echo $error_username; ?></span>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <span class="error_message"><?php if(!empty($error_password)) echo $error_password; ?></span>
        
        <input type="submit" class="button" value="LOG IN">
</form>
    <p>All fields required.</p>
 </main>
   <?php include 'view/footer.php';?>
