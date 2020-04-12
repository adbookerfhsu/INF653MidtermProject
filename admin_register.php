<?php
    // start session management and include necessary functions
    session_start();
    require_once('util/valid_admin.php');
    require('model/database.php');
    require('model/admin_db.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim(filter_input(INPUT_POST, 'username'));
        $password = trim(filter_input(INPUT_POST, 'password'));
        $confirmpassword = trim(filter_input(INPUT_POST, 'confirmpassword'));

    //check username
    if (empty($username)) {
            $error_username = 'Username can not be blank.';
    } else if (strlen($username) < 6) {
        $error_username = "Username must be 6 or more characters."; 
    } else {
        $query = "SELECT COUNT(*) 
                FROM administrators 
                WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        
        if($statement->fetchColumn()) {
            $error_username = "The username you entered is already taken.";
        }
    }
    // check password
    if (empty($password)) $error_password = "Please enter a password.";

    $regexfilter = array("options"=>array("regexp"=>"/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/"));
    if (!filter_var($password, FILTER_VALIDATE_REGEXP, $regexfilter)) {
        $error_password = "Your password must contain at least one number, one uppercase, one lowercase letter and must be more than 7 characters.";
    }
    //check confirmpassword
    if ($password != $confirmpassword) {
        $error_confirmpassword = "Passwords do not match.";
    }

    // no errors
    if (empty($error_username) && empty($error_password) && empty($error_confirmpassword)) {
        add_admin($username, $password);
        header("Location: admin.php");
        }
    }
    
    ?>
    <?php include 'view/headeradmin.php'; ?>
    <main>
    <h1 id="admin_login_form">Register a new Admin User</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"><span class="error_message"><?php if(!empty($error_username)) echo $error_username;?></span>
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" title="Must contain at least one number, one uppercase letter, one lowercase letter and be 8 or more characters."><span class="error_message"><?php if(!empty($error_password)) echo $error_password; ?></span>

            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" name="confirmpassword" id="confirmpassword" title="Must contain at least one number, one uppercase letter, one lowercase letter and be 8 or more characters.">
            <span class="error_message"><?php if (!empty($error_confirmpassword)) echo $error_confirmpassword; ?></span>

            <input type="submit" class="button" value="REGISTER">
    </form>

        <p>All fields required.</p>
        
    
    </main>
    
    <?php include 'view/footer.php';?>