<?php
App::uses('Model', 'Model');

class PostModel extends Model
{
    public $name = "Post";

    public $hasOne = 'User';

    public $hasMany = 'PostCategory';

    public $validate = [
        'category_id' => [
            'numeric' => [
                'rule' => ['numeric'],
            ],
        ],
        'user_id' => [
            'numeric' => [
                'rule' => ['numeric'],
            ],
        ],
        'title' => [
            'rule' => 'notEmpty'
        ],
        'subtitle' => [
            'rule' => 'notEmpty'
        ],
        'body' => [
            'rule' => 'notEmpty'
        ],        

    ];
}
