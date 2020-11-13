<?php
echo "<h1>" . $title . "</h1><br>";
echo $this->Html->link('New User', ['controller' => 'users', 'action' => 'add']); 
echo $this->Flash->render();
?>
<hr>
<table class="table">
    <thead>
        <th>id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>User Name</th>
        <th>created_at</th>
        <th>modified_at</th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($users as $key => $value) { ?>
            <tr>
                <td><?= $value['User']['id'] ?></td>
                <td><?= $value['User']['first_name'] . $value['User']['last_name'] ?></td>
                <td><?= $value['User']['email'] ?></td>
                <td><?= $value['User']['user_name'] ?></td>
                <td><?= $value['User']['created_at'] ?></td>
                <td><?= $value['User']['modified_at'] ?></td>
                <td>
                    <?php echo $this->Html->link('Editar', ['action' => 'edit', $value['User']['id']]); ?>
                    |
                    <?php echo $this->Html->link(
                        'Excluir',
                        ['action' => 'delete', $value['User']['id']],
                        ['confirm' => 'Você tem certeza que quer excluir este usuário?']
                    );
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<br><br><br>
<?php echo $this->Html->link('Posts', ['controller' => 'posts', 'action' => 'index']);  ?>
