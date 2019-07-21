<?php 

use yii\helpers\Url;

?>

    <!-- Content Header (Page header) -->
    <script type="text/javascript">
       jQuery(document).ready(function($) {

           $(".post-form").submit(function(event) {
                event.preventDefault(); // stopping submitting
                var data = $(this).serializeArray();
                var url = $(this).attr('action');
                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: data
                })
                .done(function(response) {

                   if(response.code == 100){

                      window.location.href = "<?php echo Url::toRoute(['/new']); ?>";
                   }
                    
                })
                .fail(function() {
                    console.log("error");
                });
            
            });



           $(".comment-form").submit(function(event) {
                event.preventDefault(); // stopping submitting
                var data = $(this).serializeArray();
                var url = $(this).attr('action');
                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: data
                })
                .done(function(response) {

                   if(response.code == 100){

                      window.location.href = "<?php echo Url::toRoute(['/new']); ?>";
                   }
                    
                })
                .fail(function() {
                    console.log("error");
                });
            
            });
    });
    </script>
    <section class="content-header">
      <h1>
        <p id="date1"></p>
        <small>chào ngày mới</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UI</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Bạn đang nghĩ gì?
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-aqua"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i>16:00</span>

                          <h3 class="timeline-header"><a href="#"> nguyen hung </a></h3>

                          <div class="timeline-body">


                             <form role="form" class="post-form" action="post/create">
                                
                                <!-- textarea -->
                                <div class="form-group">
                                  <label>Viết câu hỏi của bạn?</label>
                                  <textarea class="form-control" rows="3" name="content" placeholder="Enter ..."></textarea>
                                </div>
                                 <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                <div class="timeline-footer">
                                     
                                      <button type="submit" class="btn btn-primary btn-flat btn-xs action_post">Đăng bài</button>
                                </div>
                               
                              </form>


                          </div>
                         
                        </div>
                      </li>
            <?php  foreach ($news as $new) {  ?>

              <?php  if($new['type']==1) { ?>

                      <li>
                        <i class="fa fa-user bg-aqua"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i><?php echo $new['created_at']; ?></span>

                          <h3 class="timeline-header"><a href="#">  <?php echo $new->getpost()[0]->getuser()[0]['username'] ?> </a><?php echo $new['content']; ?></h3>

                          <div class="timeline-body">
                           
                            <?php echo $new->getpost()[0]['content']; ?>
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs"  href="<?php echo Url::toRoute(['post/comment', 'id' => $new['post_id']]); ?>" >Read more</a>
                            <a class="btn btn-warning btn-flat btn-xs" href="<?php echo Url::toRoute(['post/comment', 'id' => $new['post_id']]); ?>">View comment</a>
                            <?php  if((\Yii::$app->user->identity->id == $new->getpost()[0]['user_id']) || (\Yii::$app->user->identity->id == 1)) { ?>
                              <a href="<?php echo Url::toRoute(['post/delete', 'id' => $new['post_id']]); ?>" class="btn btn-danger btn-xs" style="float: right;">Xóa</a>
                            <?php  } ?>
                          </div>
                          <div class="timeline-body">


                             <form role="form" class="comment-form" action="post/createcomment">
                                
                                <!-- textarea -->
                                <div class="form-group">
                                  <label>Bình luận</label>
                                  <input  class="form-control" rows="3" name="content" placeholder="Enter ..."></input>
                                </div>
                                 <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                 <input type="hidden" name="post_id" value="<?php echo $new['post_id']; ?>" />
                                 <input type="hidden" name="user_id" value="<?php echo \Yii::$app->user->identity->id; ?>" />
                                <div class="timeline-footer">
                                     
                                      <button type="submit" class="btn btn-primary btn-flat btn-xs action_post">Đăng bình luận</button>
                                </div>
                               
                              </form>


                          </div>
                        </div>
                      </li>
                <?php } ?>
            <!-- END timeline item -->
            <!-- timeline item -->
                <?php  if($new['type']==3) { ?> 
                            <li>
                              <i class="fa fa-user bg-aqua"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $new['created_at']; ?></span>

                                <h3 class="timeline-header no-border"><a href="#"> <?php echo $new->getuser()[0]['username'] ?></a> đã gửi thư cho bạn</h3>
                              </div>
                            </li>
                  <?php } ?>
            <!-- END timeline item -->
            <!-- timeline item -->
                <?php  if(($new['type']==2)&&($new->getcomment()[0]->getpost()[0]->getuser()[0]['id']==\Yii::$app->user->identity->id)) { ?>
                        <li>
                          <i class="fa fa-comments bg-yellow"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $new['created_at']; ?></span>

                            <h3 class="timeline-header"><a href="#"><?php echo $new->getuser()[0]['username'] ?></a> đã bình luận về bài viết của bạn</h3>

                            <div class="timeline-body">
                             <?php echo $new->getcomment()[0]['content'] ?>
                            </div>
                            <div class="timeline-footer">
                              <a class="btn btn-warning btn-flat btn-xs" href="<?php echo Url::toRoute(['post/comment', 'id' => $new['post_id']]); ?>">View all comment</a>
                            <?php  if((\Yii::$app->user->identity->id == $new['user_id']) || (\Yii::$app->user->identity->id == 1)) { ?>
                              <a href="<?php echo Url::toRoute(['post/deletecomment', 'id' => $new['comment_id']]); ?>" class="btn btn-danger btn-xs" style="float: right;">Xóa</a>
                            <?php  } ?>
                            </div>
                          </div>
                        </li>
                 <?php } ?>
             <?php } ?>
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
