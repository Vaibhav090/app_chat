<?php
include('../function.php');

$url = 'http://localhost/app_chat/status.php';

$img_name = false;
if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {

    $tmp = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $path = pathinfo($name);

    $extension = $path['extension'];
    $file_name = $path['filename'];
    $img_name = time() . '.' . $extension;
    $destination = '../uploads/' . $img_name;
    $is_uploaded = move_uploaded_file($tmp, $destination);
    if (!$is_uploaded) {
        $error[] = 'something went wrong while image uploading. please try again!';
    }
}

$title = $_POST['title'];
$desc = $_POST['description'];
$image = $img_name;
$id = $_SESSION['loggedInUserId'];


$query = "INSERT INTO `status` (`title`,`user_id`,`image`,`description`) VALUES ('$title','$id','$image','$desc')";
$result = mysqli_query($connection, $query);

if ($result) {
    setMessage('success', "Status Added!");
}
redirect($url);
exit;
