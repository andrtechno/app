<?php
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl . '/admin/tree.js', CClientScript::POS_END);
Yii::app()->tpl->openWidget(array(
    'title' => 'Каталог',
    'htmlOptions' => array('class' => 'form-horizontal')
));
?>
<div class="form-group">
    <div class="col-xs-12">
        <input class="form-control" placeholder="Поиск..." type="text" onkeyup='$("#DocumentationTree").jstree(true).search($(this).val())' />
    </div>
</div>
<div class="clearfix"></div>
<?php
Yii::app()->tpl->alert('info', Yii::t('admin', "Используйте 'drag-and-drop' для сортировки категорий."), false);
?>

<?php
$this->widget('ext.jstree.JsTree', array(
    'id' => 'DocumentationTree',
    'data' => DocumentationNode::fromArray(Documentation::model()->findAllByPk(1), array('switch' => true)),
    'options' => array(
        /*  "panix" => 'js:function (node) {
          console.log(node);
          return node.text === "Насосное оборудование" ? true : false;
          }', */
        'core' => array(
            'force_text' => true,
            'animation' => 0,
            'strings' => array('Loading ...' => 'Please wait ...'),
            'check_callback' => true,
            "themes" => array("stripes" => true, 'responsive' => true),
            "check_callback" => 'js:function (operation, node, parent, position, more) {
                    console.log(operation);
                    if(operation === "copy_node" || operation === "move_node") {

                    } else if (operation === "delete_node"){
                    
                    } else if (operation === "rename_node") {
               
              
                    }
                      return true; // allow everything else
                    }
    
    
        '),
        'plugins' => array('dnd', 'search', 'contextmenu', 'wholerow', 'state'),

        'contextmenu' => array(
            'items' => 'js:function($node) {
                var tree = $("#DocumentationTree").jstree(true);
                return {
                    "Switch": {
                        "icon":"flaticon-eye",
                        "label": "' . Yii::t('app', 'Скрыть показать') . '",
                        "action": function (obj) {
                            $node = tree.get_node($node);
                           // console.log($node);
                            switchNode($node);
                        }
                    }, 
                    "Add": {
                        "icon":"flaticon-add",
                        "label": "' . Yii::t('app', 'CREATE',0) . '",
                        "action": function (obj) {
                            $node = tree.get_node($node);
                            window.location = "/admin/documentation/default/create/parent_id/"+$node.id.replace("node_", "");
                        }
                    }, 
                    "Edit": {
                        "icon":"flaticon-edit",
                        "label": "' . Yii::t('app', 'UPDATE',0) . '",
                        "action": function (obj) {
                            $node = tree.get_node($node);
                           window.location = "/admin/documentation/default/update/id/"+$node.id.replace("node_", "");
                        }
                    },  
                    "Rename": {
                        "icon":"flaticon-edit",
                        "label": "' . Yii::t('app', 'RENAME') . '",
                        "action": function (obj) {
                            tree.edit($node);
                        }
                    },                         
                    "Remove": {
                        "icon":"flaticon-trashcan",
                        "label": "' . Yii::t('app', 'DELETE') . '",
                        "action": function (obj) { 
                            tree.delete_node($node);
                        }
                    }
                };
            }'
        )
    ),
));
?>


<?php
Yii::app()->tpl->closeWidget();



