$(document).ready(function () {

    $('.request-show').on('click', function (e) {
        e.preventDefault();
        $('#requestModal').modal('show');
        request_List();

    });
    $('.notification').on('click', function (e) {
        e.preventDefault();
        $('#notificationModal').modal('show');
        notification_List();
    });

    $(document).on('click', '.accept', function (e) {
        let id = $(this).data('id')
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/is_accepted.php',
            data: { 'id': id },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success == true) {
                    alert('Request Accepted');
                } else {
                    alert('error');
                }
            }
        });
    });

    $(document).on('click', '.reject', function (e) {
        let id = $(this).data('id')
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/app_chat/server/is_rejected.php',
            data: { 'id': id },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success == true) {
                    alert('Request Rejected');
                } else {
                    alert('error');
                }
            }
        });
    });

});

function request_List() {
    jQuery.ajax({
        type: 'GET',
        url: 'http://localhost/app_chat/server/request_list.php',
        success: function (data) {
            let response = jQuery.parseJSON(data);

            let html = '';

            jQuery.each(response.request, function (key, value) {

                html = html + '<tr><td>' + value.first_name + ' ' + value.last_name + '</td><td><img src="' + base_url + '/uploads/' + value.image + '" class="img-responsive img-thumbnail" width="100px" height="75px"/></td><td><a class="action btn btn-default btn-success accept" data-id= "' + value.id + '" type="button">Accept</a>' + '  ' + '<a class="action btn btn-default btn-danger reject" data-id= "' + value.id + '" type="button">Reject</a></td>';

            });
            jQuery('#requestlist').html(response.html);
        }
    });
}
function notification_List() {
    jQuery.ajax({
        type: 'GET',
        url: 'http://localhost/app_chat/server/notification_list.php',
        success: function (data) {
            let response = jQuery.parseJSON(data);
            console.log(response.message);

            let html = '';

            jQuery.each(response.message, function (key, value) {

                html += '<li class="border-bottom my-2" style="list-style: none;" ><img src="' + base_url + '/uploads/' + value.image + '" class="round img-responsive img-thumbnail" width="50px" height="50px"><strong> ' + value.first_name + ' </strong> ' + value.message + '</li>';
            });
            html = '<ul style="padding-left:5px;" >' + html + '</ul>';
            jQuery('#notificationlist').html(html);
        }
    });
}
