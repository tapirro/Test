<?php $task = $form->getObject() ?>
<h1><?php echo $task->isNew() ? 'New' : 'Edit' ?> Task</h1>

<form action="<?php echo url_for('task/update'.(!$task->isNew() ? '?id='.$task->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('task/index') ?>">Cancel</a>
          <?php if (!$task->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'task/delete?id='.$task->getId(), array('post' => true, 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['userid']->renderLabel() ?></th>
        <td>
          <?php echo $form['userid']->renderError() ?>
          <?php echo $form['userid'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['authorid']->renderLabel() ?></th>
        <td>
          <?php echo $form['authorid']->renderError() ?>
          <?php echo $form['authorid'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['content']->renderLabel() ?></th>
        <td>
          <?php echo $form['content']->renderError() ?>
          <?php echo $form['content'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rank']->renderLabel() ?></th>
        <td>
          <?php echo $form['rank']->renderError() ?>
          <?php echo $form['rank'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hidden']->renderLabel() ?></th>
        <td>
          <?php echo $form['hidden']->renderError() ?>
          <?php echo $form['hidden'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['statid']->renderLabel() ?></th>
        <td>
          <?php echo $form['statid']->renderError() ?>
          <?php echo $form['statid'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['urgencyid']->renderLabel() ?></th>
        <td>
          <?php echo $form['urgencyid']->renderError() ?>
          <?php echo $form['urgencyid'] ?>

        <?php echo $form['id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
