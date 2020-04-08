<?php
// start session management and include necessary functions
require_once('model/database.php');
require_once('model/admin_db.php');
include('view/headeradmin.php');

//Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $login_message = 'You must login to view this page.';
} else {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $confirmpassword = filter_input(INPUT_POST, 'confirmpassword');
    if($username == NULL) {
        $error_username = 'Username can not be blank.';
    } 
}


    if (!isset($_SESSION['is_valid_admin'])) {
    $action = 'login';
    include('admin.php');
}


?>

<main>
<h1>Login</h1>

<form action="." method="post" id="admin_login_form" class="aligned">
    <input type="hidden" name="action" value="login">
        
        <label>Username:</label>
        <input type="text" class="text" name="username">
        <br>

        <label>Password:</label>
        <input type="password" class="text" name="password">

        <label>Confirm Password:</label>
        <input type="confirmpassword" class="text" name="confirmpassword">

        <label>&nbsp;</label>
        <input type="submit" value="Login">
</form>

    <p><?php echo $login_message; ?></p>
    <?php
    if(isset($error_username)) { ?>
    <p><?php echo $error_username; ?></p>
    <?php } ?>


<?php include('view/footer.php');?>
</main>
</html>