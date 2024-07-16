<?php

include('../function.php');
$response = [];
$id = $_SESSION['loggedInUserId'];
$query = "SELECT users.id, users.first_name, users.last_name, users.image, request.is_accepted FROM users INNER JOIN request ON request.sender_id = users.id WHERE request.is_accepted = 0 AND request.receiver_id = $id";
$result = mysqli_query($connection, $query);
$output = [];
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}

ob_start();

include('../template/template_request.php');

$html = ob_get_clean();
if ($output) {
    $response['is_success'] = true;
    $response['request'] = $output;
    $response['html'] = $html;
} else {
    $response['is_success'] = false;
    $response['html'] = $html;
}
print_r(json_encode($response));
exit;
