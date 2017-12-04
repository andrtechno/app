<script>
$(function(){


    // Enables popover #2
    $(".popinfo").popover({
        html : true, 
        content: function() {
          return $('.popinfo-box').html();
        }
    });
    
        // Enables popover #2
    $(".tester").popover({
        html : true, 
        content: function() {
          return $("#example-popover-2-content").html();
        },
        title: function() {
          return $("#example-popover-2-title").html();
        }
    });
});
</script>
    <?php

$this->widget('ext.adminList.GridView', array(
    'dataProvider' => $model->search(),
    'enableHeader'=>true,
    'name'=>$this->pageName,
    'filter' => $model
));

?>
<a
   tabindex="0"
   class="btn btn-lg btn-info tester" 
   role="button" 
   data-trigger="focus">Example popover #2</a>

<div id="example-popover-2-content" class="hidden">
    <b>Example popover #2</b> - content
</div>