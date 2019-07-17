<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

?>
<style type="text/css">
    body{
        color: #fff;
        background: #63738a;
        font-family: 'Roboto', sans-serif;
    }
    .form-control{
        height: 40px;
        box-shadow: none;
        color: #969fa4;
    }
    .form-control:focus{
        border-color: #5cb85c;
    }
    .form-control, .btn{        
        border-radius: 3px;
    }
    .signup-form{
        width: 400px;
        margin: 0 auto;
        padding: 30px 0;
        background-color:#FAEBD7;
    }
    .signup-form h2{
        color: #636363;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }
    .signup-form h2:before, .signup-form h2:after{
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        top: 50%;
        z-index: 2;
    }   
    .signup-form h2:before{
        left: 0;
    }
    .signup-form h2:after{
        right: 0;
    }
    .signup-form .hint-text{
        color: #999;
        margin-bottom: 30px;
        text-align: center;
    }
    .signup-form form{
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
       
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form .form-group{
        margin-bottom: 20px;
    }
    .signup-form input[type="checkbox"]{
        margin-top: 3px;
    }
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;      
        min-width: 140px;
        outline: none !important;
    }
    .signup-form .row div:first-child{
        padding-right: 10px;
    }
    .signup-form .row div:last-child{
        padding-left: 10px;
    }       
    .signup-form a{
        color: #fff;
        text-decoration: underline;
    }
    .signup-form a:hover{
        text-decoration: none;
    }
    .signup-form form a{
        color: #5cb85c;
        text-decoration: none;
    }   
    .signup-form form a:hover{
        text-decoration: underline;
    }  
     .navbar-expand-sm {

      background: #F8F8FF;
      width: 100%;

    }
</style>
</head>
<body>
<div class="signup-form">
    <form action="/postregister" method="post">
        <h2>Đăng kí</h2>
          <?php   if(isset($message)) { ?> <a style="color: red;"><?php echo $message; ?></a> <?php } ?>
         <div class="form-group">
            <?php   if(isset($errors['username'])) { ?> <a style="color: red;"><?php echo $errors['username'][0]; ?></a> <?php } ?>
            <input type="" class="form-control" name="username" placeholder="Username" >
        </div>
        <div class="form-group">
            <?php   if(isset($errors['email'])) { ?> <a style="color: red;"><?php echo $errors['email'][0]; ?></a> <?php } ?>
            <input  class="form-control" name="email" placeholder="Email" >
        </div>
        <div class="form-group">
            <?php   if(isset($errors['password'])) { ?> <a style="color: red;"><?php echo $errors['password'][0]; ?></a> <?php } ?>
            <input type="password" class="form-control" name="password" placeholder="Password" >
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" >
        </div>        
         <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
    <div class="text-center">Already have an account? <?= Html::a('Login', ['site/login'], ['class' => 'profile-link']) ?></div>
</div>
</body>
</html>                            