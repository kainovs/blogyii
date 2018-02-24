<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_tag`.
 */
class m180221_120522_create_post_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post_tag', [
            'id' => $this->primaryKey(),
            'post_id'=>$this->integer(),
            'tag_id'=>$this->integer()
        ]);
      
         $this->createIndex(
            'tag_post_post_id',
            'post_tag',
            'post_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'tag_post_post_id',
            'post_tag',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
        // creates index for column `user_id`
        $this->createIndex(
            'idx_tag_id',
            'post_tag',
            'tag_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tag_id',
            'post_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post_tag');
    }
}
