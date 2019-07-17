<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class GameController extends Controller
{
	  
      public function actionIndex()
      {
         
          
         return $this->render('index');
        
      }

      public function actionHome(){
        
         return $this->render('home');

      }

     
      
}