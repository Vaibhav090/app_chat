<?php
include('../function.php');

$response = [];

$sender_id = $_SESSION['loggedInUserId'];

$receiver_id = $_POST['receiver_id'];

$update_query = "UPDATE `messages` SET `is_read` = 1 WHERE `sender_id` = '$receiver_id' AND `receiver_id` = '$sender_id'";
$result = mysqli_query($connection, $update_query);


$query = "SELECT users.id,users.first_name ,users.last_name,users.image,messages.message,messages.sender_id,messages.created_date,messages.images FROM messages INNER JOIN users ON users.id = messages.sender_id WHERE (sender_id = $sender_id AND receiver_id = $receiver_id) OR (sender_id = $receiver_id AND receiver_id = $sender_id)";
$result = mysqli_query($connection, $query);
$output = [];
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}

$count = count($output);

ob_start();

include('../template/chat_history.php');

$html = ob_get_clean();


if ($output) {
    $response['is_success'] = true;
    $response['chat'] = $output;
    $response['html'] = $html;
    $response['count'] = $count;
} else {
    $response['is_success'] = false;
}
print_r(Json_encode($response));
exit;
