<div class="panel panel-default">
    <div class="panel-heading"><?php echo $block['name'] ?></div>
    <div class="panel-body">
        <?php
        if ($block['widget']) {
            $this->widget($block['widget']);
        } else {
            echo $block['content'];
        }
        ?>
    </div>
</div>