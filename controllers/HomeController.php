<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class HomeController extends Controller
{
	  
      public function actionIndex()
      {
         //$this->layout = 'main';
         $post = Yii::$app->db->createCommand("SELECT * FROM `lesson_1000_sentence` WHERE audio_id = 1")
           ->queryAll();
          
         return $this->render('index',[
                'post' => $post
            ]);
        
      }

      public function actionHome(){
        
         return $this->render('home');

      }

     
      
}