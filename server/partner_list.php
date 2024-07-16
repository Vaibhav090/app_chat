<?php
include('../function.php');
$receiver_id = $_POST['receiver_id'];
$response = [];

$logged_id = $_SESSION['loggedInUserId'];

// $query = "SELECT * FROM users WHERE id NOT IN (SELECT block_user_id from block_users WHERE block_by_id = $logged_id)";
$query = "SELECT users.*, request.receiver_id, request.sender_id, request.is_accepted FROM users INNER JOIN request ON request.sender_id = $logged_id WHERE request.receiver_id = users.id AND request.is_accepted = 1";
$result = mysqli_query($connection, $query);
$output = [];
while ($row = mysqli_fetch_assoc($result)) {
    $userDetail[] = $row;
}
$partner_id = $_POST['receiver_id'] ?? $userDetail[0]['id'];

ob_start();

include('../template/template_sidebar.php');

$html = ob_get_clean();

if ($userDetail) {
    $response['is_success'] = true;
    $response['partner_list'] = $userDetail;
    $response['html'] = $html;
    $response['id'] = $receiver_id;
    $response['default_id'] = $partner_id;
} else {
    $response['is_success'] = false;
}

print_r(json_encode($response));
exit;
