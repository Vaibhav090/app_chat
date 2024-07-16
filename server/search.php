<?php

include('../function.php');
$response = [];
$search = $_POST['search'];
$id = $_SESSION['loggedInUserId'];
$query = "SELECT users.*, request.receiver_id, request.is_accepted FROM users INNER JOIN request ON users.id = request.sender_id WHERE users.first_name LIKE '%$search%' AND request.receiver_id = $id AND request.is_accepted = 1";
$result = mysqli_query($connection, $query);
$userDetail  = [];
while ($row = mysqli_fetch_assoc($result)) {
    $userDetail[] = $row;
}
ob_start();

include('../template/template_search_sidebar.php');

$html = ob_get_clean();

// if ($userDetail) {
//     $response['is_success'] = true;
//     $response['friend_list'] = $userDetail;
//     $response['html'] = $html;
// } else {
//     $response['is_success'] = false;
// }
$response['is_success'] = true;
$response['friend_list'] = $userDetail;
$response['html'] = $html;
print_r(json_encode($response));
exit;
