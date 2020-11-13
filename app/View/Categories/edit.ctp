<?php
echo "<h1>" . $title . "</h1>";
echo $this->Form->create('Category');
echo $this->Form->input('id', ['type' => 'hidden']);
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('Alterar', ['type' => 'submit', 'label' => FALSE]);
echo $this->Form->end();
