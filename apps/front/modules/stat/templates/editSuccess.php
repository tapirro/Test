<?php $stat = $form->getObject() ?>
<h1><?php echo $stat->isNew() ? 'New' : 'Edit' ?> Stat</h1>

<form action="<?php echo url_for('stat/update'.(!$stat->isNew() ? '?id='.$stat->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('stat/index') ?>">Cancel</a>
          <?php if (!$stat->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'stat/delete?id='.$stat->getId(), array('post' => true, 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>

        <?php echo $form['id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
