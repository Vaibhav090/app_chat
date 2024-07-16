<?php
include('./function.php');


$count = Total_friend();


$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


$limit = 2;

$offset = ($page - 1) * $limit;

$friend_list = friendList($limit, $offset);

$num_of_pages = ceil($count / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./partial/dashboard_head.php'); ?>
</head>

<body>
    <?php include('./partial/header.php'); ?>

    <h2 style="margin-top: 1%; text-align: center;">Friends</h2>
    <div class="row" style="margin-top: 2%;">
        <div class="col-md-8 mx-auto left-side-sidebar">
            <?php foreach ($friend_list as $key => $list) { ?>
                <div class="clearfix mt-40">
                    <ul class="xsearch-items">
                        <?php if ($list['id'] != $id) { ?>
                            <div class="final-search-result">
                                <li class="search-item">
                                    <div class="search-item-img">
                                        <img src="<?php echo $image_dir_url . $list['image']; ?>" alt="user Image" width="70" height="70">
                                    </div>
                                    <div class="search-item-content" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                        <div class="d-flex" style="justify-content:flex-start">
                                            <h3 class="search-item-caption"><?php echo $list['first_name'] . ' ' . $list['last_name'];  ?></h3>
                                            <div style="justify-content:flex-end;display:flex;width:100%">
                                                <a class="btn btn-success mx-2 my-1" href="./friend_profile.php?id=<?php echo $list['id'] ?>">View Profile</a>
                                                <a class="btn btn-danger mx-2 my-1 remove_friend" data-id="<?php echo $list['id']; ?>">Remove Friend</a>
                                            </div>
                                        </div>

                                        <div class="search-item-meta mb-15">
                                            <ul class="list-inline">
                                                <li><?php echo $list['email'];  ?></li>
                                                <li><?php echo $list['phone']; ?></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <?php echo $list['description']; ?>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <ul class="pagination">
                <?php for ($i = 1; $i <= $num_of_pages; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="friend_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <?php include('./partial/footer.php'); ?>
</body>

</html>