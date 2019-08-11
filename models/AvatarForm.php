<?php 
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class AvatarForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $username;
    public $email;
    public $password;
    public $imageFile;
  

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg'],
        ];
    }
    
    public function upload($file_name)
    {
        if ($this->validate()) {
            
            $this->imageFile->saveAs('uploads/' . $file_name);
            return true;
        } else {
            return false;
        }
    }
}

?>