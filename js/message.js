$(document).ready(function () {
    let receiver_id = '';
    let message = '';
    let search = '';

    getPartnerList();
    getBlockUser();
    setInterval(getChathistory, 1000);

    $('.receiver_id').change(function () {
        receiver_id = $(this).val();
    });
    $('.message').change(function () {
        message = $(this).val();
    });
    $('.images').change(function () {
        image = $(this).val();
    });
    $('.search').change(function () {
        search = $(this).val();
    });
    // $('.search-user-input').change(function () {
    //     user_search = $(this).val();
    // });

    $('#sendMessage').submit(function (e) {
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/chat_message.php',
            data: $('#sendMessage').serialize(),
            success: function (data) {
                let response = $.parseJSON(data);
                console.log(response.is_success);
                if (response.is_success == true) {
                    // alert('Message Sent!');
                    $('#sendMessage').trigger('reset');
                } else {
                    alert('Something Went Wrong!');
                }
            }
        });
    });

    $('.block').on('click', function (e) {
        let block_user_id = $('.receiver_id').val();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/block_user.php',
            data: { 'receiver_id': block_user_id },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                console.log(response.is_success);
                if (response.is_success === true) {
                    alert('User Blocked!');
                    getPartnerList();
                    window.location.href = "http://localhost/app_chat/chat.php";
                } else {
                    alert('Error');
                }
            }
        });
    });

    $(document).on('click', '.block_list', function (e) {
        e.preventDefault();
        $('#blockModal').modal('show');
        getBlockUser();

    });

    $(document).on('click', '.unblock', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        jQuery.ajax({
            type: 'GET',
            url: 'http://localhost/app_chat/server/unblock_user.php',
            data: { 'id': id },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                console.log(response.is_success);
                if (response.is_success = true) {
                    alert('User Unblocked!');
                    getPartnerList();
                } else {
                    alert('Error');
                }
            }
        });
    });

    $('.image-upload').on('click', function (e) {
        e.preventDefault();
        $('#imageModal').modal('show');

    });

    $('#image_modal').on('submit', function (e) {
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/upload_image.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success == true) {
                } else {
                    alert('Error!');
                }
            }
        });
    });

    $(document).on('keypress keydown keyup', '.search', function () {
        let search = $('.search').val();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/search.php',
            data: { 'search': search },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                console.log(response.html);
                jQuery('.search-container').html(response.html);
            }

        });
    });

});




function getChathistory() {

    let partner_id = $('.receiver_id').val();
    jQuery.ajax({
        type: 'POST',
        url: 'http://localhost/app_chat/server/chat_history.php',
        data: { 'receiver_id': partner_id },
        success: function (data) {
            let response = jQuery.parseJSON(data);
            console.log(response.is_success);
            console.log(response.chat);
            console.log(response.count);
            if (response.is_success == true) {
                let message_old_count = jQuery('.message-count').val();
                jQuery('.message-count').val(response.count);
                if (message_old_count != response.count) {

                    $('#chat-message').animate({
                        scrollTop: $('#chat-message')[0].scrollHeight
                    }, 1000);


                }
                jQuery('#chat-message').html(response.html);
            }
        }
    });
}

function getBlockUser() {

    jQuery.ajax({
        type: 'GET',
        url: 'http://localhost/app_chat/server/block_user_list.php',

        success: function (data) {
            let response = jQuery.parseJSON(data);
            console.log(response.output);

            let html = '';

            jQuery.each(response.output, function (key, value) {

                html = html + '<tr><td>' + value.first_name + '</td><td>' + value.email + '</td><td>' + value.phone + '</td><td>' + value.description + '</td><td><img src="' + base_url + '/uploads/' + value.image + '" class="img-responsive img-thumbnail" width="100px" height="75px"/></td><td><a class="action btn btn-default btn-success unblock" data-id= "' + value.id + '" type="button">Unblock</a></td>';

            });
            jQuery('#blockUserlist').html(response.html);
        }
    });
}

function getPartnerList() {
    let partner_id = $('.receiver_id').val();
    jQuery.ajax({
        type: 'POST',
        url: 'http://localhost/app_chat/server/partner_list.php',
        data: { 'receiver_id': partner_id },
        success: function (data) {
            let response = jQuery.parseJSON(data);
            console.log(response.partner_list);
            console.log(response.default_id);
            console.log(response.id);
            jQuery('.receiver_id').val(response.default_id);
            jQuery('.partner-list-container').html(response.html);

        }

    });
}

function uploadImg() {
    jQuery.ajax({
        type: 'POST',
        url: 'http://localhost/app_chat/server/upload_image.php',
        data: new FormData(this),
    })
}
