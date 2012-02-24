<script type="text/javascript"> 
     $(document).ready(function(){    
            $(".showdesc").click(function(){
                $(this).parent().parent().next().show();
                return false;
            })
     });
</script>
 
 <? if(isset($taskList) and count($taskList)): ?>   
    <?php foreach ($taskList as $task): ?>
    <tr class="title urgency<?php echo $task->getUrgencyid() ?>">
      <td colspan="3"><a href="desc<?=$task->getId();?>" class="showdesc"><?php echo $task->getTitle() ?></a></td>
    </tr>          
    <tr  class="desc<?=$task->getId();?>" style="display:none;">
        <td colspan="3" style="padding-left: 12px; padding-bottom: 10px; padding-top:0px;">
          <?php echo $task->getContent() ?><br/>
          <?php echo $task->getUsrRelatedByAuthorid() ?>&nbsp;|&nbsp;
          <?php echo $task->getCreatedAt() ?>&nbsp;|&nbsp;
          <a href="<?php echo url_for('task/edit?id='.$task->getId()) ?>">редактировать</a>
        </td>
    </tr>
    <?php endforeach; ?>
 <? else:?>
    <tr class="title"><td colspan="3">пока пусто</td></tr>
 <? endif;?>
