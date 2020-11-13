<?php
echo "<h1>" . $title . "</h1>";
echo $this->Html->link('New Post', ['controller' => 'posts', 'action' => 'add']); 
echo $this->Flash->render(); 
?>

<table class="table">
    <thead>
        <th>id</th>
        <th>title</th>
        <th>Subtitle</th>
        <th>body</th>
        <th>author</th>
        <th>created_at</th>
        <th>modified_at</th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($posts as $key => $value) { ?>
            <tr>
                <td><?= $value['Post']['id'] ?></td>
                <td><?= $value['Post']['title'] ?></td>
                <td><?= $value['Post']['subtitle'] ?></td>
                <td><?= $value['Post']['body'] ?></td>
                <td><?= $users[$value['Post']['user_id']] ?? '' ?></td>
                <td><?= $value['Post']['created_at'] ?></td>
                <td><?= $value['Post']['modified_at'] ?></td>
                <td>
                    <?php echo $this->Html->link('Editar', ['action' => 'edit', $value['Post']['id']]); ?>
                    |
                    <?php echo $this->Html->link(
                        'Excluir',
                        ['action' => 'delete', $value['Post']['id']],
                        ['confirm' => 'Você tem certeza que quer excluir este usuário?']
                    );
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<br><br><br>
<?php echo $this->Html->link('Users', ['controller' => 'users', 'action' => 'index']);  ?>
 - - 
<?php echo $this->Html->link('Categories', ['controller' => 'categories', 'action' => 'index']);  ?>


<!-- <a href="posts/add">New Post</a> -->