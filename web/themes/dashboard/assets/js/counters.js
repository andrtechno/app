var xhr_notify;
$(function () {

    setInterval(function () {
        reloadCounters();
    }, 10000); //10000

    function reloadCounters() {
        var notification_list = [];
        console.log(notification_list.length);

        if (xhr_notify !== undefined)
            xhr_notify.abort();

        xhr_notify = $.getJSON('/admin/app/default/ajax-counters', function (data) {
            $.each(data.count, function (index, value) {
                if (value > 0) {
                    $('#navbar-badge-' + index).html(value).show();
                } else {
                    $('#navbar-badge-' + index).html(value).hide();
                }
            });
            $.each(data.notify, function (id, notification) {

                notification_list[id] = $.notify({message: notification.text}, {
                    type: notification.type,
                    showProgressbar: true,
                    allow_duplicates: false,
                    timer: 1000,
                    //allow_dismiss: false,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    placement: {
                        from: "bottom",
                        align: "left"
                    },
                    onShow: function () {
                        var sound = notification.sound;
                        var soundPath;
                        if (sound) {
                            soundPath = 'http://' + window.location.hostname + '/' + sound;
                        } else {
                            soundPath = 'http://' + window.location.hostname + '/uploads/notification.mp3';
                        }
                        $.playSound(soundPath);
                    },
                    onClose: function (s) {
                        // $.getJSON('/admin/app/default/ajax-read-notification', {id: id}, function (data) {

                        //});
                        $.stopSound();
                        // delete notification_list[notifaction.id];
                        //notification_list.splice(notifaction, []);
                    }
                });

            });
        });
        //}
    }

});