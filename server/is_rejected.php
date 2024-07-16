<?php
include('../function.php');
$receiver_id = $_POST['id'];
$sender_id = $_SESSION['loggedInUserId'];
$response = [];

$update_query = "UPDATE `request` SET `is_accepted` = 2 WHERE `receiver_id` = '$receiver_id'";
$result = mysqli_query($connection, $update_query);

$insert_query = "INSERT INTO notification (`sender_id`,`receiver_id`,`message`) VALUES ($receiver_id,$sender_id, 'Rejected Your Request')";
$result = mysqli_query($connection, $insert_query);

if ($result) {
    $response['is_success'] = true;
} else {
    $response['is_success'] = false;
}
print_r(json_encode($response));
exit;
