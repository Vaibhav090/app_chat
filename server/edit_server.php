<?php

include('../function.php');

$id = $_SESSION['loggedInUserId'];

$url = 'http://localhost/app_chat/profile.php';

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


    if ($unique_name != '') {


        $query = "UPDATE users SET  image = '$unique_name' WHERE id = $id ";
        $result = mysqli_query($connection, $query);
    }



    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];


    $query = "UPDATE users SET first_name = '$fname', last_name = '$lname', email = '$email', password = '$password', phone = '$phone' , description = '$description' WHERE id = $id ";
    $result = mysqli_query($connection, $query);
}
redirect($url);
exit;
