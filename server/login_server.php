<?php
include('../function.php');

$url = 'http://localhost/app_chat/login.php';

$required_feilds = ['email', 'password'];

$validate = validate($_POST, $required_feilds);

if ($validate) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (isset($_POST['remember_me'])) {
        setcookie('email', $email, time() + (30), "/");
        setcookie('password', $pass, time() + (30), "/");
    } else {
        setcookie('email', '', time() - 3600, '/');
        setcookie('password', '', time() - 3600, '/');
    }
    $query = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$pass'";
    $data = mysqli_query($connection, $query);
    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $user_detail = mysqli_fetch_assoc($data);
        $_SESSION['loggedInUserId'] = $user_detail['id'];
        $url = 'http://localhost/app_chat/chat.php';
    } else {
        setMessage('error', "Invalid Username or Password!");
    }
    setMessage('errors', $error);
}
redirect($url);
exit;
