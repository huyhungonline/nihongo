<?php 
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class OrderForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $sender_phone;
    public $sender_email;
    public $receiver;
    public $receiver_code;
    public $receiver_code_address;
    public $receiver_address;
    public $bank_account;
    public $bank_name;
    public $bank_branch;
    public $money_count;
    public $image_url;
    public $status;
    public $note;
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
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