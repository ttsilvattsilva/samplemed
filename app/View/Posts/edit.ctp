<?php
echo "<h1>" . $title . "</h1>";
echo $this->Form->create('Post');
echo $this->Form->input('user_id', ['options' => $users, 'selected' => $authorId]);
echo $this->Form->input('category_id', ['options' => $categories, 'selected' => $currentCategoryId]);
echo $this->Form->input('id', ['type' => 'hidden']);
echo $this->Form->input('title');
echo $this->Form->input('subtitle');
echo $this->Form->input('body', ['type' => 'textarea']);
echo $this->Form->input('Alterar', ['type' => 'submit', 'label' => FALSE]);
echo $this->Form->end();
