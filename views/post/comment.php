<?php 
use yii\helpers\Url;
?>

    <!-- Content Header (Page header) -->
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
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#"><?php echo $post->getuser()[0]['username'] ?></a> đã viết</h3>

                <div class="timeline-body">
                 <?php  echo $post['content'];  ?> 
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->

            <!-- timeline item -->
            <?php  foreach ($post->getcomment() as  $comment) {
            ?>
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php     echo $comment['created_at'];  ?></span>

                      <h3 class="timeline-header"><a href="#"><?php     echo $comment->getuser()[0]['username'];  ?></a> commented on your post</h3>

                      <div class="timeline-body">
                       <?php     echo $comment['content'];  ?>
                      </div>
                      <div class="timeline-footer"> 
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                         <?php  if((\Yii::$app->user->identity->id == $comment['user_id']) || (\Yii::$app->user->identity->id == 1)) { ?>
                              <a class="btn btn-danger btn-xs" style="float: right;">Xóa</a>
                         <?php  } ?>
                      </div>
                    </div>
                  </li>
            <?php  } ?>
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
