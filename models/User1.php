<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\Session;
use Yii;
class User extends ActiveRecord implements IdentityInterface
{
     
    public $rememberMe  = true;
    public $auth_key;
    public static function tableName()
    {
        return 'users';
    }
    
    
    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    
    public static function findIdentityByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public static function findIdentityByUserName($username) {
         
          return static::findOne(['username' => $username]);

    }
    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public function login($email,$password){
        
        if($user = $this->findIdentityByEmail($email)){
              
             if($user->email == $email && $user->password == md5($password)){
                
                   $session = new Session;
                   $session->open();
                   $session['id'] = $user->id;
                   return true;

             }
        }
       
        return false;
    }

}