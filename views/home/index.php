
 <?php
use yii\helpers\Url;
?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <style type="text/css">
    .cont {
      width: 90%;
    }

    #text1 {
      margin-top: 1%;
      margin-bottom: 2%;
    }

    .navbar-expand-sm {

      background: #F8F8FF;
      width: 100%;

    }
    
    .table tbody tr td {
       width: 1%;

    }

    .post{
       width: 57%;
       min-height: 200px;
       padding: 5px;
       border: 1px #7FFF00;
       margin-bottom: 15px;
    }

    #login_button {
       margin-bottom: 3%;
       margin-left: 10%;
    }

    
  </style>
  <script type="text/javascript">
      function login() {

         location.href = "http://localhungbk.com/login";

      }

  </script>
</head>
<body>

<div class="cont">
 
 
  <div id="text1">
    <h1></h1><h3>業務支援</h3>
    
  </div>
  <ul class="nav nav-tabs">
    <li class="active"><a  data-toggle="tab"  href="#home">Bài mẫu</a></li>
    <li >  <a  data-toggle="tab"  href="#menu2">Bài mới</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Bài 1 </h3> 
      <audio controls>
          <source src="<?= Url::to('@web/assets/lesson_1000/mp3/file1.mp3')?>" type="audio/mpeg">
          Your browser does not support the audio element.
      </audio>
      <button onclick="login()" class="btn btn-success" id="login_button">Login để học tiếp<span class="glyphicon glyphicon-play"></span></button>
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
                foreach ($post as $p) {
              ?>
                 
                  <tr class="success">
                    <td><?php echo $p['nihongo'];?></td>
                    <td>Doe</td>
                    <td><?php echo $p['vietnamese'];?></td>
                  </tr>
              <?php  } ?>
              </tbody>
  　　　　　　　</table>
      </div>
      
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Bài mới</h3>
       <p></p>
    </div>
    
   
  </div>
</div>
<section class="rain"></section>