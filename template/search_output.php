<?php $count = count($output);

$id = $_SESSION['loggedInUserId'];

?>

<div class="row">
    <div class="col-md-8  mx-auto  left-side-sidebar">
        <?php foreach ($output as $key => $list) { ?>
            <div class="clearfix mt-40">
                <ul class="xsearch-items">
                    <?php if ($list['id'] != $id) { ?>
                        <div class="final-search-result">
                            <li class="search-item">
                                <div class="search-item-img">
                                    <img src="<?php echo $image_dir_url . $list['image']; ?>" alt="user Image" width="70" height="70">
                                </div>
                                <div class="search-item-content">
                                    <div class="d-flex" style="justify-content:flex-start; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                        <h3 class="search-item-caption"><?php echo $list['first_name'] . ' ' . $list['last_name'];  ?></h3>
                                        <div style="justify-content:flex-end;display:flex;width:100%">
                                            <?php $is_friend = requestAccepted($list['id']); ?>
                                            <?php if ($is_friend == true) {  ?>
                                                <a type="button" class="btn"><img src="./image/correct.png" width="20" height="20"> Friends</img></a>
                                            <?php } else { ?>
                                                <?php if (!$key = array_search($list['id'], array_column($request, 'receiver_id'))) { ?>
                                                    <a type="button" class="btn btn-primary send_request" data-id="<?php echo $list['id']; ?>">Send Request</a>
                                                <?php } else { ?>
                                                    <a type="button" class="btn btn-danger cancel_request" data-id="<?php echo $list['id']; ?>">Cancel Request</a>
                                                <?php } ?>
                                            <?php } ?>
                                            <!-- <a class="btn btn-success" href="./partner_profile.php?id=<?php echo $list['id']; ?>">View Profile</a> -->
                                        </div>
                                    </div>

                                    <div class="search-item-meta mb-15">
                                        <ul class="list-inline">
                                            <li><?php echo $list['email'];  ?></li>
                                            <li><?php echo $list['phone']; ?></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <?php echo $list['description'];   ?>
                                    </div>
                                </div>
                            </li>
                        </div>
                    <?php } else { ?>
                    <?php } ?>
                </ul>
            <?php } ?>
            </div>
    </div>

</div>

</html>