<h1>Urgency List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($urgencyList as $urgency): ?>
    <tr>
      <td><a href="<?php echo url_for('urgency/edit?id='.$urgency->getId()) ?>"><?php echo $urgency->getId() ?></a></td>
      <td><?php echo $urgency->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('urgency/create') ?>">Create</a>
