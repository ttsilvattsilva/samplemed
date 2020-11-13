<?php
App::uses('AppModel', 'Model');

class UserModel extends Model
{
    public $name = "User";

    public $virtualFields = [
        'full_name' => 'CONCAT(first_name, " ", last_name)'
    ];

    public $hasMany = 'Post';

    public $validate = [
        'first_name' => [
            'rule' => 'notEmpty'
        ],
        'last_name' => [
            'rule' => 'notEmpty'
        ],
        'email' => [
            'rule' => 'notEmpty'
        ],
        'username' => [
            'rule' => 'notEmpty'
        ],

        'password' => [
            'Digite uma senha' => [
                'rule' => 'notEmpty',
                'message' => 'Por favor, digite uma senha!'
            ],
            '8 digitos' => [
                'rule' => ['minLength', '8'],
                'message' => 'No mínimo 8 caracteres'
            ],
            '1 Letra Maiuscula' => [
                'rule' => ['custom', '/^(?=.*[a-z])(?=.*[$\\@\\\#%\^\&\*\(\)\[\]\+\_\{\}\`\~\=\|])(?=.*[A-Z])(?=.*[0-9])[\w$@]{8,}$/'],
                'message' => 'A senha deve caracteres especiais!'
            ],
        ],

    ];
}
