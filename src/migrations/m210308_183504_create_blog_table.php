<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Handles the creation of table `{{%blog}}`.
 */
class m210308_183504_create_blog_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->createTable( '{{%blog}}', [
			'id'          => $this->primaryKey(),
			'title'       => $this->string( 1000 )->notNull(),
			'content'     => $this->text()->notNull(),
			'slug'        => $this->string( 1000 )->notNull(),
			'cover_image' => $this->string( 1000 )->notNull(),
			'category'    => $this->string( 1000 )->notNull(),
			'tags'        => $this->string(),
			'created_at'  => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP',
			'updated_at'  => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
			'created_by'  => $this->integer()
		] );

		$this->addForeignKey(
			'FK_blog_user',
			'{{%blog}}',
			'created_by',
			'{{%user}}',
			'id',
			'NO ACTION',
			'NO ACTION'
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {

		$this->dropForeignKey(
			'FK_blog_user',
			'{{%blog}}'
		);

		$this->dropTable( '{{%blog}}' );
	}
}
