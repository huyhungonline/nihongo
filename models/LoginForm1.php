<?php

namespace app\models;

use yii\base\Model;
use Yii;
class LoginForm extends Model
{
    public $rememberMe = true;
    public $email;
    public $password;
    private $_user = false;
    public function rules()
    {
        return [
           
            ['email', 'required', 'message' => 'Xin vui lòng nhập email'],
            ['password', 'required', 'message' => 'Xin vui lòng nhập password'],
            ['email', 'email', 'message' => 'Xin vui lòng nhập đúng định dạng email '],
        ];
    }

   public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }


   public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }


   public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findIdentityByUserName($this->email);
        }

        return $this->_user;
    }

}

?>