
<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
  <style type="text/css">
    .container {
      width: 80%;
    }

    #text1 {
      margin-top: 5%;
      margin-bottom: 2%;
    }

    .navbar-expand-sm {

      background: #F8F8FF;
      width: 100%;

    }

    .list-group {

      margin-top: 5%;
    }

    .shimei {

      margin-top: 5%;
    }
  </style>
  
  <style>
     /* body {
        background: linear-gradient(#000, #151515);
      }*/

      canvas {
      position:absolute;
      top:0;
      left:0;
      width:100%;
      height:100%;
      pointer-events: none;
      }

      .img_class {

        width: 100%;
        height: 50%;
      }
</style>
<script type="text/javascript" src="<?= Url::to('@web/js/samset.js')?>"></script>
</head>
<body>

<div class="container">
      
       <div class="row">
            <div class="col-2 col-md-4"><?php echo Html::img('@web/assets/img/a1.jpg', ['class' => 'img_class']); ?></div>
            <div class="col-2 col-md-4"><?php echo Html::img('@web/assets/img/a2.jpg', ['class' => 'img_class']); ?></div>
            <div class="col-2 col-md-4"><?php echo Html::img('@web/assets/img/a3.jpg', ['class' => 'img_class']); ?></div>
      </div>
      
      <div class="content_list">
          <div class="row" >
              <div class="col-md-6">
               
                <div class="list-group">
                  <?php if(Yii::$app->user->isGuest) { ?>
                    <a href="<?php echo Url::toRoute(['test/index','level'=>3,'jlpt'=>'thi trắc nghiệm JLPT online']); ?>" class="list-group-item list-group-item-success">
                      <h4 class="list-group-item-heading">1000 Đề trắc nghiệm tiếng Nhật/1000日本語の宿題</h4>
                      <p class="list-group-item-text">Với số lượng thư viện câu hỏi phong phú, các dạng câu hỏi sát với đề thi JLPT, trang thi thử JLPT sẽ giúp các bạn mau chóng nâng cao được khả năng làm đề và bổ sung các kiến thức còn trống.</p>
                    </a>
                    <a href="<?php echo Url::toRoute(['sentence/index', 'page' => 1, 'per-page' => 1]); ?>" class="list-group-item  list-group-item-info">
                      <h4 class="list-group-item-heading">2000 mẫu câu (giọng người Nhật đọc)/日本語リスニング練習</h4>
                      <p class="list-group-item-text">Sách điện tử 2000 câu mẫu tiếng Nhật được người bản xứ đọc sẽ giúp các bạn nhanh chóng nâng cao năng lực phần nghe và đồng thời tăng kĩ năng viết cho các bạn.</p>
                    </a>

                  <?php }else { ?>

                     <a href="<?php echo Url::toRoute(['test/index','level'=>3,'jlpt'=>'thi trắc nghiệm JLPT online']); ?>" class="list-group-item list-group-item-success">
                      <h4 class="list-group-item-heading">1000 Đề trắc nghiệm tiếng Nhật/1000日本語の宿題</h4>
                      <p class="list-group-item-text">Với số lượng thư viện câu hỏi phong phú, các dạng câu hỏi sát với đề thi JLPT, trang thi thử JLPT sẽ giúp các bạn mau chóng nâng cao được khả năng làm đề và bổ sung các kiến thức còn trống.</p>
                    </a>
                    <a href="<?php echo Url::toRoute(['sentence/index', 'page' => 1, 'per-page' => 1]); ?>" class="list-group-item  list-group-item-info">
                      <h4 class="list-group-item-heading">2000 mẫu câu (giọng người Nhật đọc)/日本語リスニング練習</h4>
                      <p class="list-group-item-text">Sách điện tử 2000 câu mẫu tiếng Nhật được người bản xứ đọc sẽ giúp các bạn nhanh chóng nâng cao năng lực phần nghe và đồng thời tăng kĩ năng viết cho các bạn.</p>
                    </a>

                  <?php } ?>
                 
                  <a href="<?php echo Url::toRoute(['new/index', 'page' => 1, 'per-page' => 1]); ?>" class="list-group-item list-group-item-warning">
                    <h4 class="list-group-item-heading">Suối tiên</h4>
                    <p class="list-group-item-text">Nhưng câu chuyện hay về cuộc sống</p>
                  </a>
                   <a href="<?php echo Url::toRoute(['sendmoney/index']); ?>" class="list-group-item list-group-item-success">
                    <h4 class="list-group-item-heading">Chuyển tiền Nhật Việt</h4>
                    <p class="list-group-item-text">An toàn, Uy tín, Nhanh chóng</p>
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="row shimei">
                    <div class="col-sm-1">
                      <a href="">
                        
                        <?php echo Html::img('@web/assets/img/home_icon.png', ['class' => 'media-object']); ?>
                        
                      </a>
                    </div>
                    <div class="col-sm-11" style="">
                      <h4 class="media-heading" style="">Sứ mệnh của chúng tôi/私たちの使命</h4>
                       Xin chào! Chúng tôi là nhóm cựu sinh viên Đại học Bách Khoa Hà Nội, hiện tại chúng tôi đang học tập và làm việc tại thành phố Tokyo,   Nhật Bản.Trong quá trình học tiếng Nhật, thấy nhiều bạn còn khá lúng túng và gặp nhiều khó khăn trong việc luyện tập và làm quen với các dạng đề trong kì thi JLPT.Do vậy chúng tôi lập ra XXX với mong muốn đồng hành cùng các bạn trên con đường chinh phục Dất nước Mặt trời mọc.Hãy chia sẻ các bài học trên trang web để ủng hộ cho nhóm mình nhé!
                    </div>
                  </div>
              </div>
          </div>
     </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- <canvas id="canvas">
</canvas> -->
