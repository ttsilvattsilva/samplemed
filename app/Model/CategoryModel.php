<?php
App::uses('Model', 'Model');

class CategoryModel extends Model
{
    public $name = "category";

    public $hasMany = 'PostCategory';
}
