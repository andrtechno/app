
$('#ForumCategoriesTree').bind('move_node.jstree', function (node, parent) {
    var xhr = $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/admin/forum/default/moveNode',
        data: {
            'id': parent.node.id.replace('node_', ''),
            'ref': parent.parent.replace('node_', ''),
            'position': parent.position
        }
    });
});

$('#ForumCategoriesTree').bind('rename_node.jstree', function (node, text) {
    if (text.old !== text.text) {
        var xhr = $.ajax({
            type: 'GET',
            url: "/admin/forum/default/renameNode",
            dataType: 'json',
            data: {
                "id": text.node.id.replace('node_', ''),
                text: text.text
            },
            success: function (data) {
                common.notify(data.message, 'success');
            },
            beforeSend: function () {
                common.addLoader();
            },
            complete: function () {
                common.removeLoader();
            }
        });
    }
});
//Need dev.replace(/-/g,'')
$('#ForumCategoriesTree').bind('create_node.jstree', function (node, parent, position) {

    var xhr = $.ajax({
        type: 'GET',
        url: "/admin/forum/default/createNode",
        dataType: 'json',
        data: {
            text: parent.node.text,
            parent_id: parent.node.parent.replace(/node_|j1_/g, "")
        },
        success: function (data) {
            common.notify(data.message, 'success');
        },
        beforeSend: function () {
            common.addLoader();
        },
        complete: function () {
            common.removeLoader();
        }
    });
});

$('#ForumCategoriesTree').bind("delete_node.jstree", function (node, parent) {
    var xhr = $.ajax({
        type: 'GET',
        dataType: 'json',
        url: "/admin/forum/default/delete",
        data: {
            "id": parent.node.id.replace('node_', '')
        }
    });
});

function categorySwitch(node) {
    var xhr = $.ajax({
        type: 'GET',
        url: "/admin/forum/default/switchNode",
        dataType: 'json',
        data: {
            id: node.id.replace('node_', ''),
        },
        success: function (data) {

            var icon = (data.switch) ? 'icon-eye' : 'icon-eye-close';
            common.notify(data.message, 'success');
            $('#ForumCategoriesTree').jstree(true).set_icon(node, icon);
        },
        beforeSend: function () {
            common.addLoader();
        },
        complete: function () {
            common.removeLoader();
        }
    });
}




