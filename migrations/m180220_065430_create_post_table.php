<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180220_065430_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'user_id'=> $this->integer()->notNull(),
            'category_id'=>$this->integer()->notNull()->defaultValue(1),
            'title'=>$this->string()->notNull(),
            'description'=>$this->text(500)->notNull(),
            'content'=>$this->text()->notNull(),
            'create_date'=>$this->dateTime(),
            'update_date'=>$this->dateTime(),
            'active'=>$this->smallInteger()->notNull()->defaultValue(10),
            'comentActive'=>$this->smallInteger()->notNull()->defaultValue(10),
            'img'=>$this->string(),
        ]);
    
    // creates index for column `author_id`
        $this->createIndex(
            'idx-post-user_id',
            'post',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-user_id',
            'post',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-post-category_id',
            'post',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-post-category_id',
            'post',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post');
    }
}
