<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180220_065407_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
             'id' => $this->primaryKey(),
             'category'=>$this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
