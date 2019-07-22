<?php

namespace app\controllers;


use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\Lesson_1000_sentence_audio;
use yii\data\Pagination;

class SentenceController extends Controller
{
	  
      public function actionIndex()
      {

          $this->layout = 'main';
          $query      = Lesson_1000_sentence_audio::find();
          $countQuery = clone $query;
          $pages      = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => '1']);
          $models     = $query->offset($pages->offset)
              ->limit(1)
              ->all();
          // $this->view->params['customParam'] = 'huyhung';
              // var_dump($models);die;
          return $this->render('index', [
               'audio' => $models,
               'pages' => $pages,
          ]);

      }

      public function actionHome(){
        
         return $this->render('home');

      }

     
      
}