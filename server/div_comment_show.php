<?php

$response = [];
include('../function.php');
$comment_post_id = $_POST['comment_post_id'];

$_SESSION['cid'] = $_POST['comment_post_id'];
$logged_id = $_SESSION['loggedInUserId'];

$query = "SELECT users.*, comments.status_id, comments.comment FROM users INNER JOIN comments ON users.id = comments.author_id WHERE comments.status_id = $comment_post_id";
$result = mysqli_query($connection, $query);
$output = [];
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}

ob_start();

include('../template/comment_div_show.php');

$html = ob_get_clean();

if ($output) {
    $response['is_success'] = true;
    $response['html'] = $html;
} else {
    $response['is_success'] = false;
}

print_r(json_encode($response));
exit;
