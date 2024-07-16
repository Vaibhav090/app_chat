<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$user_id = $_SESSION['loggedInUserId'];
$is_block = is_Block($id, $user_id);

$partner_detail = getPartnerDetail($id);
?>

<div class="py-2 px-4 border-bottom d-none d-lg-block">
    <div class="d-flex align-items-center py-1">
        <div class="position-relative">
            <img src="<?php echo $image_dir_url . $partner_detail['image']  ?>" class="rounded-circle mr-1" alt="user" width="40" height="40">
        </div>
        <div class="flex-grow-1 pl-3" style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
            <strong><?php echo $partner_detail['first_name'] . ' ' . $partner_detail['last_name'];  ?></strong>
            <div class="text-muted small"><em><?php echo $partner_detail['description'];  ?></em></div>
        </div>
        <div>
            <?php if ($_SESSION['loggedInUserId'] != $id) { ?>
                <a class="btn btn-success" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" href="./partner_profile.php?id=<?php echo $id ?>">View Profile</a>
            <?php } ?>
            <?php if ($partner_detail['id'] == $user_id) { ?>

            <?php  } else { ?>
                <a class="btn btn-danger block" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Block</a>
            <?php } ?>
        </div>
    </div>
</div>