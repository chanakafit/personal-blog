<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m210310_154244_create_category_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->createTable( '{{%category}}', [
			'id'          => $this->primaryKey(),
			'name'        => $this->string( 1000 )->notNull(),
			'description' => $this->text(),
		] );

		$this->addColumn( '{{%blog}}', 'categories', $this->string( 1000 )->notNull()->after( 'cover_image' ) );
		$this->dropColumn( '{{%blog}}', 'category' );
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->addColumn( '{{%blog}}', 'category', $this->string( 1000 )->notNull()->after( 'cover_image' ) );
		$this->dropColumn( '{{%blog}}', 'categories' );
		$this->dropTable( '{{%category}}' );
	}
}
