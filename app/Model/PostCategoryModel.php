<?php
App::uses('Model', 'Model');

class PostCategoryModel extends Model
{
    public $name = "PostCategory";

    var $belongsTo = array(
        'Post'=>array(
            'className'=>'Post',
            'foreignKey'=>'post_id'
        ),
        'Category'=>array(
            'className'=>'Category',
            'foreignKey'=>'category_id'
        ));

}
