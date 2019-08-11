   <?php
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


?>
      <div class="row">
        <div class="col-md-2">
          
        </div>
        <div class="col-md-8">

          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thay đổi thông tin tài khoản</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $form = ActiveForm::begin([ 
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div id = \"input_id\" class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'name' => 'username']) ?>

                <?= $form->field($model, 'password')->passwordInput(['name' => 'password']) ?>

                <?= $form->field($model, 'imageFile')->fileInput(['class'=>'custom-file-input'])->label('Upload File') ?>
                <?php echo Html::hiddenInput('email', $email); ?>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
          </div>



          <!-- /.box -->
        </div>
        <div class="col-md-2">
          
        </div>
      </div>