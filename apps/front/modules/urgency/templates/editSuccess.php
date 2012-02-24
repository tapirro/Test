<?php $urgency = $form->getObject() ?>
<h1><?php echo $urgency->isNew() ? 'New' : 'Edit' ?> Urgency</h1>

<form action="<?php echo url_for('urgency/update'.(!$urgency->isNew() ? '?id='.$urgency->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('urgency/index') ?>">Cancel</a>
          <?php if (!$urgency->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'urgency/delete?id='.$urgency->getId(), array('post' => true, 'confirm' => 'Are you sure?')) ?>
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
