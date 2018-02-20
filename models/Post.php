<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $create_date
 * @property string $update_date
 * @property int $active
 * @property int $comentActive
 * @property string $img
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'description', 'content'], 'required'],
            [['user_id', 'category_id', 'active', 'comentActive'], 'integer'],
            [['description', 'content'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['title', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'active' => 'Active',
            'comentActive' => 'Coment Active',
            'img' => 'Img',
        ];
    }
}
