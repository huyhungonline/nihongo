<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class NewController extends Controller
{
	  
      public function actionIndex()
      {
         $this->layout = false;
         $post = Yii::$app->db->createCommand("SELECT * FROM `new` ORDER BY RAND() LIMIT 1")
           ->queryOne();
          
         return $this->render('index',[
                'post' => $post
            ]);
        
      }

      public function actionHome(){
        
         return $this->render('home');

      }

      public function actionPost(){

            return $this->render('post');
      }

     
      
}