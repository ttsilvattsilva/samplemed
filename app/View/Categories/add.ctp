<?php
echo "<h1>" . $title . "</h1>";
echo $this->Form->create('User',['method' => 'POST']);
echo $this->Form->create('Category');
echo $this->Form->input('id', ['type' => 'hidden']);
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('Enviar', ['label' => FALSE, 'type' => 'submit']);
echo $this->Form->end();
