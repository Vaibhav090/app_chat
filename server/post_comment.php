<?php

include('../function.php');

$id = $_GET['id'];

$url = 'http://localhost/app_chat/partner_profile.php?id=' . $id;

$comment = $_POST['comment'];
$status_id = $_POST['status_id'];
$logged_id = $_SESSION['loggedInUserId'];


$query = "INSERT INTO comments (`comment`,`author_id`,`status_id`) VALUES ('$comment','$logged_id','$status_id')";
$result = mysqli_query($connection, $query);

redirect($url);
exit;
