<div class="px-4 d-none d-md-block">
    <div class="d-flex align-items-center">
        <div class="flex-grow-1">
            <input type="text" class="form-control my-3 search" name="search" placeholder="Search...">
        </div>
    </div>
</div>

<div class="search-container">

    <?php $user_id = $_SESSION['loggedInUserId'];
    foreach ($userDetail as $key => $user) {
        $unread_message_count = getUnreadMessageCount($user['id']);
        $block_user = is_Block($user['id'], $user_id);

        $wcp_class = 'active';

        if ($block_user) {
            $wcp_class = 'in-active';
        }
    ?>
        <?php
        $id = $_POST['receiver_id'];
        ?>

        <a href="http://localhost/app_chat/chat.php?id=<?php echo $user['id']; ?>" class=" <?php if ($id == $user['id']) { ?>  active  <?php } ?> list-group-item list-group-item-action border-0">
            <?php if ($unread_message_count != 0) { ?>

                <div class="badge bg-success float-right">

                    <?php echo $unread_message_count; ?>
                </div>
            <?php } ?>
            <div class="d-flex align-items-start <?php $wcp_class  ?>">
                <img src="<?php echo $image_dir_url . $user['image']; ?>" class="rounded-circle mr-1" alt="image" width="40" height="40">
                <div class="flex-grow-1 ml-3" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                    <div class="small"><span class="fas fa-circle chat-online"></span> <?php echo $user['description']  ?> </div>
                </div>
            </div>
            <?php if (isset($_GET['id'])) { ?>
                <?php if ($user['id'] == $_GET['id']) { ?>
                    <hr class="active-chat">

                <?php } ?>
            <?php } ?>
        </a>
    <?php } ?>


</div>
<hr class="d-block d-lg-none mt-1 mb-0">
</div>