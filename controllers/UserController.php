<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\User;
use app\models\AvatarForm;
class UserController extends Controller
{
	  
      public function actionIndex()
      {
         // $this->layout = false;
         return $this->render('index');
        
      }

      public function actionAvatar(){
            
            $request  = Yii::$app->request;
            $user_id  = $request->get('id');
            $user     = User::findIdentity($user_id);
            $model = new AvatarForm();
            $email = Yii::$app->user->identity->email;
            if (Yii::$app->request->isPost) {

                 $request  = Yii::$app->request;
                 $user                =  User::findByEmail(Yii::$app->request->post('email'));
            	 $user->username = $request->post('username');  
                 $user->password = md5($request->post('password'));
                 $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                 $file_name =  $model->imageFile->baseName . uniqid() . '.' . $model->imageFile->extension;
                 $user->avatar = $file_name;
                 $connection = Yii::$app->getDb();
                 $result = $connection->createCommand('UPDATE users SET username="'.$user->username.'",password="'.$user->password.'",avatar="'.$file_name.'" WHERE email="'.$email.'"')->execute();
                 if ($model->upload($file_name)&&$result) {
                         
                             return $this->redirect(['/login']);
               
                 }else {

                 	 return $this->render('avatar', ['model' => $model,'email' => $email]);
                 }
                 
            }
         
       
      	 return $this->render('avatar', ['model' => $model,'email' => $email,'user' => $user]);
      }

      public function actionProfile(){
            
           $request  = Yii::$app->request;
           $user_id  = $request->get('user_id');
           $user     = User::findIdentity($user_id);

      	   return $this->render('profile',["user" => $user]);
      }


}