var xhr_notify;
$(function () {

    setInterval(function () {
        reloadCounters();
    }, 10000); //10000

    function reloadCounters() {
        var notification_list, sound_list = [];

        // console.log(notification_list.length);

        if (xhr_notify !== undefined)
            xhr_notify.abort();

        xhr_notify = $.getJSON('/admin/app/default/ajax-counters', function (data) {



            $('#dropdown-notification-container').html(data.content);

            $.each(data.count, function (index, value) {
                if (value > 0) {
                    $('.navbar-badge-' + index).html(value);
                } else {
                    $('.navbar-badge-' + index).html(value);
                }
            });
            if (data.notify) {
                $.each(data.notify, function (id, notification) {
                    var sound = notification.sound;
                    if (notification.status === 0) {
                        var notify = $.notify({message: notification.text}, {
                            type: notification.type,
                            showProgressbar: true,
                            allow_duplicates: false,
                            timer: 6000, // 1 min
                            allow_dismiss: false,
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            },
                            placement: {
                                from: "bottom",
                                align: "left"
                            },
                            onShow: function () {
                                $.playSound('http://' + window.location.hostname + ((sound) ? sound : '/uploads/notification.mp3'));
                                $.getJSON('/admin/app/default/ajax-notification-status', {
                                    id: id,
                                    status: 2
                                }, function (data) {
                                   // delete notification_list[id];
                                   // notify.close();
                                });
                            },
                            onClose: function () {
                                $.stopSound();
                               // delete notification_list[id];
                            }
                        });
                    }
                });
            }
        });
    }

});