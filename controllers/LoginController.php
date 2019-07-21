<?php

namespace app\controllers;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Session;
use app\models\LoginForm;
use app\models\User;
class LoginController extends Controller
{
	  
      public function actionLogin()
      {
        
        
         return $this->render('login');
        
      }

      public function actionPostlogin(){
       
            if (Yii::$app->request->post()){
                
                $model    =  new LoginForm();
                $request  = Yii::$app->request;
               
                $email      = $request->post('email');
                $password   = $request->post('password');
                $rememberMe = $request->post('rememberMe');
                
                $model->email       =  $email;
                $model->password    =  $password;
                $model->rememberMe  =  $rememberMe;
                
                if ($model->validate()) {
                    

                     $user = new User();
                     
                     if($user->login($email,$password)){
                        

                           return $this->redirect(['home/home']);

                     }
                        

                 }else{

                  $errors = $model->errors;
                 
                  return $this->render('login',['errors' => $errors]);
                 }
                    

            }else {
                 
                 return $this->render('login');
           

            }

         
      }

      public function actionLogout() {

         Yii::$app->user->logout();

        return $this->redirect(['/']); 

       }
      
      
    
}