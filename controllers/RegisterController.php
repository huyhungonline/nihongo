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
                   $uniqid   = uniqid();
                   if($user->saveData($username,$password,$email,$uniqid)){
                      
                       $this->sendmail($user->email,$uniqid,$user->id);


                       return $this->render('register',['message' => 'Mã xác nhận đã được gửi về mail của bạn, vui lòng kiểm tra mail']);
                      
                   }
                  
              } else {

                  $errors = $model->errors;

                  return $this->render('register',['errors' => $errors]);

              }

        }else{
              
              return $this->render('register');

        }

      }
      
      public function actionCheckcode(){
          
           $request  = Yii::$app->request;
           $uniqid = $request->get('id');
           $user = User::findBySql("SELECT * FROM users where uniqid = '".$uniqid."'")->one();
       
           if($user){

             return $this->redirect(['/login']);

           }else{

               return $this->render('register',['message' => 'Đã xảy ra lỗi, mời bạn đăng kí lại']);
           }

      }
      public function Sendmail($email,$uniqid,$user_id){
         
         $str = "http://localhungbk.com/register/checkcode?id=".$uniqid."&user_id=".$user_id;
         Yii::$app->mailer->compose()
          ->setFrom('nguyenhuyhung.business@gmail.com')
          ->setTo($email)
          ->setSubject('Уведемление с сайта <yourDomain>') // тема письма
          ->setTextBody('Текстовая версия письма (без HTML)')
          ->setHtmlBody("
            <h2 style='color:blue;'>Bạn đã đăng kí tài khoản tại trang newNet.com</h2><br>
            <p>Vui lòng click vào link dưới đây để hoàn tất đăng kí tài khoản</p>
            <a href=".$str.">Click tại đây để xác nhận</a>")
          ->send();
          return 1;
      }

    
}