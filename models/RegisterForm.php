<?php

namespace app\models;

use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['username', 'required', 'message' => 'Xin vui lòng nhập username'],
         
            ['email', 'required', 'message' => 'Xin vui lòng nhập email'],
           
            ['username', 'required', 'message' => 'Xin vui lòng nhập password'],
            ['email', 'email','message' => 'Email không đúng định dạng '],
        ];
    }
}

?>