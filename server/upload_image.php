<?php

include('../function.php');
$response = [];
$sender_id = $_SESSION['loggedInUserId'];
$receiver_id = $_POST['receiver_id'];

$unique_name = false;
if (isset($_FILES['images']) && !empty($_FILES['images']['name'])) {
    $tmp = $_FILES['images']['tmp_name'];
    $name = $_FILES['images']['name'];
    $path = pathinfo($name);

    $extension = $path['extension'];
    // echo $extension;die;
    $_SESSION['extension'] = $extension;
    $file_name = $path['filename'];
    $unique_name = time() . '.' . $extension;
    $destination = '../uploads/' . $unique_name;
    $is_uploaded = move_uploaded_file($tmp, $destination);
}





$query = "INSERT INTO messages (`images`, `receiver_id`, `sender_id`) VALUES ('$unique_name', '$receiver_id' , '$sender_id')";
$result = mysqli_query($connection, $query);

if ($result) {
    $response['is_success'] = true;
} else {
    $response['is_success'] = false;
}

print_r(json_encode($response));
exit;
