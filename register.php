<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./partial/head.php')
    ?>
</head>

<body>
    

    <div class="container p-5 my-5 bg-dark text-white">
        <h2 class="mt-5">Register Yourself</h2>
        <form action="./server/user_server.php" method="post" style="margin-bottom: 20px;" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea rows="5" cols="33" name="description" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Photo</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

</body>

</html>