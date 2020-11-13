<?php
App::uses('Model', 'Model');

class UserModel extends Model
{
    public $name = "User";

    public $virtualFields = [
        'full_name' => 'CONCAT(first_name, " ", last_name)'
    ];

    public $hasMany = 'Post';
}
