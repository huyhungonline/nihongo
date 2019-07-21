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
             
         //      if($new['type'] == 2){
         //        var_dump($new->getcomment()[0]->getpost()[0]->getuser()[0]['id']);
         //      }
              

         // }
        
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