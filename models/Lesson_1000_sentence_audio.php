<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\Session;

use Yii;
class Lesson_1000_sentence_audio extends ActiveRecord 
{
     
  
    public static function tableName()
    {
        return 'lesson_1000_sentence_audio';
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

    public function getSentences($audio_id)
    {
          $sentences = Yii::$app->db->createCommand("SELECT * FROM `lesson_1000_sentence` WHERE audio_id = ".$audio_id)
           ->queryAll();
           return $sentences;
    }
  

}