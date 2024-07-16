<?php

include('../function.php');
$response = [];
$id = $_SESSION['loggedInUserId'];
$query = "SELECT users.*, block_users.block_user_id, block_users.block_by_id FROM users INNER JOIN block_users ON block_users.block_user_id = users.id WHERE block_by_id = $id";
$result = mysqli_query($connection, $query);
$output = [];
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}
ob_start();

include('../template/template_block.php');

$html = ob_get_clean();

if ($output) {
    $response['is_success'] = true;
    $response['output'] = $output;
    $response['html'] = $html;
} else {
    $response['is_success'] = false;
    $response['html'] = $html;
}

print_r(json_encode($response));
exit;
