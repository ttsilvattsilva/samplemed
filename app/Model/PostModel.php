<?php
App::uses('Model', 'Model');

class PostModel extends Model
{
    public $name = "Post";

    public $hasOne = 'User';

    public $hasMany = 'PostCategory';
}
