<?php

include('../function.php');
$response = [];
if (isset($_POST['receiver_id'])) {
    $block_user_id = $_POST['receiver_id'];
    $block_by_id = $_SESSION['loggedInUserId'];

    $query = "SELECT * FROM block_users WHERE block_user_id = $block_user_id AND block_by_id = $block_by_id";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
    } else {
        $insert_query = "INSERT INTO block_users (block_user_id, block_by_id) VALUES ('$block_user_id', '$block_by_id')";
        $result = mysqli_query($connection, $insert_query);
    }
}
if ($result) {
    $response['is_success'] = true;
    $response['message'] = "User Blocked!";
} else {
    $response['is_success'] = false;
}

print_r(json_encode($response));
exit;
