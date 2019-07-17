<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Moneysend;
use yii\web\UploadedFile;

class OrderController extends Controller
{
    
   

    public function actionStatus(){


          $session = Yii::$app->session;
          $user_id  =  $session->get('id');
          $results  = Yii::$app->db->createCommand("SELECT * FROM `moneysend` WHERE `user_id` = '".$user_id."'")->queryAll();
          return $this->render('status',['results' => $results]);

    }
  
}



?>