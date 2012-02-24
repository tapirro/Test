<?php $usr = $form->getObject() ?>
<h1><?php echo $usr->isNew() ? 'New' : 'Edit' ?> Usr</h1>

<form action="<?php echo url_for('usr/update'.(!$usr->isNew() ? '?id='.$usr->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('usr/index') ?>">Cancel</a>
          <?php if (!$usr->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'usr/delete?id='.$usr->getId(), array('post' => true, 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['pass']->renderLabel() ?></th>
        <td>
          <?php echo $form['pass']->renderError() ?>
          <?php echo $form['pass'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['login']->renderLabel() ?></th>
        <td>
          <?php echo $form['login']->renderError() ?>
          <?php echo $form['login'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['upic']->renderLabel() ?></th>
        <td>
          <?php echo $form['upic']->renderError() ?>
          <?php echo $form['upic'] ?>
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
        <th><?php echo $form['balance']->renderLabel() ?></th>
        <td>
          <?php echo $form['balance']->renderError() ?>
          <?php echo $form['balance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['bot']->renderLabel() ?></th>
        <td>
          <?php echo $form['bot']->renderError() ?>
          <?php echo $form['bot'] ?>
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
        <th><?php echo $form['color']->renderLabel() ?></th>
        <td>
          <?php echo $form['color']->renderError() ?>
          <?php echo $form['color'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_birth']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_birth']->renderError() ?>
          <?php echo $form['date_birth'] ?>
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

        <?php echo $form['id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
