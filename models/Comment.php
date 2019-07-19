<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\Session;
use app\models\User;
use Yii;
class Comment extends ActiveRecord 
{
     
  
    public static function tableName()
    {
        return 'comments';
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

   
     public  function getuser(){

           $user = User::findBySql('SELECT * FROM users where id ='.$this->user_id)->asArray()->all();

           return $user;

   }
   
}