<?php foreach ($output as $key => $comments) { ?>
    <div id="Commentshow" class="media m-b-20 commentShow">
        <a class="media-left" href="#">
            <img class="media-object img-radius m-r-20" src="<?php echo $image_dir_url . $comments['image'] ?>" alt="Generic placeholder image">
        </a>
        <div class="media-body b-b-muted social-client-description">
            <div class="chat-header"><?php echo $comments['first_name'] . ' ' . $comments['last_name']  ?><span class="text-muted"><?php echo date('M d-y', strtotime($comments['created_date']))  ?></span></div>
            <p class="text-muted"><?php echo $comments['comment']  ?></p>
        </div>
    </div>
<?php } ?>
<?php if (count($output) > 2) { ?>
    <p class="btn btn-primary comments" data-id="<?php echo $comment_post_id ?>">Read More</p>
<?php } ?>