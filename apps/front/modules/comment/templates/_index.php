<div class="comments">
<? if ($comments):?>
    <? foreach($comments as $comment):?>
        <? if ($class=='Usr')
            {$usr = $comment->getUsrRelatedByUserid();}
          else
            {$usr = $comment->getUsr();} ?>
         <? if($usr): ?>   
            <div class="item">
            <? echo $usr->getLink();?>&nbsp;|&nbsp;<?=$comment->getCreatedAt()?>
            <p><? echo $comment->getContent();?></p>
                <!---<a href="<?=url_for('comment/delete?id='.$comment->getId())?>">удалить комментарий</a>-->
            </div>
        <? endif; ?>
    <? endforeach?>
<? endif;?>
<div id="divToUpdate"></div>      
</div>

<form class="CommentForm" action="/comment/new">
    <textarea name="content"></textarea>
    <input type="hidden" name="recipientid" value="<?=$item->getId()?>"/>
    <input type="hidden" name="model" value="<?=$class?>"/>
    <input type="submit" value="&rarr;">
</form>