<?php

include('../function.php');
$response = [];
$remove_friend = $_POST['remove_id'];
$id = $_SESSION['loggedInUserId'];

$query = "DELETE FROM request WHERE receiver_id = $remove_friend AND sender_id = $id AND is_accepted = 1";
$result = mysqli_query($connection, $query);

if ($result) {
    $response['is_success'] = true;
} else {
    $response['is_success'] = false;
}

print_r(json_encode($response));
exit;
