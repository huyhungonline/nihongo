<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\User;
use app\models\Post;
use app\models\Comment;
use app\models\NewC;
use yii\db\Query;
class PostController extends Controller
{
	 
    
      
      public function actionCreate(){
             
             $request = Yii::$app->request;
             
              // $content  = $request->post('content');
              //  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
              //  return [
              //          'search' => $content,
              //          'code' => 100,
              //  ];
               if (Yii::$app->request->post()) { 
                 
                  $content  = $request->post('content');
                  $post = new Post();
                  $post->user_id = \Yii::$app->user->identity->id;
                  $post->content = $content;
                  $post->save();
                  $new = new NewC();
                  $new->post_id = $post->id;
                  $new->content = "đã đăng bài viết mới";
                  $new->type    = 1;
                  $new->save();
                  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                      return [
                       'content' => $content,
                       'code' => 100,
                   ];
               }
           

      }

      public function actionCreatecomment(){
             
             $request = Yii::$app->request;
             
              // $content  = $request->post('content');
              //  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
              //  return [
              //          'search' => $content,
              //          'code' => 100,
              //  ];
               if (Yii::$app->request->post()) { 
                 
                  $content  = $request->post('content');
                  $post_id  = $request->post('post_id');
                  $comment = new Comment();
                  $comment->user_id = \Yii::$app->user->identity->id;
                  $comment->post_id = $post_id;
                  $comment->content = $content;
                  $comment->save();
                  $new = new NewC();
                 
                  $new->comment_id = $comment->id;
                  $new->user_id =\Yii::$app->user->identity->id;
                  $new->content = "đã bình luận về bài viết";
                  $new->type    = 2;
                  $new->save();
                  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                      return [
                       'content' => $content,
                       'code' => 100,
                   ];
               }
           

      }

      public function actionDelete(){
             
             $transaction = Yii::$app->db->beginTransaction();
             try {
                
                      $request  = Yii::$app->request;
                      $post_id    = $request->get('id');
                      $post = Post::findBySql('SELECT * FROM posts where id ='.$post_id)->one();
                      $new = NewC::findBySql('SELECT * FROM news where post_id ='.$post_id)->one();
                      $new->delete();
                      $post->delete();
                      $comments = Comment::findBySql('SELECT * FROM comments where post_id ='.$post_id)->all();
                      foreach ($comments as $comment) {
                         $new = NewC::findBySql('SELECT * FROM news where comment_id ='.$comment->id)->one();
                         $new->delete();
                         $comment->delete();
                      }

                      $transaction->commit();
                      return $this->redirect(['/new']);

             }catch(Exception $e){

                      $transaction->rollBack();
                      printf($e->message);
             }



      }

      
      public function actionComment()
      {
         // $this->layout = false;
         $request  = Yii::$app->request;
         $post_id    = $request->get('id');
         $post = Post::findBySql('SELECT * FROM posts where id ='.$post_id)->one();
         // var_dump($post->getcomment());die;
         return $this->render('comment',[
                'post' => $post
            ]);
        
      }
      
}