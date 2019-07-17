<?php 
use yii\helpers\Url;
use yii\widgets\LinkPager;

foreach ($audio as $au) {

    $url = '@web/assets/lesson_1000/mp3/'.$au->url;
    $sentences = $au->getSentences($au->id);

}



?>

  <style type="text/css">
    .container {
      width: 90%;
    }

    #text1 {
      margin-top: 5%;
      margin-bottom: 2%;
    }

    .navbar-expand-sm {

      background: #F8F8FF;
      width: 100%;

    }

    #login_button {
       margin-bottom: 3%;
       margin-left: 10%;
    }
  </style>
  <script type="text/javascript">
    function luyende() {

        location.href = "http://localhungbk.com/test/index?level=3";
     
    }
       function login() {

         location.href = "http://localhungbk.com/login";

      }

  </script>
  <body>

<div class="container">
 
 
  <div id="text1">
    <h1></h1><h3>学習支援</h3>
    
  </div>
 

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Bài 1 </h3> 
      <audio controls>
          <source src="<?= Url::to($url)?>" type="audio/mpeg">
          Your browser does not support the audio element.
      </audio>
      <?php   if(!Yii::$app->user->isGuest) { ?>
             <button onclick="luyende()" class="btn btn-success" id="login_button">Luyện đề thần tốc<span class="glyphicon glyphicon-play"></span></button>
      <?php }else { ?>
             <button onclick="login()" class="btn btn-success" id="login_button">Login để học tiếp<span class="glyphicon glyphicon-play"></span></button>
      <?php } ?>
      <div  class="post" >
          <table class="table">
              <thead>
                <tr>
                  <th>Câu mẫu</th>
                  <th>Phiên âm</th>
                  <th>Dịch tiếng Việt</th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($sentences as $sentence) {
              ?>
                 
                  <tr class="success">
                    <td><?php echo $sentence['nihongo'];?></td>
                    <td>Doe</td>
                    <td><?php echo $sentence['vietnamese'];?></td>
                  </tr>
              <?php  } ?>
              </tbody>
  　　　　　　　</table>
              <?php  
                if(!Yii::$app->user->isGuest) {
          				echo LinkPager::widget([
          				    'pagination' => $pages,
          				]);
                }
             ?>
      </div>
      
    </div>
  </div>
</div>
