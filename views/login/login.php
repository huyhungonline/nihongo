
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
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="/postlogin" method="post">
        <h2 class="text-center">Login</h2>       
        <div class="form-group">
            <?php   if(isset($errors['email'])) { ?> <a style="color: red;"><?php echo $errors['email'][0]; ?></a> <?php } ?>
            <input type="email" class="form-control" placeholder="Username" name="email" >
        </div>
        <div class="form-group">
            <?php   if(isset($errors['password'])) { ?> <a style="color: red;"><?php echo $errors['password'][0]; ?></a> <?php } ?>
            <input type="password" class="form-control" placeholder="Password" name="password" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox" name="rememberMe"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><?= Html::a('Create an Account', ['register/register'], ['class' => 'profile-link']) ?></p>
</div>
                              		                            