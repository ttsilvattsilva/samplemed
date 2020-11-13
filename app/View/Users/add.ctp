
<?php
echo "<h1>" . $title . "</h1>";
echo $this->Form->create('User');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('user_name');
echo $this->Form->input('password', ['type' => 'password']);
echo $this->Form->input('Enviar', ['label' => FALSE, 'type' => 'submit']);
echo $this->Form->end();
