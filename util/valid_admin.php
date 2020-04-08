<?php
require_once('../util/secure_conn.php');

if (!isset($_SESSON['is_valid_admin'])) {
    header("Location: .");
}

if (!is_valid_admin_login($username, $password)) {
    header('WWW-Authenticate: Basic realm="Admin"');
    header('HTTP/1.0 401 Unauthorized');
    include('unauthorized.php');
    exit();
}
?>