<style type="text/css">
.navbar-expand-sm {

      background: #F8F8FF;
      width: 100%;

    }
	#username {
		width: 400px;
	}
	#id {
		width: 100px;
		margin-left: 26%;
	}
	#my-form {

		  border: 2px solid red;
          border-radius: 4px;
          padding-top: 5%;
          padding-bottom: 5%;
          background: #f7f7f7;
	}
	.custom-file-input::-webkit-file-upload-button {
          visibility: hidden;
    }
	.custom-file-input::before {
	  content: 'Chọn file tải lên';
	  display: inline-block;
	  background: linear-gradient(top, #f9f9f9, #e3e3e3);
	  border: 1px solid #999;
	  border-radius: 3px;
	  padding: 5px 8px;
	  outline: none;
	  white-space: nowrap;
	  -webkit-user-select: none;
	  cursor: pointer;
	  text-shadow: 1px 1px #fff;
	  font-weight: 700;
	  font-size: 10pt;
	}
	.custom-file-input:hover::before {
	  border-color: black;
	}
	.custom-file-input:active::before {
	  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
	}
	.custom-file-input {

	  display:none;
	}
	.custom-input {
		/*margin-left: 5%;*/
	}
	
</style>
<body style="background-color: #8FBC8F;">
<?php
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


?>
<h1 style="margin-left: 30%"> Chuyển tiền Nhật - Việt </h1>
<?php $form = ActiveForm::begin([
	'id' => 'my-form',
	'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-5',
             'offset' => 'col-sm-offset-3',
		    'label' => 'col-sm-3',
		    'wrapper' => 'col-sm-6',
		    'error' => '',
		    'hint' => 'col-sm-3',
        ],
    ],
    ]) ?>
   
    <?= $form->field($model, 'receiver')->textInput(['id' => 'username','class'=>'custom-input', 'name' => 'receiver'])->label('Họ Tên người nhận') ?>
    <?= $form->field($model, 'receiver_address')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'receiver_address'])->label('Địa Chỉ người nhận') ?>
    <?= $form->field($model, 'receiver_code')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'receiver_code'])->label('Số CMT người nhận') ?>
    <?= $form->field($model, 'receiver_code_address')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'receiver_code_address'])->label('Nơi cấp CMT người nhận') ?>
    <?= $form->field($model, 'bank_account')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'bank_account'])->label('Số TK ngân hàng') ?>
    <?= $form->field($model, 'bank_name')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'bank_name'])->label('Tên ngân hàng') ?>
    <?= $form->field($model, 'bank_branch')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'bank_branch'])->label('Chi nhánh ngân hàng') ?>
    <?= $form->field($model, 'money_count')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'money_count'])->label('Số tiền gửi') ?>
    <?= $form->field($model, 'sender_phone')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'sender_phone'])->label('Số ĐT người gửi') ?>
    <?= $form->field($model, 'sender_email')->textInput(['id' => 'username','class'=>'custom-input',  'name' => 'sender_email'])->label('Email người gửi') ?>
     
    <?= $form->field($model, 'imageFile')->fileInput(['class'=>'custom-file-input'])->label('Upload File') ?>
    
    <?= Html::submitButton('Submit', ['id'  => 'id' ,'class' => 'col-md-5 offset-md-5 btn btn-primary', 'value'=>'create_add', 'name'=>'submit']) ?>
    
<?php ActiveForm::end() ?>
    <div class="row">
    	<h3>Hướng dẫn</h3>
    	<p class="text-sm-left">+Click vào đây để gửi tiền cho người đã có trong lịch sử gửi. <a href="<?php echo Url::toRoute(['status_money']); ?>"><input class="btn-primary" type="button" value ="Lịch sử giao dịch"></a></p>
    	<p class="text-sm-left">+Tỷ giá được áp dụng tại thời điểm gửi.<input class="btn-primary" type="button" value ="Gửi tiền"></p>
    	<p class="text-sm-left">+Hệ thống không nhận quá 50 man 1 lần giao dịch.</p>
    	<p class="text-sm-left">+Mọi thắc mắc liên hệ qua email: huyhungonline@gmail.com hoặc sđt 08048269520.</p>
    	<p class="text-sm-left">+.</p>
    </div>
    <div class="row">
    	<table class="table table-striped w-auto">

  <!--Table head-->
  <thead>
    <tr>
      <th>#</th>
      <th>Số tiền chuyển </th>
      <th>Phí dịch vụ</th>
      <th>Lưu ý</th>
      <th>Thời gian nhận được tiền</th>
     
    </tr>
  </thead>
  <!--Table head-->

  <!--Table body-->
  <tbody>
  	 <tr>
      <th scope="row">1</th>
      <td>1,000 - 30,000</td>
      <td>¥400</td>
      <td>United Kingdom</td>
      <td>London</td>
    
    </tr>
    <tr class="table-info">
      <th scope="row">2</th>
      <td>30,001 - 250,000</td>
      <td>¥1,000</td>
      <td>USA</td>
      <td>New York City</td>
     
    </tr>
   <tr>
      <th scope="row">3</th>
      <td>250,001 - 1,000,000</td>
      <td>¥1,750</td>
      <td>Italy</td>
      <td>Bari</td>
     
    </tr>
   
  </tbody>
  <!--Table body-->


</table>
    </div>
</body>