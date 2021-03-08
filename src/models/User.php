<?php

namespace app\models;

use app\components\ExitCode;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $mobile_no
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $verification_token
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class User extends ActiveRecord implements IdentityInterface {
	const STATUS_DELETED = 0;
	const STATUS_INACTIVE = 9;
	const STATUS_ACTIVE = 10;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return '{{%user}}';
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'first_name', 'last_name', 'password_hash', 'password_reset_token', 'verification_token', 'email'], 'string', 'max' => 255],
            [['mobile_no'], 'string', 'max' => 11],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'mobile_no' => 'Mobile No',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'verification_token' => 'Verification Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

	/**
	 * Finds an identity by the given ID.
	 *
	 * @param string|int $id the ID to be looked for
	 *
	 * @return IdentityInterface|null the identity object that matches the given ID.
	 * Null should be returned if such an identity cannot be found
	 * or the identity is not in an active state (disabled, deleted, etc.)
	 */
	public static function findIdentity( $id ) {
		return static::findOne( [ 'id' => $id, 'status' => self::STATUS_ACTIVE ] );
	}

	/**
	 * Finds an identity by the given token.
	 *
	 * @param mixed $token the token to be looked for
	 * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
	 * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
	 *
	 * @return null|IdentityInterface the identity object that matches the given token.
	 * Null should be returned if such an identity cannot be found
	 * or the identity is not in an active state (disabled, deleted, etc.)
	 * @throws NotSupportedException
	 */
	public static function findIdentityByAccessToken( $token, $type = null ) {
		throw new NotSupportedException( '"findIdentityByAccessToken" is not implemented.' );
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 *
	 * @return static|null
	 */
	public static function findByUsername( $username ) {
		return static::findOne( [ 'username' => $username, 'status' => self::STATUS_ACTIVE ] );
	}

	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 *
	 * @return static|null
	 */
	public static function findByPasswordResetToken( $token ) {
		if ( ! static::isPasswordResetTokenValid( $token ) ) {
			return null;
		}

		return static::findOne( [
			'password_reset_token' => $token,
			'status'               => self::STATUS_ACTIVE,
		] );
	}

	/**
	 * Finds user by verification email token
	 *
	 * @param string $token verify email token
	 *
	 * @return static|null
	 */
	public static function findByVerificationToken( $token ) {
		return static::findOne( [
			'verification_token' => $token,
			'status'             => self::STATUS_INACTIVE
		] );
	}

	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 *
	 * @return bool
	 */
	public static function isPasswordResetTokenValid( $token ) {
		if ( empty( $token ) ) {
			return false;
		}

		$timestamp = (int) substr( $token, strrpos( $token, '_' ) + 1 );
		$expire    = Yii::$app->params['user.passwordResetTokenExpire'];

		return $timestamp + $expire >= time();
	}

	/**
	 * {@inheritdoc}
	 */
	public function getId() {
		return $this->getPrimaryKey();
	}

	/**
	 * Returns a key that can be used to check the validity of a given identity ID.
	 *
	 * The key should be unique for each individual user, and should be persistent
	 * so that it can be used to check the validity of the user identity.
	 *
	 * The space of such keys should be big enough to defeat potential identity attacks.
	 *
	 * This is required if [[User::enableAutoLogin]] is enabled. The returned key will be stored on the
	 * client side as a cookie and will be used to authenticate user even if PHP session has been expired.
	 *
	 * Make sure to invalidate earlier issued authKeys when you implement force user logout, password change and
	 * other scenarios, that require forceful access revocation for old sessions.
	 *
	 * @return string a key that is used to check the validity of a given identity ID.
	 * @see validateAuthKey()
	 */
	public function getAuthKey() {
		return $this->auth_key;
	}

	/**
	 * Validates the given auth key.
	 *
	 * This is required if [[User::enableAutoLogin]] is enabled.
	 *
	 * @param string $authKey the given auth key
	 *
	 * @return bool whether the given auth key is valid.
	 * @see getAuthKey()
	 */
	public function validateAuthKey( $authKey ) {
		return $this->getAuthKey() === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 *
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword( $password ) {
		return Yii::$app->security->validatePassword( $password, $this->password_hash );
	}

	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param string $password
	 */
	public function setPassword( $password ) {
		$this->password_hash = Yii::$app->security->generatePasswordHash( $password );
	}

	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey() {
		$this->auth_key = Yii::$app->security->generateRandomString();
	}

	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken() {
		$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
	}

	/**
	 * Generates new token for email verification
	 */
	public function generateEmailVerificationToken() {
		$this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
	}

	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken() {
		$this->password_reset_token = null;
	}

	/**
	 * @param $id
	 *
	 * @return array User Details
	 */
	public static function getUser( $id ) {
		$user = self::findOne( $id );

		return [
			'username'   => $user->username,
			'first_name' => $user->first_name,
			'last_name'  => $user->last_name,
			'mobile_no'  => $user->mobile_no,
			'email'      => $user->email,
			'status'     => $user->status,
		];
	}

	/**
	 * @param $username
	 * @param $password
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function authenticate( $username, $password ) {

		$username = self::sanitizeUserName( $username );

		$user = User::findOne( [ 'username' => $username ] );

		if ( ! $user ) {
			throw new \Exception( 'Username or Password is invalid', ExitCode::INVALID_CREDENTIALS );
		}

		if ( ! $user->validatePassword( $password ) ) {
			throw new \Exception( 'Username or Password is invalid', ExitCode::INVALID_CREDENTIALS );
		}

		Yii::$app->user->login( $user );

		return [
			'username'   => $user->username,
			'first_name' => $user->first_name,
			'last_name'  => $user->last_name,
			'mobile_no'  => $user->mobile_no,
			'email'      => $user->email,
			'status'     => $user->status,
		];

	}

	/**
	 * @param $username string
	 *
	 * @return string username
	 */
	private static function sanitizeUserName( $username ) {
		$username = preg_replace( '/\s*/', '', $username );

		return strtolower( $username );
	}
}
