<?php 
use yii\helpers\Url;
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
　<link rel="stylesheet" href="<?= Url::to('@web/css/home/index.css')?>">
<style type="text/css">
    
body {
    background: #222; 
}



canvas {
   margin-top: 1%;
 
   pointer-events: none;
   
}

</style>
<script type="text/javascript" src="<?= Url::to('@web/js/water_fall.js')?>"></script>
<style type="text/css">
    .container-fluid {

        color: white;

    }
    #waterfall {
        margin-left: 20%;
    }

    .list-group {
        margin-right: 20%;
        margin-top: 10%;
    }
    .main_content {

       margin-right: 20%;
       width: 80%;
       font-size: 15px;
    }
    .title_content {

        margin-top: 10%;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
$('*').bind('cut copy paste contextmenu', function (e) {
    e.preventDefault();
})});

</script>

<body>
    <div class="container-fluid">
    
        <div class="row">
          <div class="col-md-4"><canvas id="waterfall"></canvas></div>
          <div class="col-md-8">
            <div class="row">
                 
                  
                       <div class="col-sm-9">
                        <div style="background-color: ">
                          <h4 class="title_content text-primary"><?php echo $post['title'];?></h4>
                          <p class="main_content text-primary">
                           <?php echo $post['content'];?>

                          </p>
                        </div>
                       </div>
                       <div class="col-sm-3"></div>
                  
                 
            </div>
             
           
          </div>
        </div>
       
   </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

</body>
