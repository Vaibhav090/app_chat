<?php

include('./function.php');

$error = getMessage('error', true);
$errors = getMessage('errors', true);


$is_cookie_exist = false;

if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    $is_cookie_exist = true;
}
if (isset($_COOKIE['password'])) {
    $password = $_COOKIE['password'];
    $is_cookie_exist = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php
    include('./partial/head.php');
    ?>
</head>

<body>
    <form action="./server/login_server.php" method="post">
        <div class="container p-5 my-5 bg-dark text-white">
            <h2 class="mt-5">Login</h2>
            <?php if ($errors) {  ?>
                <?php foreach ($errors as $key => $value) { ?>
                    <div class="alert alert-danger"><?php echo $value ?>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if ($error) { ?>
                <div class="alert alert-danger"><?php echo $error ?>
                </div>
            <?php } ?>
            <form class="row g-3 mt-3">
                <div class="col-md-12">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" value="<?php if (isset($email)) { echo $email; } else { } ?>" id="email" name="email" placeholder="Enter Email">
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" value="<?php if (isset($password)) { echo $password; } else { } ?>" id="password" name="password" placeholder="Enter Password">
                </div>
                <div class="mb-2">
                <label><input <?php if (isset($_COOKIE['email'])) { ?> checked  <?php } ?> type="checkbox" name="remember_me" id="remember_me"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
</body>

</html>