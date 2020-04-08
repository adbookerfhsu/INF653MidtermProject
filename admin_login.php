<?php
require_once('util/secure_conn.php');
include('view/headeradmin.php');
?>

<main>
<h1>Login</h1>

<form action="." method="post" id="admin_Login_form" class="aligned">
    <input type="hidden" name="action" value="login">
        
        <label>Username:</label>
        <input type="text" class="text" name="username">
        <br>

        <label>Password:</label>
        <input type="password" class="text" name="password">

        <label>Confirm Password:</label>
        <input type="password" class="text" name="confirmpassword">

        <label>&nbsp;</label>
        <input type="submit" value="Login">
</form>

    <p><?php echo $login_message; ?></p>

</main>

