$(document).ready(function () {

    $('.search-user-input').on('keypress keydown keyup', function () {
        let partner_id = $('.receiver_id').val();
        let search_user = $(this).val();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/search_user.php',
            data: { 'search_user': search_user, 'receiver_id': partner_id },
            success: function (data) {
                let response = jQuery.parseJSON(data);

                jQuery('.search-result').html(response.html);
            }
        });
    });

    $(document).on('click', '.send_request', function (e) {
        let id = $(this).data('id');
        $(this).removeClass('btn-primary');
        $(this).removeClass('send_request');
        $(this).addClass('btn-danger');
        $(this).text('Cancel Request');
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/send_request.php',
            data: { 'id': id },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success == true) {
                    $(this).text('Cancel Request');
                } else {
                    alert('error');
                }
            }
        });
    });
    $(document).on('click', '.cancel_request', function (e) {
        e.preventDefault();
        $(this).removeClass('btn-danger');
        $(this).removeClass('cancel_request');
        $(this).addClass('btn-primary');
        $(this).addClass('send_request');
        $(this).text('Send Request');
        let id = $(this).data('id');
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/cancel_request.php',
            data: { 'cancel_id': id },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success == true) {
                    $(this).text('Send Request');
                    $(this).addClass('send_request');
                } else {
                    alert('error');
                }
            }
        });
    });
    $(document).on('click', '.remove_friend', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/remove_friend.php',
            data: { 'remove_id': id },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success == true) {
                    alert('Friend Removed');
                    window.location.reload();
                } else {
                    alert('error');
                }
            }
        });
    });

    $(document).on('click', '.comments', function (e) {
        let status_id = $(this).data('id');
        e.preventDefault();
        $('#commentModal').modal('show');
        comment_list(status_id);
    });

    $(document).on('click', '.show_comments', function (e) {
        let id = $(this).data('id');
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/div_comment_show.php',
            data: { 'comment_post_id': id },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success){
                $('.cshow').html(response.html);
                }
                if ($('#Commentshow').css('display') == 'none') {
                    $('#Commentshow').css('display', 'block');
                } else {
                    $('#Commentshow').css('display', 'none');
                }

            }
        });
    });

});


function comment_list(status_id) {

    jQuery.ajax({
        type: 'POST',
        url: 'http://localhost/app_chat/server/comment_list.php',
        data: { 'status_id': status_id },
        success: function (data) {
            let response = jQuery.parseJSON(data);

            let html = '';

            jQuery.each(response.output, function (key, value) {

                html += '<li class=" border-bottom my-2" style="list-style: none;"><img src="' + base_url + '/uploads/' + value.image + '" class="round img-responsive img-thumbnail" width="50px" height="50px"><strong> ' + value.first_name + ' </strong> ' + value.comment + '</li>';
            });
            html = '<ul style="padding-left:5px;" >' + html + '</ul>';
            jQuery('#commentList').html(html);
        }
    });
}
