<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\Test;
class InputController extends Controller
{
	  
      public function actionInput1234()
      {        

      	       $request = Yii::$app->request;
               if (Yii::$app->request->post()) { 
                 
                  $question  = $request->post('question');
                  $answer1   = $request->post('answer1');
                  $answer2   = $request->post('answer2');
                  $answer3   = $request->post('answer3');
                  $answer4   = $request->post('answer4');
                  $answer_true  = $request->post('answer_true');
                  $part      = $request->post('part');
                  $level     = $request->post('level');
                  $note1     = $request->post('note1');
                  $note2     = $request->post('note2');
                  $note3     = $request->post('note3');
                  $note4     = $request->post('note4');
                  $test      = new Test();
                  $test->question = $question;
                  $test->answer1 = $answer1;
                  $test->answer2 = $answer2;
                  $test->answer3 = $answer3;
                  $test->answer4 = $answer4;
                  $test->answer_true = $answer_true;
                  $test->level = $level;
                  $test->part  = $part;
                  $test->note1 = $note1;
                  $test->note2 = $note2;
                  $test->note3 = $note3;
                  $test->note4 = $note4;
                  $test->save();
                  return $this->render('checksave',['test' => $test]);

               }else{

               	   return $this->render('input1234');
               }
          
        
      }
       
        public function actionDelete1234(){
        
            $transaction = Yii::$app->db->beginTransaction();
             try {
                
                      $request  = Yii::$app->request;
                      $id       = $request->get('id');
                   
                      $test     = Test::findBySql('SELECT * FROM test where id ='.$id)->one();
                      $test->delete();

                    

                      $transaction->commit();
                      return $this->redirect(['/input/input1234']);

             }catch(Exception $e){

                      $transaction->rollBack();
                      printf($e->message);
             }

      }

       public function actionInput10()
      {        

               $request = Yii::$app->request;
               if (Yii::$app->request->post()) { 
                 
                  $question  = $request->post('question');
                  $question_sub  = $request->post('question_sub');
                  $answer1   = $request->post('answer1');
                  $answer2   = $request->post('answer2');
                  $answer3   = $request->post('answer3');
                  $answer4   = $request->post('answer4');
                  $answer_true  = $request->post('answer_true');
                  $part      = $request->post('part');
                  $level     = $request->post('level');
                  $note1     = $request->post('note1');
                  $note2     = $request->post('note2');
                  $note3     = $request->post('note3');
                  $note4     = $request->post('note4');
                  $test      = new Test();
                  $test->question = $question;
                  $test->question_sub = $question_sub;
                  $test->answer1 = $answer1;
                  $test->answer2 = $answer2;
                  $test->answer3 = $answer3;
                  $test->answer4 = $answer4;
                  $test->answer_true = $answer_true;
                  $test->level = $level;
                  $test->part  = $part;
                  $test->note1 = $note1;
                  $test->note2 = $note2;
                  $test->note3 = $note3;
                  $test->note4 = $note4;
                  $test->save();
                  return $this->render('checksave10',['test' => $test]);

               }else{

                   return $this->render('input10');
               }
          
        
      }
      public function actionHome(){
        
         return $this->render('home');

      }

     
      
}