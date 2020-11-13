<?php
echo "<h1>" . $title . "</h1>";
echo $this->Form->create('Post');
echo "<br>";

echo "<p>Author</p>";
echo $this->Form->select('user_id', ['field' => $users]);
echo "<br><br>";
echo "<p>Category</p>";
echo $this->Form->select('category_id', ['field' => $categories]);
echo "<br><br>";

echo $this->Form->input('title');
echo $this->Form->input('subtitle');
echo $this->Form->input('body', ['type' => 'textarea']);
echo $this->Form->input('Enviar', ['label' => FALSE, 'type' => 'submit']);
echo $this->Form->end();
