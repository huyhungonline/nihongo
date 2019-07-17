<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Moneysend;
use yii\web\UploadedFile;

class FileController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();
        $money = new Moneysend();
        if (Yii::$app->request->isPost) {

            $request  = Yii::$app->request;
            $money->user_id = 1;
            $money->sender_phone = $request->post('sender_phone');
            $money->sender_email = $request->post('sender_email');
            $money->bank_account = $request->post('bank_account');
            $money->bank_name    = $request->post('bank_name');
            $money->bank_branch  = $request->post('bank_branch');
            $money->receiver     = $request->post('receiver');
            $money->receiver_code             = $request->post('receiver_code');
            $money->receiver_code_address     = $request->post('receiver_code_address');
            $money->receiver_address          = $request->post('receiver_address');
            $money->money_count               = $request->post('money_count');
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $file_name =  $model->imageFile->baseName . uniqid() . '.' . $model->imageFile->extension;
            $money->image_url                 = $file_name;
            if ($model->upload($file_name)&&$money->save()) {
               
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionIndex(){
          
          $exchange_rate = 206;
          return $this->render('index', ['exchange_rate' => $exchange_rate]);
    }

    public function actionStatus(){


          $session = Yii::$app->session;
          $user_id  =  $session->get('id');
          $results  = Yii::$app->db->createCommand("SELECT * FROM `moneysend` WHERE `user_id` = '".$user_id."'")->queryAll();
          return $this->render('status',['results' => $results]);

    }
    public function actionStatus_money(){


          $session = Yii::$app->session;
          $user_id  =  $session->get('id');
          $results  = Yii::$app->db->createCommand("SELECT * FROM `moneysend` WHERE `user_id` = '".$user_id."'")->queryAll();
          return $this->render('status_money',['results' => $results]);

    }

    public function actionMoney_input(){


        $model = new UploadForm();
        $money = new Moneysend();
        if (Yii::$app->request->isPost) {

            $request  = Yii::$app->request;
            $money->user_id = 1;
            $money->sender_phone = $request->post('sender_phone');
            $money->sender_email = $request->post('sender_email');
            $money->bank_account = $request->post('bank_account');
            $money->bank_name    = $request->post('bank_name');
            $money->bank_branch  = $request->post('bank_branch');
            $money->receiver     = $request->post('receiver');
            $money->receiver_code             = $request->post('receiver_code');
            $money->receiver_code_address     = $request->post('receiver_code_address');
            $money->receiver_address          = $request->post('receiver_address');
            $money->money_count               = $request->post('money_count');
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $file_name =  $model->imageFile->baseName . uniqid() . '.' . $model->imageFile->extension;
            $money->image_url                 = $file_name;
            if ($model->upload($file_name)&&$money->save()) {
               
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);

    }
}



?>