<h1>Usr List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Pass</th>
      <th>Login</th>
      <th>Email</th>
      <th>Upic</th>
      <th>Rank</th>
      <th>Balance</th>
      <th>Bot</th>
      <th>Hidden</th>
      <th>Color</th>
      <th>Date birth</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usrList as $usr): ?>
    <tr>
      <td><a href="<?php echo url_for('usr/edit?id='.$usr->getId()) ?>"><?php echo $usr->getId() ?></a></td>
      <td><?php echo $usr->getPass() ?></td>
      <td><?php echo $usr->getLogin() ?></td>
      <td><?php echo $usr->getEmail() ?></td>
      <td><?php echo $usr->getUpic() ?></td>
      <td><?php echo $usr->getRank() ?></td>
      <td><?php echo $usr->getBalance() ?></td>
      <td><?php echo $usr->getBot() ?></td>
      <td><?php echo $usr->getHidden() ?></td>
      <td><?php echo $usr->getColor() ?></td>
      <td><?php echo $usr->getDateBirth() ?></td>
      <td><?php echo $usr->getCreatedAt() ?></td>
      <td><?php echo $usr->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('usr/create') ?>">Create</a>
