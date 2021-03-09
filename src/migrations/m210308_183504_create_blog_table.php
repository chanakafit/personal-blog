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
			'title'       => $this->string( 1000 ),
			'content'     => $this->text(),
			'slug'        => $this->string( 1000 ),
			'cover_image' => $this->string( 1000 ),
			'category'    => $this->string( 1000 ),
			'tags'        => $this->string(),
			'created_at'  => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP',
			'updated_at'  => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
			'created_by'  => $this->integer()
		] );
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropTable( '{{%blog}}' );
	}
}
