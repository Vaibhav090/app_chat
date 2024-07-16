<?php

include('./function.php');

$success = getMessage('success', true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./partial/head.php')
    ?>
</head>

<body>
    <?php
    include('./partial/header.php');
    ?>

    <div class="container p-5 my-5 bg-dark text-white">
        <h2 class="mt-5">Add status</h2>
        <?php if ($success) { ?>
            <div class="alert alert-success"><?php echo $success ?></div>
        <?php } ?>
        <form action="./server/status_server.php" method="post" style="margin-bottom: 20px;" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">  Description</label>
                <textarea rows="3" class="form-control" cols="33" name="description" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <?php
    include('./partial/footer.php');
    ?>
</body>

</html>