<?php

include('./function.php');

$id = $_GET['id'];
$friend_profile = friendProfile($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./partial/head.php');
    ?>
</head>

<body>
    <?php foreach ($friend_profile as $key => $profile) { ?>
        <form action="./server/edit_server.php" method="post" enctype="multipart/form-data">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class=" mt-5" width="200px" src="<?php echo $image_dir_url . $profile['image']; ?>" alt="Profile Image">
                            <span class="font-weight-bold"><?php echo $profile['first_name'] . ' ' . $profile['last_name']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $profile['first_name']; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $profile['last_name']; ?>" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $profile['email']; ?>" disabled>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Mobile Number</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone" value="<?php echo $profile['phone']; ?>" disabled>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Enter Description" value="<?php echo $profile['description']; ?>" disabled>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a class="btn btn-primary ml-2" href="friend_list.php">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </form>
</body>


</html>