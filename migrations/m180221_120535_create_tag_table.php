<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag`.
 */
class m180221_120535_create_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull(),
        ]);
      
      
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tag');
    }
}
