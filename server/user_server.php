<?php

include('../function.php');

$url = 'http://localhost/app_chat/redirect_login.php';
$required_fields = ['first_name', 'last_name', 'email', 'password', 'phone', 'description'];

$validate = validate($_POST, $required_fields);

if ($validate) {
    $unique_name = false;
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {

        $tmp = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $path = pathinfo($name);

        $extension = $path['extension'];
        $file_name = $path['filename'];
        $unique_name = time() . '.' . $extension;
        $destination = '../uploads/' . $unique_name;
        $is_uploaded = move_uploaded_file($tmp, $destination);
        if (!$is_uploaded) {
            $error[] = 'something went wrong while image uploading. please try again!';
        }
    }

    $cover_img = false;
    if (isset($_FILES['cover_image']) && !empty($_FILES['cover_image']['name'])) {

        $tmp = $_FILES['cover_image']['tmp_name'];
        $name = $_FILES['cover_image']['name'];
        $path = pathinfo($name);

        $extension = $path['extension'];
        $file_name = $path['filename'];
        $cover_img = 'cover' . '.' . $extension;
        $destination = '../uploads/' . $cover_img;
        $is_uploaded = move_uploaded_file($tmp, $destination);
        if (!$is_uploaded) {
            $error[] = 'something went wrong while image uploading. please try again!';
        }
    }
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $image = $unique_name;
    $cover_image = $cover_img;

    $query = "INSERT INTO users (`first_name`,`last_name`,`email`,`password`,`phone`,`description`,`image`,`cover_image`) VALUES ('$fname','$lname','$email','$pass','$phone','$description','$image','$cover_image')";
    $result = mysqli_query($connection, $query);
}
redirect($url);
exit;
