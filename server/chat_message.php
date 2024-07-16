<?php
include_once('../function.php');
$response = [];


$receiver_id = $_POST['receiver_id'];

$message = htmlspecialchars($_POST['message']);

$sender_id = $_SESSION['loggedInUserId'];

if (!empty($message)) {
    $query = "INSERT INTO messages (`receiver_id`,`sender_id`,`message`) VALUES ('$receiver_id','$sender_id','$message')";
    $result = mysqli_query($connection, $query);
} else {
}




if ($result) {
    $response['is_success'] = true;
} else {
    $response['is_success'] = false;
}
print_r(json_encode($response));
exit;
