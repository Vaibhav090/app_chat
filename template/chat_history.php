<?php




$chat_arr = [];

foreach ($output as $message) {

    $created_date = date('Y-m-d', strtotime($message['created_date']));
    $chat_arr[$created_date][] = $message;
}

?>
<?php
foreach ($chat_arr as $date => $chat) { ?>
    <p style="text-align:center;color:black; padding:10px">
        <em><?php echo date('d F Y', strtotime($date)); ?></em>
    </p>

    <?php foreach ($chat as $key => $sub_chat) {

    ?>
        <?php if ($sub_chat['sender_id'] == $_SESSION['loggedInUserId']) { ?>

            <div class="chat-message-right mb-4" style="font-family:serif">
                <div>
                    <img src="<?php echo $image_dir_url . $sub_chat['image'] ?>" class="rounded-circle mr-1" alt="User Image" width="40" height="40">
                    <div class="text-muted small text-nowrap mt-2">
                        <?php echo date('H:i', strtotime($sub_chat['created_date'])); ?></div>
                </div>
                <div class="flex-shrink-1 rounded py-2 px-3 mr-3" style="background-color:#CCCCCC; height: 45px;">
                    <!-- <div class="font-weight-bold mb-1"><?php echo $sub_chat['first_name']; ?></div> -->
                    <?php
                    if (isset($sub_chat['images'])) {
                        $path_info = pathinfo($sub_chat['images']);
                        $extension = $path_info['extension'];

                        if (in_array($extension, ['png', 'jpeg', 'jpg', 'gif'])) { ?>
                            <img src="<?php echo $image_dir_url .  $sub_chat['images']; ?>" height="35px" width="60px">
                        <?php } else { ?>
                            <a target="__blank" href="<?php echo $image_dir_url .  $sub_chat['images']; ?>"><?php echo basename($image_dir_url) . ' ' . 'Download file'; ?></a>
                        <?php } ?>
                    <?php } else { ?>
                        <?php echo $sub_chat['message']; ?>
                    <?php  } ?>
                </div>
            </div>
        <?php } else { ?>

            <div class="chat-message-left pb-4" style="font-family:serif">
                <div>
                    <img src="<?php echo $image_dir_url . $sub_chat['image'] ?>" class="rounded-circle mr-1" alt="User Image" width="40" height="40">
                    <div class="text-muted small text-nowrap mt-2">
                        <?php echo date('H:i', strtotime($sub_chat['created_date'])); ?></div>
                </div>
                <div class="flex-shrink-1  rounded py-2 px-3 mr-3" style="background-color:#CCCCCC; height: 45px;">
                    <!-- <div class="font-weight-bold mb-1"><?php echo $sub_chat['first_name']; ?></div> -->
                    <?php
                    if (isset($sub_chat['images'])) {
                        $path_info = pathinfo($sub_chat['images']);
                        $extension = $path_info['extension'];

                        if (in_array($extension, ['png', 'jpeg', 'jpg', 'gif'])) { ?>
                            <img src="<?php echo $image_dir_url .  $sub_chat['images']; ?>" height="35px" width="60px">
                        <?php } else { ?>
                            <a target="__blank" href="<?php echo $image_dir_url .  $sub_chat['images']; ?>"><?php echo basename($image_dir_url) . ' ' . 'Download file'; ?></a>
                        <?php } ?>
                    <?php } else { ?>
                        <?php echo $sub_chat['message']; ?>
                    <?php  } ?>
                </div>
            </div>
        <?php } ?>
<?php }
} ?>