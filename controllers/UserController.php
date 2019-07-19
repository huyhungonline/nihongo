<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class UserController extends Controller
{
	  
      public function actionIndex()
      {
         // $this->layout = false;
         return $this->render('index');
        
      }

      


}