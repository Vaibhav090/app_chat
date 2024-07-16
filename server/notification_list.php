<?php
include('../function.php');
$response = [];
$id = $_SESSION['loggedInUserId'];

$query = "SELECT notification.message,notification.created_date , users.image,users.first_name FROM `users` INNER JOIN `notification` ON notification.receiver_id = users.id AND notification.sender_id = $id";
$result = mysqli_query($connection, $query);
$output = [];
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}

$update_query = "UPDATE notification SET is_read = 1 WHERE sender_id = $id";
$result = mysqli_query($connection,$update_query);

if ($output) {
    $response['is_success'] = true;
    $response['message'] = $output;
} else {
    $response['is_success'] = false;
}
print_r(json_encode($response));
exit;
