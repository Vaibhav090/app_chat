<?php
include('./function.php');

$id = $_GET['id'];

$detail = getUserdetail($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./partial/head.php');
    ?>
</head>

<body>
    <?php foreach ($detail as $key => $profile) { ?>
        <form action="./server/edit_server.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $image_dir_url . $profile['image'];  ?>"><span class="font-weight-bold"><?php echo $profile['first_name'] . ' ' . $profile['last_name'] ?></span><span class="text-black-50"></span><span> </span></div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="first name" value="<?php echo $profile['first_name'] ?>">
                                </div>
                                <div class="col-md-6"><label class="labels">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="<?php echo $profile['last_name'] ?>" placeholder="surname">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="enter phone number" value="<?php echo $profile['email'] ?>">
                                </div>
                                <div class="col-md-12"><label class="labels">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="enter address line 1" value="<?php echo $profile['password'] ?>">
                                </div>
                                <div class="col-md-12"><label class="labels">Mobile Number</label>
                                    <input type="text" class="form-control" name="phone" placeholder="enter address line 2" value="<?php echo $profile['phone'] ?>">
                                </div>
                                <div class="col-md-12"><label class="labels">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="enter address line 2" value="<?php echo $profile['description'] ?>">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        <?php } ?>

                        </div>

                    </div>
                </div>
            </div>
        </form>

</body>

</html>