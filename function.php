<?php

include(__DIR__ . './connection.php');

$base_url = 'http://localhost/app_chat/';
$image_dir_url = $base_url . '/uploads/';

function validate($data = [], $required_fields = [])
{
    $errors = [];
    foreach ($required_fields as $key => $value) {

        if (!isset($data[$value]) || empty($data[$value])) {

            $errors[$value] = 'Please Enter' . ' ' . $value;
        }
    }
    if (count($errors) > 0) {
        setMessage('errors', $errors);
        return false;
    }
    return true;
}

function setMessage($key = false, $value = false)
{
    if ($key && $value) {
        $_SESSION[$key] = $value;
    }
}

function getMessage($key = false, $flash = false)
{
    if ($key && isset($_SESSION[$key])) {

        $message = $_SESSION[$key];
        if ($flash) {

            unset($_SESSION[$key]);
        }
        return $message;
    }
    return false;
}

function redirect($url = false)
{
    if ($url) {
        header('location:' . $url);
        exit;
    }
}

function getUser()
{
    global $connection;
    $id = $_SESSION['loggedInUserId'];
    $query = "SELECT users.*, request.receiver_id, request.is_accepted FROM users INNER JOIN request ON users.id = request.sender_id WHERE request.receiver_id = $id AND request.is_accepted = 1";
    $result = mysqli_query($connection, $query);
    $output = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function getPartnerDetail($id)
{
    global $connection;

    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($result)) {
        $output = $row;
    }
    return $output;
}

function isAuthenticated()
{

    if (!isset($_SESSION['loggedInUserId'])) {
        return true;
    }
    return false;
}
function logout()
{
    session_unset();
    session_destroy();
}

function getUnreadMessagecount($partner_id)
{
    global $connection;

    $id = $_SESSION['loggedInUserId'];

    $query = "SELECT * FROM messages WHERE sender_id = $partner_id AND receiver_id = $id AND is_read = 0";
    // echo $query;
    // die;
    $result = mysqli_query($connection, $query);
    return mysqli_num_rows($result);
}

function getUserdetail($id)
{
    global $connection;

    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $output = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function is_Block($partner_id, $user_id)
{
    global $connection;

    $query = "SELECT * FROM block_users WHERE block_user_id = $partner_id AND block_by_id = $user_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        return true;
    }
    return false;
}

function getUserList()
{
    global $connection;
    $id = $_SESSION['loggedInUserId'];
    // $query = "SELECT * FROM users WHERE id != $id";
    $query = "SELECT users.* , request.receiver_id,request.is_accepted FROM users INNER JOIN request ON request.receiver_id = users.id WHERE request.sender_id = $id AND request.is_accepted = 1";
    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function requestSent($id)
{
    $logged_id = $_SESSION['loggedInUserId'];
    global $connection;

    $query = "SELECT * FROM request WHERE receiver_id = $id AND sender_id = $logged_id AND is_accepted = 2";
    $result = mysqli_query($connection, $query);
    $output = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function request_count()
{
    global $connection;
    $id = $_SESSION['loggedInUserId'];
    $query = "SELECT * FROM request WHERE receiver_id = $id  AND is_accepted = 0";
    $result = mysqli_query($connection, $query);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        return $row;
    }
    return false;
}

function notification_count()
{
    global $connection;

    $id = $_SESSION['loggedInUserId'];
    $query = "SELECT * FROM notification WHERE sender_id = $id AND is_read = 0";
    $result = mysqli_query($connection, $query);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        return $row;
    } else {
        return false;
    }
}

function friendList($limit = 1, $offset = 0)
{
    global $connection;
    $id = $_SESSION['loggedInUserId'];
    $query = "SELECT users.*, request.receiver_id, request.sender_id, request.is_accepted FROM users INNER JOIN request ON request.sender_id = $id WHERE request.receiver_id = users.id AND request.is_accepted = 1 LIMIT $limit OFFSET $offset";
    $result = mysqli_query($connection, $query);
    $output = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function Total_friend()
{
    global $connection;
    $id = $_SESSION['loggedInUserId'];
    $query = "SELECT * FROM request WHERE sender_id = $id AND is_accepted = 1";
    $result = mysqli_query($connection, $query);
    $row = mysqli_num_rows($result);
    return $row;
}

function friendProfile($id)
{
    global $connection;

    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $output = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function requestList()
{
    global $connection;
    $id = $_SESSION['loggedInUserId'];
    $query = "SELECT * FROM request WHERE sender_id = $id";
    $result = mysqli_query($connection, $query);
    $output = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function requestAccepted($friend_id)
{
    global $connection;
    $id = $_SESSION['loggedInUserId'];
    $query = "SELECT * FROM request WHERE sender_id = $id AND receiver_id = $friend_id AND is_accepted = 1";
    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function getFriends($id)
{
    global $connection;
    $query = "SELECT users.image , request.receiver_id,request.is_accepted FROM users INNER JOIN request ON request.receiver_id = users.id WHERE request.sender_id = $id AND request.is_accepted = 1";
    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function userFollow($id)
{
    global $connection;
    $query = "SELECT users.* , request.receiver_id,request.is_accepted FROM users INNER JOIN request ON request.receiver_id = users.id WHERE request.sender_id = $id AND request.is_accepted = 0";
    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function showStatus($id)
{
    global $connection;

    $query = "SELECT * FROM `status` WHERE user_id = $id";
    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}

function showComments($status_id,$limit)
{
    global $connection;
    $logged_id = $_SESSION['loggedInUserId'];

    $query = "SELECT users.*, comments.status_id, comments.author_id, comments.comment FROM users INNER JOIN comments ON users.id = comments.author_id WHERE comments.status_id = $status_id AND comments.author_id = $logged_id LIMIT  $limit";
    $result = mysqli_query($connection, $query);
    $output = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }
    return $output;
}
