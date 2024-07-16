<?php
$response = [];
include('../function.php');

if (isset($_POST['id'])) {
    $receiver_id = $_POST['id'];
    $sender_id = $_SESSION['loggedInUserId'];

    $check_query = "SELECT * FROM request WHERE sender_id = $sender_id AND receiver_id =  $receiver_id";
    $result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($result) > 0) {
    } else {
        $insert_query = "INSERT INTO request (`sender_id`, `receiver_id`) VALUES ('$sender_id', '$receiver_id')";
        $result = mysqli_query($connection, $insert_query);
    }
}
if ($result) {
    $response['is_success'] = true;
} else {
    $response['is_success'] = false;
}

print_r(json_encode($response));
exit;
