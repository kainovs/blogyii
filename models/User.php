<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    const STATUS_DELETED = 0; // Если пользователь Заблокирован(Удален)
    const STATUS_ACTIVE = 10; // Если пользователь Активен
    const STATUS_ADMIN = 1; // Если пользователь Администратор(для части II)
  
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
  
  public function validatePassword($password)
  {
   return yii::$app->security->validatePassword($password, $this->password_hash);
  }
  
  public static function findIdentity ($id)
  {
    return static::findOne(['id'=>$id,'status' => self::STATUS_ACTIVE ]);
  }



    public static function findIdentityByAccessToken($token, $type = null)
    {
       // throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.'
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
       return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
       return $this->auth_key===$authKey;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
     public function findByUsername($username)
     {
       return  static::findOne(['username'=>$username, 'status' => self::STATUS_ACTIVE ]);
     }
}
