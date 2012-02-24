<h1>Stat List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($statList as $stat): ?>
    <tr>
      <td><a href="<?php echo url_for('stat/edit?id='.$stat->getId()) ?>"><?php echo $stat->getId() ?></a></td>
      <td><?php echo $stat->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('stat/create') ?>">Create</a>
