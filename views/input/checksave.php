<?php 

use yii\helpers\Url;

?>

        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Question</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="question" value="<?php echo $test->question;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer1</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer1" value="<?php echo $test->answer1;?>">
                      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer2</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer2" value="<?php echo $test->answer2;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer3</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer3" value="<?php echo $test->answer3;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer4</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer4" value="<?php echo $test->answer4;?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer true</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer_true" value="<?php echo $test->answer_true;?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">level</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="level" value="<?php echo $test->level;?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">part</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="part" value="<?php echo $test->part;?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">giải thích đáp án 1</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="note1" value="<?php echo $test->note1;?>">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">giải thích đáp án 2</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="note2" value="<?php echo $test->note2;?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">giải thích đáp án 3</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="note3" value="<?php echo $test->note3;?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">giải thích đáp án 4</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="note4" value="<?php echo $test->note4;?>">
                  </div>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              
                <a  href="<?php echo Url::toRoute(['/input/input1234']); ?>"><button  class="btn btn-info pull-right">Xác nhận</button></a>
                 <button  class="btn btn-info pull-right"><a  href="<?php echo Url::toRoute(['/input/delete1234', 'id' => $test->id]); ?>">Xóa</a></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
  
          </div>
          <!-- /.box -->
        </div>