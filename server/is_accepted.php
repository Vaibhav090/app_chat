<?php

include('../function.php');
$response = [];
$receiver_id = $_POST['id'];
$sender_id = $_SESSION['loggedInUserId'];

$update_query = "UPDATE `request` SET `is_accepted` = 1 WHERE `receiver_id` = $sender_id";
$result = mysqli_query($connection, $update_query);

$insert_query = "INSERT INTO notification (`sender_id`,`receiver_id`,`message`) VALUES ($receiver_id,$sender_id, 'Accepted Your Request')";
$result = mysqli_query($connection, $insert_query);

if ($result) {
    $response['is_success'] = true;
} else {
    $response['is_success'] = false;
}
print_r(json_encode($response));
exit;
