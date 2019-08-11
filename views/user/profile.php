<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
$session = Yii::$app->session;
?>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php $myavatar = "@web/uploads/".Yii::$app->user->identity->avatar;?>
              <img class="profile-user-img img-responsive img-circle" src="<?= Url::to($myavatar)?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $user->username; ?></h3>

              <p class="text-muted text-center">Thành viên</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Điểm 文字・語彙</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Điểm 文法</b> <a class="pull-right">543</a>
                </li>
                
              </ul>

              <a href="<?php echo Url::toRoute(['/user/avatar']); ?>" class="btn btn-primary btn-block"><b>Thay đổi thông tin tài khoản</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

 
        </div>
        <div class="col-md-2"></div>
      </div>