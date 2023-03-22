<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%works}}`.
 */
class m230214_122010_create_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%works}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string(255),
            'link' => $this->string(255),
            'thumb' => $this->string(255),
            'image' => $this->string(255),
            'description' => $this->text(),
            'content' => $this->text(),
        ]);
        $this->createIndex(
          'idx-works-category_id',
          'works',
          'category_id'
        );
        $this->addForeignKey(
          'fk-works-category_id',
          'works',
          'category_id',
          'categories',
          'id',
          'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-works-category_id', 'works');
        $this->dropIndex('idx-works-category_id', 'works');
        $this->dropTable('{{%works}}');
    }
}
