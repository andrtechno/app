<center>
<?php
foreach($avatars as $ava){ ?>
<?php //print_r($ava);?>
    <?php echo Html::link(Html::image("/uploads/users/avatars/" . $collection . "/" . $ava),'/uploads/users/avatars/'.$collection.'/'.$ava,array('class'=>'avatar')); ?>

<?php }
?>
</center>

<input type="hidden" id="selected_avatar" name="img" />
<script>
   $(function(){
      $('.avatar img').click(function(){
          var url = $(this).parent().attr('href');
          $('.avatar img').css({'outline':'none'});
          $(this).css({'outline':'1px solid red'});
          $('#selected_avatar').val(url);
          return false;
      });
   });
</script>