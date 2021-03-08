<?php

use app\models\User;
use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210307_073747_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
	public function safeUp() {

		$tableOptions = null;
		if ( $this->db->driverName === 'mysql' ) {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable( '{{%user}}', [
			'id'                   => $this->primaryKey(),
			'username'             => $this->string()->notNull()->unique(),
			'first_name'           => $this->string(),
			'last_name'            => $this->string(),
			'mobile_no'            => $this->string( 11 ),
			'auth_key'             => $this->string( 32 )->notNull(),
			'password_hash'        => $this->string()->notNull(),
			'password_reset_token' => $this->string()->unique(),
			'verification_token'   => $this->string()->defaultValue( null ),
			'email'                => $this->string()->notNull()->unique(),
			'status'               => $this->smallInteger()->notNull()->defaultValue( User::STATUS_ACTIVE ),
			'created_at'           => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP',
			'updated_at'           => Schema::TYPE_TIMESTAMP . ' DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
		], $tableOptions );

		$this->batchInsert( '{{%user}}',
			[ 'id', 'username', 'auth_key', 'password_hash', 'email', 'first_name', 'last_name' ], [
				[
					1,
					'chanaka',
					'GdJiIRpBszURO^P67b8Ub5swl#IhH*Bh',
					Yii::$app->security->generatePasswordHash( 'spiderman' ),
					'chanakalk1@gmail.com',
					'Chanaka',
					'Karunarathne'
				]
			] );
	}

	public function safeDown() {
		$this->dropTable( '{{%user}}' );
	}
}
