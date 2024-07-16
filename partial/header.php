<style>
    .navbar {
        background-color: #007bff;
    }

    .navbar-brand {
        color: #fff;
    }

    .navbar-toggler-icon {
        color: #fff;
    }

    .navbar-nav .nav-link {
        color: #fff;
    }

    .dropdown-item {
        color: #fff;
    }

    .dropdown-item:hover {
        background-color: #0056b3;
    }
</style>
<?php


$id =  $_SESSION['loggedInUserId'];
$user = getUserdetail($id);

?>
<nav class="navbar navbar-expand-lg bg-primary border-bottom border-body">
    <div class="container-fluid">
        <a class="navbar-brand" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" href="./chat.php">Chat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-success mx-2 my-1" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" href="./dashboard.php">Add Friend</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success mx-2 my-1" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" href="./friend_list.php">Friend List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success mx-2 my-1" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" href="./status.php">Add Status</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php foreach ($user as $key => $value) { ?>
                        <a class="btn btn-primary mx-2 my-1" style="font-family:serif"><?php echo $value['first_name'] . ' ' . $value['last_name']; ?></a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary request-show mx-2 my-1">
                        <img src="./image/add-friend.png" width="25" height="25" alt="Bell Icon">
                        <?php $request = request_count(); ?>
                        <?php if ($request != 0) { ?>
                            <div class="badge bg-success">
                                <?php echo $request; ?>
                            </div>
                        <?php } ?>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary notification mx-2 my-1">
                        <img src="./image/bel.png" width="25" height="25" alt="Bell Icon">
                        <?php $notification = notification_count(); ?>
                        <?php if ($notification != 0) { ?>
                            <div class="badge bg-success">
                                <?php echo $notification; ?>
                            </div>
                        <?php } ?>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger block_list mx-2 my-1" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" href="./server/block_user_list.php">View Blocked User</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success mx-2 my-1" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" href="./profile.php">View Profile</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger mx-2 my-1" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


