<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\NewC;
class NewController extends Controller
{
	  
      public function actionIndex()
      {
        
         $news = NewC::find()->orderBy([

                  'created_at' => SORT_DESC
                  
                ])->all();
         // $i = 0;
         // foreach ($news as $new) {
         //      $i++;
         //      var_dump($new->getuser()[0]['username']);
         //      if($i == 1){
         //        var_dump($new->getpost()[0]->getuser()[0]['username']);
         //      }
              

         // }
         // die;
         return $this->render('index',[
                'news' => $news
            ]);
        
      }

      public function actionHome(){
        
         return $this->render('home');

      }

      public function actionPost(){

            return $this->render('post');
      }

    

     
      
}