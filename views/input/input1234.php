        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nhập dữ liệu mondai 1 2 3 4 </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal" method="post"  action="/input/input1234">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Question</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="question" placeholder="question">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer1</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer1" placeholder="answer1">
                      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer2</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer2" placeholder="answer2">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer3</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer3" placeholder="answer3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer4</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer4" placeholder="answer4">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">answer true</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="answer_true" placeholder="answer true">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">level</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="level" placeholder="level">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">part</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="part" placeholder="mondai">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">giải thích đáp án 1</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="note1" >
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">giải thích đáp án 2</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="note2" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">giải thích đáp án 3</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="note3" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">giải thích đáp án 4</label>

                  <div class="col-sm-10">
                    <input  class="form-control" id="inputEmail3" name="note4" >
                  </div>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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