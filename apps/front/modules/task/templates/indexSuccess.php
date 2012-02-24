<?php use_helper('Date') ?>
<script type="text/javascript">  
         $(document).ready(function(){    
            $(".showdesc").click(function(){
                $(this).parent().parent().next().toggle();
                return false;
            })
            
            $(".tabs a").click(function(){
                $("#target" +  $(this).attr('uid')).load("/task/smallindex?userid=" +  $(this).attr('uid') + "&stat=" + $(this).attr('href'));
                $(".tabs a[uid='" + $(this).attr('uid') +"']").removeClass("act");
                $(this).addClass("act");
                return false;
            })
            
            
            
         });
</script>

  <?php include_component('navigation', 'index') ?> 

<?php   
    $c =  new Criteria();
  
    $c2 = $c->getNewCriterion(TaskPeer::STATID, 1);
    $c2->addOr($c->getNewCriterion(TaskPeer::STATID, 2));
    $c->add($c2);
    
    ?>
    


<?php foreach ($usrList as $usr):?>
<table class="task" <?php echo ($spectator->getId() == $usr->getId())? 'id="me"' : '';?>>
  <thead>    
    <tr>
        <th width="50"><?php echo ($usr->getUpic()) ? '<img src="/uploads/picture/'.$usr->getSyspic()->getFilename().'" width="48" height="48" />' : "" ?></th>   
        <th colspan="2"><h1><?php echo $usr->getLogin();?></h1></th>
    </tr>     
    <tr>
        <th colspan="3" style="text-align:right; padding-bottom: 20px;">
            <form action="/task/update" method="post" >
                <input  type="hidden" name="task[userid]" id="task_userid" value="<?php echo $usr->getId()?>">
                <input type="hidden" name="task[authorid]" id="task_authorid" value="<?php echo $spectator->getId();?>">
               <!-- <select style="width:18%; margin-bottom: 4px;" name="task[project]" id="task_project" /> 
                    <option id="taskanaIco" value="1">taskana</option>
                    <option id="tabootaskIco">tabootask</option>
                    <option id="sobagaIco">sobaga</option>
                </select> -->
                <input style="width:99%; margin-bottom: 4px;" type="text" name="task[title]" id="task_title" />
                
                <textarea  style="width:99%; margin-bottom: 4px;  margin-top: 0px;" rows="2" cols="30" name="task[content]" id="task_content"></textarea>
                <select name="task[urgencyid]" id="task_urgencyid">
                    <option value="1">нормальная</option>               
                    <option value="2">незначительная</option>
                    <option value="3">критическая</option>
                </select>&nbsp;<input type="submit" value="добавить" />    
                <input type="hidden" name="task[id]" id="task_id" />    
                <input type="hidden"name="task[statid]" id="task_statid" value="1" />   
            </form>
        </th>
    </tr>
    <tr>
    <td colspan="3" class="tabs">
        <a uid="<?php echo $usr->getId()?>" href="peer" class="act">очередь</a>
        <a uid="<?php echo $usr->getId()?>" href="testing">тестирование<?php if($usr->countTestingTasks() > 0):?> (<?php echo $usr->countTestingTasks()?>)<?php endif;?></a>
        <a uid="<?php echo $usr->getId()?>" href="ready">оконченные</a></td>
    </tr>
  </thead>
  <tbody id="target<?php echo $usr->getId();?>">
    <?php foreach ($usr->getTasksRelatedByUserid($c) as $task): ?>
    <tr class="title urgency<?php echo $task->getUrgencyid() ?> stat<?php echo $task->getStatid()?>">
      <td colspan="3"><a href="desc<?php echo $task->getId();?>" class="showdesc"><?php echo $task->getTitle() ?></a></td>
    </tr>          
    <tr  class="desc<?php echo $task->getId();?>" style="display:none;">
        <td colspan="3" style="padding-left: 12px; padding-bottom: 10px; padding-top:0px;">
          <?php if(strlen($task->getContent())>2):?>
          	<?php echo $task->getContent() ?><br/>
          <?php endif;?>
          <span class="grey"><?php echo $task->getUsrRelatedByAuthorid() ?>&nbsp;&nbsp;<?php 
          echo format_datetime($task->getCreatedAt(), 'd MMM HH:mm', 'ru_RU'); ?>&nbsp;&nbsp;<?php 
          if ($spectator->getId() == $usr->getId()):?>
             <?php echo ($task->getStatid()==2)? '<a href="/task/setstat/?stat=1&id='.$task->getId().'"><b>&nbsp;■&nbsp;</b></a>': '<a href="/task/setstat/?stat=2&id='.$task->getId().'"><b>►</b>
             </a>'; ?>&nbsp;&nbsp;<?php echo link_to('&nbsp;√&nbsp;', 'task/setstat?stat=3&id='.$task->getId(), array('post' => true, 'confirm' => 'Точно готово?')) ?>&nbsp;
          <?php endif;?>
          <a href="<?php echo url_for('task/edit?id='.$task->getId()) ?>">&nbsp;…&nbsp;</a>
          </span>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php $i++; if(floor($i/3) == $i/3) {echo '<div style="width:100%;float:left; height=1px;">&nbsp;</div>';} ?>    
<?php endforeach;?>

<!-- <a href="<?php echo url_for('task/create') ?>">Create</a>
-->