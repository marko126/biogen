<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "msd_activation_code".
 *
 * @property integer $actcodeid
 * @property string $section_name
 * @property string $doctor_name
 * @property string $hospital_name
 * @property string $activation_code
 * @property integer $status
 * @property string $createdate
 * @property string $tokenid
 * @property string $tokendate
 * @property string $deviceid
 * @property integer $devicetype
 * @property integer $first_login
 */
class MsdActivationCode extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $auth_key;
    public $first_name;
    public $last_name;
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
            [['section_name', 'hospital_name', 'activation_code', 'first_name', 'last_name'], 'required'],
            [['status', 'devicetype', 'first_login'], 'integer'],
            [['createdate', 'tokendate'], 'safe'],
            [['section_name', 'doctor_name', 'hospital_name', 'activation_code', 'deviceid'], 'string', 'max' => 255],
            [['tokenid'], 'string', 'max' => 50],
            [['activation_code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actcodeid' => 'Actcodeid',
            'section_name' => 'AFDELING',
            'doctor_name' => 'LÆGE',
            'first_name' => 'Fornavn',
            'last_name' => 'Efternavn',
            'hospital_name' => 'HOSPITAL',
            'activation_code' => 'Activation Code',
            'status' => '1=enable, 0=disable',
            'createdate' => 'Createdate',
            'tokenid' => 'Tokenid',
            'tokendate' => 'Tokendate',
            'deviceid' => 'Deviceid',
            'devicetype' => '0 for android, 1 for iphone',
            'first_login' => '1=yes, 0=no',
        ];
    }
    
    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
	return static::findOne($id);
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }
    
    /**
     * Finds user by activation_code
     *
     * @param  string      $activation_code
     * @return static|null
     */
    public static function findByActivationCode($activation_code)
    {
	return static::findOne(['activation_code' => $activation_code]);
    }
    
    /**
     * 
     * @return type
     */
    public function getFirstName() {
        return $this->first_name;
    }
    
    /**
     * 
     * @return type
     */
    public function getLastName() {
        return $this->last_name;
    }
    
    /**
     * 
     * @return type
     */
    public function getHospitalName() {
        return $this->hospital_name;
    }
    
    /**
     * 
     * @return type
     */
    public function getSectionName() {
        return $this->section_name;
    }
    
    public static function strtoupperDanishLetters($string){
        $string = str_replace('å', 'Å', $string);
        $string = str_replace('æ', 'Æ', $string);
        $string = str_replace('ø', 'Ø', $string);
        return $string;
    }
    
    public function afterFind() {
        if (isset($this->actcodeid)) {
            $name = explode(' ', $this->doctor_name);
            $this->first_name = $name[0];
            if (sizeof($name) > 2) {
                unset($name[0]);
                $name = implode(' ', $name);
                $this->last_name = $name;
            } elseif (sizeof($name) == 2) {
                $this->last_name = $name[1];
            }
        }
    }
    
    public function beforeSave($update) {
        if(parent::beforeSave($update)) {
            $this->doctor_name = $this->first_name.' '.$this->last_name;
            return true;
        } else {
            return false;
        }
        
    }

}
