<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\Dockkai_long;
use app\models\Nihongo_score;
use yii\db\Expression;

class TestController extends Controller
{
	  
    
      public function actionIndex()
      {
         $request  = Yii::$app->request;
         $level    = $request->get('level');
         
         if(Yii::$app->user->isGuest) {

             $part1 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 1 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part2 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 2 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part3 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 3 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part4 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 4 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part5 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 5 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part6 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 6 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part7 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 7 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part8 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 8 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part9 = Yii::$app->db->createCommand("SELECT * FROM `mondai9`  ORDER BY RAND() LIMIT 1 ")->queryOne();
             $p9_q1 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans1']."'    LIMIT 1 ")->queryOne();
             $p9_q2 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans2']."'    LIMIT 1 ")->queryOne();
             $p9_q3 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans3']."'    LIMIT 1 ")->queryOne();
             $p9_q4 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans4']."'    LIMIT 1 ")->queryOne();
             $p9_q5 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans5']."'    LIMIT 1 ")->queryOne();
             $part10 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 10 ORDER BY RAND() LIMIT 5 ")->queryAll();
             //$mondai_list = Mondai_list::find()->orderBy(new Expression('rand()'))->limit(2);
             $mondai_list = Dockkai_long::findBySql('SELECT * FROM dockkai_long ORDER BY RAND() LIMIT 2')->all();

         }else {
           
             $part1 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 1 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part2 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 2 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part3 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 3 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part4 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 4 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part5 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 5 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part6 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 6 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part7 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 7 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part8 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 8 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $part9 = Yii::$app->db->createCommand("SELECT * FROM `mondai9`  ORDER BY RAND() LIMIT 1 ")->queryOne();
             $p9_q1 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans1']."'    LIMIT 1 ")->queryOne();
             $p9_q2 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans2']."'    LIMIT 1 ")->queryOne();
             $p9_q3 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans3']."'    LIMIT 1 ")->queryOne();
             $p9_q4 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans4']."'    LIMIT 1 ")->queryOne();
             $p9_q5 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans5']."'    LIMIT 1 ")->queryOne();
             $part10 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 10 ORDER BY RAND() LIMIT 5 ")->queryAll();
             $mondai_list = Dockkai_long::findBySql('SELECT * FROM dockkai_long ORDER BY RAND() LIMIT 2')->all();
         }
        
          
          return $this->render('index',['part1'=>$part1,'part2'=>$part2,'part3'=>$part3,'part4'=>$part4,'part5'=>$part5,'part6'=>$part6,'part7'=>$part7,'part8'=>$part8,'part9'=>$part9,'p9_q1'=>$p9_q1,'p9_q2'=>$p9_q2,'p9_q3'=>$p9_q3,'p9_q4'=>$p9_q4,'p9_q5'=>$p9_q5,'part10'=>$part10,'mondai_list'=>$mondai_list,'level'=>$level]);
      }

     public function actionHome(){

         $request  = Yii::$app->request;
         $level    = $request->get('level');


         if(Yii::$app->user->isGuest) {

           
             $part7 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 7 ORDER BY RAND() LIMIT 2 ")->queryAll();
             $part8 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 8 ORDER BY RAND() LIMIT 2 ")->queryAll();
            $part9 = Yii::$app->db->createCommand("SELECT * FROM `mondai9`  ORDER BY RAND() LIMIT 1 ")->queryOne();
             $p9_q1 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans1']."'    LIMIT 1 ")->queryOne();
             $p9_q2 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans2']."'    LIMIT 1 ")->queryOne();
             $p9_q3 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans3']."'    LIMIT 1 ")->queryOne();
             $p9_q4 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans4']."'    LIMIT 1 ")->queryOne();
             $p9_q5 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans5']."'    LIMIT 1 ")->queryOne();
             $part10 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 10 ORDER BY RAND() LIMIT 2 ")->queryAll();
             //$mondai_list = Mondai_list::find()->orderBy(new Expression('rand()'))->limit(2);
             $mondai_list = Dockkai_long::findBySql('SELECT * FROM dockkai_long ORDER BY RAND() LIMIT 2')->all();

         }else {
           
            
             $part7 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 7 ORDER BY RAND() LIMIT 2 ")->queryAll();
             $part8 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 8 ORDER BY RAND() LIMIT 2 ")->queryAll();
             $part9 = Yii::$app->db->createCommand("SELECT * FROM `mondai9`  ORDER BY RAND() LIMIT 1 ")->queryOne();
             $p9_q1 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans1']."'    LIMIT 1 ")->queryOne();
             $p9_q2 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans2']."'    LIMIT 1 ")->queryOne();
             $p9_q3 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans3']."'    LIMIT 1 ")->queryOne();
             $p9_q4 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans4']."'    LIMIT 1 ")->queryOne();
             $p9_q5 = Yii::$app->db->createCommand("SELECT * FROM `mondai9_answer` WHERE `id`    = '".$part9['ans5']."'    LIMIT 1 ")->queryOne();
             $part10 = Yii::$app->db->createCommand("SELECT * FROM `test` WHERE `level` = '".$level."' AND `part` = 10 ORDER BY RAND() LIMIT 2 ")->queryAll();
             $mondai_list = Dockkai_long::findBySql('SELECT * FROM dockkai_long ORDER BY RAND() LIMIT 2')->all();
         }
        
          
          return $this->render('home',['part7'=>$part7,'part8'=>$part8,'part9'=>$part9,'p9_q1'=>$p9_q1,'p9_q2'=>$p9_q2,'p9_q3'=>$p9_q3,'p9_q4'=>$p9_q4,'p9_q5'=>$p9_q5,'part10'=>$part10,'mondai_list'=>$mondai_list,'level'=>$level]);
     }

     public function actionSavescore(){

                // $score = Nihongo_score::findBySql('SELECT * FROM nihongo_score where user_id ='.$this->user_id)->one();

                // return $score;
            if(!Yii::$app->user->isGuest) {

                if (Yii::$app->request->isAjax) {
                    $data = Yii::$app->request->post();
                    $score = $data['score'];
                    $type  = $data['type'];

                    $result = Nihongo_score::findBySql('SELECT * FROM nihongo_score where user_id ='.Yii::$app->user->identity->id)->one();
                    if(!$result){

                       $nihongo = new Nihongo_score();
                       $nihongo->user_id = Yii::$app->user->identity->id;
                       $nihongo->save();
                    }
                      
                    if($type == 1){
                       
                    $connection = Yii::$app->getDb();
                    $result = $connection->createCommand('UPDATE nihongo_score SET kotoba ="'.$score.'" WHERE user_id = "'.Yii::$app->user->identity->id.'"')->execute();

                    }else {
                      
                       $connection = Yii::$app->getDb();
                       $result = $connection->createCommand('UPDATE nihongo_score SET dokkai ="'.$score.'" WHERE user_id = "'.Yii::$app->user->identity->id.'"')->execute();
                    }
                     
                  
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'score' => $score,
                        'code' => 100,
                    ];
                  }
        }
     }

}