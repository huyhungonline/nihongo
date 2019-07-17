<?php

namespace app\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\RegisterForm;
use app\models\User;
class RegisterController extends Controller
{
	  
      public function actionRegister()
      {
         //$this->layout = 'main';
               
         return $this->render('register');
        
      }

      public function actionPostregister(){
        
         $model = new RegisterForm();
         $user  = new User();
        if (Yii::$app->request->post()){
        
              $request  = Yii::$app->request;
              $username = $request->post('username');
              $email    = $request->post('email');
              $password = $request->post('password');
              if($user->findByUsername($username)){

                    return $this->render('register',['message' => 'username đã được dùng, vui lòng nhập tên khác']);

              }else {
                 if($user->findByEmail($email)){
                     
                     return $this->render('register',['message' => 'email đã được dùng, vui lòng nhập tên khác']);
                 }
              }
              // var_dump($email);die;
              $model->username = $username;
              $model->email    = $email;
              $model->password = $password;
              if ($model->validate()) {
                  
                   $user->username = $username;
                   $user->email    = $email;
                   $user->password = md5($password);
                   if($user->saveData($username,$password,$email)){

                       return $this->redirect(['/login']);
                   }
                  
              } else {

                  $errors = $model->errors;

                  return $this->render('register',['errors' => $errors]);

              }

        }else{
              
              return $this->render('register');

        }

      }

    
}