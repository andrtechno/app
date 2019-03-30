var treeSelector = $('#DocumentationTree');
treeSelector.bind('move_node.jstree', function (node, parent) {
    $.ajax({
        async: false,
        type: 'GET',
        url: '/admin/documentation/default/moveNode',
        data: {
            'id': parent.node.id.replace('node_', ''),
            'ref': parent.parent.replace('node_', ''),
            'position': parent.position
        }
    });
});

treeSelector.bind('rename_node.jstree', function (node, text) {
    if (text.old !== text.text) {
        $.ajax({
            async: false,
            type: 'GET',
            url: "/admin/documentation/default/renameNode",
            dataType: 'json',
            data: {
                "id": text.node.id.replace('node_', ''),
                text: text.text
            },
            success: function (data) {
                common.notify(data.message,'success');
            }
        });
    }
});
//Need dev.
treeSelector.bind('create_node.jstree', function (node, parent, position) {


    $.ajax({
        async: false,
        type: 'GET',
        url: "/admin/documentation/default/createNode",
        dataType: 'json',
        data: {
            text: parent.node.text,
            parent_id: parent.parent.replace('node_', '')
        },
        success: function (data) {
            common.notify(data.message,'success');
        }
    });
});

treeSelector.bind("delete_node.jstree", function (node, parent) {
    $.ajax({
        async: false,
        type: 'GET',
        url: "/admin/documentation/default/delete",
        data: {
            "id": parent.node.id.replace('node_', '')
        }
    });
});

function switchNode(node) {
    $.ajax({
        async: false,
        type: 'GET',
        url: "/admin/documentation/default/switchNode",
        dataType: 'json',
        data: {
            id: node.id.replace('node_', ''),
        },
        success: function (data) {
            var icon = (data.switch) ? 'flaticon-eye' : 'flaticon-eye-close';
            common.notify(data.message,'success');
            treeSelector.jstree(true).set_icon(node, icon);
        }
    });
}




