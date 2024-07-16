<?php
include('../function.php');
$response = [];
$user_search = $_POST['search_user'];
$id = $_SESSION['loggedInUserId'];

$query = "SELECT * FROM users WHERE first_name LIKE '%$user_search%'";
$result = mysqli_query($connection, $query);
$output = [];
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}
$request = requestList();

ob_start();

include('../template/search_output.php');

$html = ob_get_clean();
if ($output) {
    $response['is_success'] = true;
    $response['html'] = $html;
    $response['users'] = $output;
} else {
    $response['is_success'] = false;
    $response['html'] = $html;
}

print_r(json_encode($response));
exit;
