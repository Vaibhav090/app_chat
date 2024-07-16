<?php include('./function.php');
$url = 'http://localhost/app_chat/login.php';
$is_authenticated = isAuthenticated();
if ($is_authenticated == true) {
    redirect($url);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./partial/head.php');
    ?>
    <script src="http://localhost/app_chat/js/script.js"></script>
</head>

<body>
    <?php include('./partial/header.php');   ?>

    <main class="content">
        <div class="container p-0">

            <h1 class="h3 mb-3"></h1>

            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 border-right" style="max-height: 80vh; 
                             overflow-y: scroll;">
                        <div class="partner-list-container"><?php include('./chat_partial/chat_sidebar.php');  ?>
                        </div>

                    </div>
                    <div class="col-12 col-lg-7 col-xl-9">
                        <?php include('./chat_partial/chat_header.php'); ?>

                        <div class="position-relative" id="chat-message" style="max-height: 60vh;
                                overflow-y: scroll;">
                            <div class="chat-messages p-4">
                                <?php include('./chat_partial/chat_body.php'); ?>

                            </div>
                        </div>

                        <div id="#imageModal"></div>
                        

                        <form id="sendMessage">
                            <input type="hidden" class="receiver_id" name="receiver_id" value="<?php echo $partner_detail['id']; ?>">
                            <hr>
                            <div class="flex-grow-0  px-5 ">
                                <div class="input-group">
                                    <input type="hidden" class="message-count" value="0">
                                    <input type="text" class="form-control message" name="message" placeholder="Type your message">
                                    <button type="submit" class="btn"> <img src="./image/send.png" width="20" height="20"></img></button>
                                    <button class="btn btn- btn-lg mr-1 px-3 image-upload" id="ImageUpload"><img src="./image/img upload.png" width="20" height="20"></img></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('./partial/footer.php'); ?>
</body>

</html>