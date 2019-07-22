<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\Session;

use Yii;
class Dockkai_long extends ActiveRecord 
{
     
  
    public static function tableName()
    {
        return 'dockkai_long';
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

    public function getMondaisub()
    {
          $lists = Yii::$app->db->createCommand("SELECT * FROM `dockkai_long_answer` WHERE dockkai_long_id = ".$this->id)
           ->queryAll();
           return $lists;
    }
  

}