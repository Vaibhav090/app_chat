<?php


include('../function.php');
$response = [];

$unblock_id = $_GET['id'];

$query = "DELETE FROM block_users WHERE block_user_id = $unblock_id";
$result = mysqli_query($connection, $query);

if ($result) {
    $response['is_success'] = true;
} else {
    $response['is_success'] = false;
}
print_r(json_encode($response));
exit;
