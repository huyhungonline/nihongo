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
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

　　　　<link rel="stylesheet" href="<?= Url::to('@web/css/home/index.css')?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
       #logout_form {

           margin-top: 25%;
           color: green;
       }
      
    </style>
    <script type="text/javascript">
      function logout() {
         $( "#logout_form" ).submit();
      }
    </script>
</head>
<body>
 <div>
     <nav class="navbar  navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">

           <ul class="nav navbar-nav navbar-right" style="margin-right: 5%">
            
              <li><a href="<?php echo Url::toRoute(['home/home']); ?>"><span class="glyphicon glyphicon-list-alt"></span> Trang chủ</a></li>
              <?php if(Yii::$app->user->isGuest) { ?>
              <li><a href="<?php echo Url::toRoute(['register/register']); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="<?php echo Url::toRoute(['site/login']); ?>"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>

             <?php }else { ?>
             
              <li><a href="<?php echo Url::toRoute(['test/index', 'level' => 3]); ?>"><span class="glyphicon glyphicon-list-alt"></span> Trắc nghiệm tiếng nhật</a></li>
              <li><a href="<?php echo Url::toRoute(['sentence/index', 'page' => 1, 'per-page' => 1]); ?>"><span class="glyphicon glyphicon-list-alt"></span> Mẫu câu tiếng nhật</a></li>
              <li>
                 
                    <a  href="<?php echo Url::toRoute(['site/login']); ?>" type="button" id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Seting
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#"></a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Profile</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Account</a></li>
                     
                    </ul>
                
              </li>
              <li>


                <form id="logout_form" action="<?php echo Url::toRoute(['site/logout']); ?>" method="post">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                   <p onclick="logout()"><span class="glyphicon glyphicon-off"></span> Logout</p>
                </form>
               
              </li>
             <?php } ?>
          </ul>
        </div>
     </nav>
  </div>
<div class="wrap">
    
    
    <div class="container">
      
        <?= $content ?>

    </div>
</div>

