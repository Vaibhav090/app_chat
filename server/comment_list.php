<?php

include('../function.php');
$response = [];
$status_id = $_POST['status_id'];
$logged_id = $_SESSION['loggedInUserId'];


$query = "SELECT users.*, comments.status_id, comments.author_id, comments.comment FROM users INNER JOIN comments ON users.id = comments.author_id WHERE comments.status_id = $status_id AND comments.author_id = $logged_id";
$result = mysqli_query($connection, $query);
$output = [];
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}

if ($output) {
    $response['is_success'] = true;
    $response['output'] = $output;
} else {
    $response['is_success'] = false;
}
print_r(json_encode($response));
exit;
