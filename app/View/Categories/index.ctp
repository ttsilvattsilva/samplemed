<?php
echo "<h1>" . $title . "</h1><br>";
echo $this->Html->link('New Category', ['controller' => 'categories', 'action' => 'add']); 
echo $this->Flash->render();
?>
<hr>
<table class="table">
    <thead>
        <th>id</th>
        <th>name</th>
        <th>description</th>
        <th>created_at</th>
        <th>modified_at</th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($categories as $key => $value) { ?>
            <tr>
                <td><?= $value['Category']['id'] ?></td>
                <td><?= $value['Category']['name'] ?></td>
                <td><?= $value['Category']['description'] ?></td>
                <td><?= $value['Category']['created_at'] ?></td>
                <td><?= $value['Category']['modified_at'] ?></td>
                <td>
                    <?php echo $this->Html->link('Editar', ['action' => 'edit', $value['Category']['id']]); ?>
                    |
                    <?php echo $this->Html->link(
                        'Excluir',
                        ['action' => 'delete', $value['Category']['id']],
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
