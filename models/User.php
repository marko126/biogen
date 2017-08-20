<?php

namespace app\models;

use Yii;
use yii\helpers\Security;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $ime_prezime
 * @property string $telefon
 * @property string $mob_telefon
 * @property integer $is_admin
 * @property integer $activation_status
 * @property string $activation_key
 * @property string $token
 *
 * @property Oglas[] $oglas
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msd_activation_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_name', 'doctor_name', 'hospital_name', 'telefon'], 'required'],
            [['is_admin', 'activation_status'], 'integer'],
            [['email', 'password', 'ime_prezime', 'telefon'], 'string', 'max' => 100],
            [['mob_telefon', 'activation_key', 'auth_key'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'ime_prezime' => 'Ime i prezime',
            'telefon' => 'Telefon',
            'mob_telefon' => 'Mobilni telefon',
            'is_admin' => 'Is Admin',
            'activation_status' => 'Activation Status',
            'activation_key' => 'Activation Key',
            'token' => 'Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOglas()
    {
        return $this->hasMany(Oglas::className(), ['korisnik_id' => 'id']);
    }
    
    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
	return static::findOne($id);
    }
    
    /**
     *@inheritdoc
     */
    /* modified */
    public static function findIdentityByAccessToken($token, $type = null)
    {
	return static::findOne(['access_token' => $token]);
    }
	  
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
	return static::findOne(['email' => $username]);
    }
	 
    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }
	 
        return static::findOne([
            'password_reset_token' => $token
        ]);
    }
	 
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }           
            
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
	 
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
	 
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }
	 
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }
	 
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }
	 
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }
	 
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    public function insertFotografija() {
        
    }
    
    public function updateFotografija($id) {
        
    }

    /**
     * Check if current user is admin
     * @return boolean
     */
    public function isAdmin () {
        if (static::findOne(['email' => Yii::$app->user->identity->email, 'is_admin' => 1])) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Check if current user is active
     * @return boolean
     */
    public function isActive () {
        if ($this->activation_status == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function getUsernamesAsArray() {
        $connection = \Yii::$app->getDb();
        $command = $connection->createCommand('
            SELECT email FROM user WHERE activation_status = 1
        ');
        $users = $command->queryAll();
        $result = [];
        foreach ($users as $key => $value) {
            $result[] = $value['email'];
        }
        return $result;
    }
    
}
