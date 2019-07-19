<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\Session;
use Yii;
use app\models\User;
use app\models\Post;
use app\models\Comment;
class NewC extends ActiveRecord 
{
   
  
    public static function tableName()
    {
        return 'news';
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
   
    public  function getpost(){

           $post = Post::findBySql('SELECT * FROM posts where id ='.$this->post_id)->all();

           return $post;

   }

    public  function getcomment(){

           $comment = Comment::findBySql('SELECT * FROM comments where id ='.$this->comment_id)->asArray()->all();

           return $comment;

   }
   
}