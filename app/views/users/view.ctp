<h1>User: <?php echo $user['User']['first_name'].' '.$user['User']['last_name']?></h1>

<?php echo $this->Html->link('Edit', array('controller' => 'users', 'action' => 'edit', $user['User']['cid'])); ?>
