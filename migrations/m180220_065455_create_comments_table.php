<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m180220_065455_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer()->notNull(),
            'post_id'=>$this->integer()->notNull(),
            'comment'=>$this->text(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            
        ]);
    
   // creates index for column `author_id`
        $this->createIndex(
            'idx-comment-user_id',
            'comments',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-comment-user_id',
            'comments',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-comment-post_id',
            'comments',
            'post_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-comment-post_id',
            'comments',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
