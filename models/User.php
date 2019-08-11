<?php

namespace app\models;
use yii\db\ActiveRecord;
use app\models\Nihongo_score;
use Yii;
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $authKey;
    public $accessToken;
    public $uniqid;
    public $avatar;

   public static function tableName()
    {
        return 'users';
    }
    
    public function attributeLabels() {

        return [
          'id' => 'ID',
          'username' => 'UserName',
          'password' => 'Password',
          'email' => 'Email',
          'authKey' => 'AuthKey',
          'accessToken' => 'AccessToken',
          'uniqid' => 'Uniqid',
        ];

  }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $result = Yii::$app->db->createCommand("SELECT * FROM `users` WHERE `id` = '".$id."'")
           ->queryOne();

        $user = new User();
        $user->id       = $result['id'];
        $user->username = $result['username'];
        $user->email = $result['email'];
        $user->avatar = $result['avatar'];
        $user->password = $result['password'];
        $user->accessToken =  $result['accessToken'];
        $user->role =  $result['role'];
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
         $result = Yii::$app->db->createCommand("SELECT * FROM `users` WHERE `accessToken` = '".$token."'")
           ->queryOne();

        $user = new User();
        $user->username = $result['username'];
        $user->email = $result['email'];
        $user->password = $result['password'];
        $user->accessToken =  $result['accessToken'];
        return $user;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        
        $result = Yii::$app->db->createCommand("SELECT * FROM `users` WHERE `username` = '".$username."'")
           ->queryOne();
        if($result){

                $user = new User();
                $user->id = $result['id'];
                $user->username = $result['username'];
                $user->password = $result['password'];
                $user->accessToken =  $result['accessToken'];
                return $user;
        }else {

            return false;
        }

    }
    
       public static function findByEmail($email)
    {
        
        $result = Yii::$app->db->createCommand("SELECT * FROM `users` WHERE `email` = '".$email."'")
           ->queryOne();
        if($result){

            $user = new User();
            $user->id = $result['id'];
            $user->username = $result['username'];
            $user->password = $result['password'];
            $user->accessToken =  $result['accessToken'];
            return $user;

        }else {

            return false;
        }

    }

    public function saveData($username,$password,$email,$uniqid)
    {
        $command=Yii::$app->db->createCommand()
        ->insert(
            'users',
            array(
                'username'=>$username,
                'password'=>md5($password),
                'email'   =>$email,
                'uniqid'  =>$uniqid,
                'accessToken'   =>"123456789",
            )
        );
        $sql_result = $command->execute();
        // $user = new User();
        // $user->uniqid      =  $uniqid;
        // $user->username    =  $username;
        // $user->password    =  md5($password);
        // $user->email       =  $email;
        // $user->accessToken =  "123456789";

        if($sql_result){

            return $id = Yii::$app->db->getLastInsertID();

        }

        return false;
        
    }

    public function nihongo_score()
    {
           $score = Nihongo_score::findBySql('SELECT * FROM nihongo_score where user_id ='.$this->user_id)->one();

           return $score;
    }
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
