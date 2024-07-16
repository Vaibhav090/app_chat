<?php
include('../function.php');
$response = [];
$cancel_request = $_POST['cancel_id'];
$logged_id = $_SESSION['loggedInUserId'];

$query = "DELETE FROM request WHERE receiver_id = $cancel_request AND sender_id = $logged_id";
$result = mysqli_query($connection, $query);

if ($result) {
    $response['is_success'] = true;
} else {
    $response['is_success'] = false;
}
print_r(json_encode($response));
exit;
