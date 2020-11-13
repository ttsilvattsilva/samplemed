<?php
echo "<h1>" . $title . "</h1>";
echo $this->Form->create('User');
echo $this->Form->input('id', ['type' => 'hidden']);
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email', ['type' => 'email']);
echo $this->Form->input('user_name');
echo $this->Form->input('password', ['type' => 'password']);
echo $this->Form->input('Alterar', ['type' => 'submit', 'label' => FALSE]);
echo $this->Form->end();
