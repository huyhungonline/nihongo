<?php 
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;
?>

<!DOCTYPE html>

<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

<style type="text/css">

 .checkbox-inline {
    padding-left:  7%;
    
 }
 .question {
    margin-left: 7%;
    padding-top: 2%;
   
 }


  .navbar-expand-sm {

      background: #F8F8FF;
      width: 100%;

    }
    .btn-primary {

        width: 100px;

    }
    .title {
      margin-left: 7%;
      padding-top: 2%;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
       $(document).ready(function(){
        var ans_true = 0;
        var answer_false = 0;
        var ans_true_click = 0;
       $(".checkbox-inline").click(function(){
           
           var answer      = $(this).children('input').val();

           var answer_true = $(this).parent('div').children('input').val();

        if($(this).parent('div').children('div').data('checked')==0){

                    ans_true_click = 0;
        }
          
          if($(this).children('input').is(':checked')) {

               
                  $(this).parent('div').children('.checkbox-inline').not(this).children('input').prop('checked', false);
                  if(answer == answer_true){
                         
                     if($(this).parent('div').children('div').data('checked')==0){

                              ans_true = ans_true + 1;
                             
                              ans_true_click = 1;
                     }else {
                              if(answer_false > 0){
                                 answer_false = answer_false - 1;
                              }
                              
                               ans_true = ans_true + 1;
                               ans_true_click = 1;
                     }
                       

                        // $("#ans_true").text(ans_true);

                        $(this).find( "p" ).css("color", "green");

                  }else {
                          
                          if($(this).parent('div').children('div').data('checked')==0){

                               answer_false = answer_false + 1;
                            

                          }else{
                           
                           if(ans_true_click == 1){
                                
                                if(ans_true > 0){

                                   ans_true = ans_true - 1;

                                }
                                 
                                  answer_false = answer_false + 1;
                                  ans_true_click = 0;
                           }

                          }
                       
                       
                         $(this).find( "p" ).css("color", "red");
                  }

                  $(this).parent('div').children('div').data('checked',1);

          }else{

                
                 if(answer == answer_true){

                          if(ans_true > 0){

                                   ans_true = ans_true - 1;

                                }
                         

                        //$(this).children('p').css("color", "green");

                  }else {
                         
                        

                              if(answer_false > 0){
                                       answer_false = answer_false - 1;
                                    }
                        
                        // $(this).children('p').css("color", "red");
                  }
                 
                $(this).parent('div').children('div').data('checked',1);
          }

          

       });

       $("#myBtn").click(function(){
           
            $("#result_true").text(ans_true);
            $("#result_false").text(answer_false);
            $("#result").text(2*ans_true);
            $( ".note" ).show();
       });

    });

    
</script>
<style type="text/css">
     .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 200px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      /* Modal Content */
      .modal-content {
       
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        color: green;
      }

      /* The Close Button */
      .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
      }
      #myBtn {
        margin-top: 2%;
        margin-left: 40%;
        width: 200px;
        height: 80px;
      }

      #myModal {

      }

      .text_result {

         margin-left: 35%;
         margin-bottom: 4%;


      }

      #button_start {
        width: 6%;
        display: inline;
        margin-left: 20%;

      }

      #button_pause {
        width: 6%;
      
        display: inline;
      }
       #button_resume {
        width: 6%;
      
        display: inline;
      }
      #demo {
        margin-top: 2%;
      }

      .header_result {
        width: 100%;
        height: 20%;
        background-color:     #FFF8DC;
      }

      .note {
        color: red;
        margin-left: 10%;
      }
      .button_login_to_continute {
         width: 10%;
      }
</style>
<script> 
var t = 60;
var minutes = 90;
var x;
var state = 0;

 function start(){
         clearInterval(x); 
         if(state ==0 || state == 2)
            x = setInterval(function() { 
                  if(state!==2){
                     t = t-1; 
                        if(t<0){

                           minutes = minutes-1;
                           t = 60;
                        }
                       
                        var seconds = t; 
                        if (minutes==0&&seconds==0) {

                           clearInterval(x);

                        }
                        document.getElementById("demo").innerHTML = minutes + ":" + seconds + ""; 
                            if (t < 0) { 
                                clearInterval(x); 
                                document.getElementById("demo").innerHTML = "EXPIRED"; 
                            } 
                  }
                 
        }, 1000);
        state = 1;
 }
 
 function pause(){
  if(state == 1){
    
    state = 2;
  }
 }

 function resume(){
   state = 0;
   clearInterval(x); 
   start();
 }

</script> 

 <script type="text/javascript">
 
     $( document ).ready(function() {

            $( ".mondai1" ).each(function() {

                    var str = $( this ).text();
                    var res = str.replace('(', "<span class='koto_mondai1'>");
                    var res = res.replace(')', "</span>");
                    
                    $( this ).text(res);
            });
     });
 </script>
</head>
<body >
 

<div class="container">
    <div class="row">
    
      <div class="col bg-danger">
            <div class="btn-group">
              <button type="button" onclick="window.location.href='<?php echo Url::toRoute(['test/index', 'level' => 5]); ?>'" class="btn btn-primary">N5</button>
              <button type="button" onclick="window.location.href='<?php echo Url::toRoute(['test/index', 'level' => 4]); ?>'" class="btn btn-primary">N4</button>
              <button type="button" onclick="window.location.href='<?php echo Url::toRoute(['test/index', 'level' => 3]); ?>'" class="btn btn-primary">N3</button>
              <button type="button" onclick="window.location.href='<?php echo Url::toRoute(['test/index', 'level' => 2]); ?>'" class="btn btn-primary">N2</button>
              <button type="button" onclick="window.location.href='<?php echo Url::toRoute(['test/index', 'level' => 1]); ?>'" class="btn btn-primary">N1</button>
            </div>
      </div>
      
        <h3 style="display: inline;">N<?php echo $level; ?></h3><h3 style="display: inline;margin-left: 35%;color: green;" id="demo"></h3> 
        <button onclick="start()"  id="button_start"  class="btn btn-success">Start</button>
        <button onclick="pause()"  id="button_pause"  class="btn btn-warning">Pause</button>
        <button onclick="resume()" id="button_resume" class="btn btn-danger">Resume</button>
         <?php if(Yii::$app->user->isGuest) { ?>

            <a href="<?php echo Url::toRoute(['site/login']); ?>" class="btn btn-info btn-lg">
              <span class="glyphicon glyphicon-forward"></span> Login để làm đề khác
            </a>

          <?php }else { ?>

             <a  href="<?php echo Url::toRoute(['test/index', 'level' => $level]); ?>"  class="btn btn-info btn-lg">
              <span class="glyphicon glyphicon-forward"></span> Làm đề khác
            </a>
           
          <?php } ?>
       <div class="col-11 bg-infor " style="background-color:#B0C4DE;color: black">
              <h1 style="margin-left: 35%;margin-top: 1%">文字・語彙</h1>
            <h4 class="title">問題1___のことばの読み方として最もよいものを、1・2・3・4から一つえらびなさい。</h4>
            <?php  $i = 1; foreach($part1 as $p1) { ?>
  
            <div class="question" >
               <h4 class="mondai1">Câu:<?php echo $i; ?> <?php echo $p1['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p1['answer1']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p1['note1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p1['answer2']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p1['note2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p1['answer3']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p1['note3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p1['answer4']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p1['note4']; ?></p></label>
                <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p1['answer_true']; ?>">
               </div>
            </div>
            <?php $i++; } ?>
             <h4 class="title">問題2 ___のことばを漢字で書くとき、最もよいものを、1・2・3・4から一つえらびなさい。</h4>
              <?php  $i = 1; foreach($part2 as $p2) { ?>
  
            <div class="question" >
               <h4>Câu:<?php echo $i; ?> <?php echo $p2['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p2['answer1']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p2['note1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p2['answer2']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p2['note2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p2['answer3']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p2['note3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p2['answer4']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p2['note4']; ?></p></label>
                <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p2['answer_true']; ?>">
               </div>
            </div>
            <?php $i++; } ?>
             <h4 class="title">問題3 ( )に入れるのに最もよいものを、1・2・3・4から一つえらびなさい。</h4>
              <?php  $i = 1; foreach($part3 as $p3) { ?>
  
            <div class="question" >
               <h4>Câu:<?php echo $i; ?> <?php echo $p3['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p3['answer1']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p3['note1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p3['answer2']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p3['note2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p3['answer3']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p3['note3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p3['answer4']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p3['note4']; ?></p></label>
                <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p3['answer_true']; ?>">
               </div>
            </div>
            <?php $i++; } ?>
             <h4 class="title">問題4___に意味が最も近いものを、1・2・3・4から一つえらびなさい。</h4>
              <?php  $i = 1; foreach($part4 as $p4) { ?>
  
            <div class="question" >
               <h4>Câu:<?php echo $i; ?> <?php echo $p4['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p4['answer1']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p4['note1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p4['answer2']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p4['note2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p4['answer3']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p4['note3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p4['answer4']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p4['note4']; ?></p></label>
                <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p4['answer_true']; ?>">
               </div>
            </div>
            <?php $i++; } ?>
             <h4 class="title">問題5 ＿＿の言葉に意味が最も近いものを、1・2・3・4から一つ選びなさい。</h4>
              <?php  $i = 1; foreach($part5 as $p5) { ?>
  
            <div class="question" >
               <h4>Câu:<?php echo $i; ?> <?php echo $p5['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p4['answer1']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p5['note1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p4['answer2']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p5['note2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p4['answer3']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p5['note3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p4['answer4']; ?></p>
                 <p hidden class="note" style="color: red;"><?php echo $p5['note4']; ?></p></label>
                <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p5['answer_true']; ?>">
               </div>
            </div>
            <?php $i++; } ?>

             <h4 class="title">問題6 次の言葉の使い方として最もよいものを、1・2・3・4から一つ選びなさい。</h4>
              <?php  $i = 1; foreach($part6 as $p6) { ?>
  
            <div class="question" >
               <h4>Câu:<?php echo $i; ?> <?php echo $p6['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p6['answer1']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p6['answer2']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p6['answer3']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p6['answer4']; ?></p></label><br>
                <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p6['answer_true']; ?>">
               </div>
            </div>
            <?php $i++; } ?>
              <a href="<?php echo Url::toRoute(['test/home', 'level' => 3]); ?>" style="margin-left: 35%;margin-bottom: 1%" class="btn btn-danger btn-lg">
                     <span class="glyphicon glyphicon-hand-right"></span> Click để làm tiếp phần đọc hiểu
              </a> 
            </div>


       </div>
                <button id="myBtn" class="btn btn-primary"><h1>結果</h1></button>

                <div id="myModal" class="modal">

                  <div class="modal-content bg-success">
                    <span class="close">&times;</span>
                    
                      <h1 class="text_result">テスト結果</h1>
                   
                    <div class="header_result">
                        <h2 class="text_result" style="display: inline;"><span class="glyphicon glyphicon-thumbs-up"></span>    正解:</h2><h2 style="display: inline;margin-left: 5%;" id="result_true"></h2><br>
                        <h2 class="text_result" style="display: inline;"><span class="glyphicon glyphicon-thumbs-down"></span>  不正解:</h2><h2 style="display: inline;margin-left: 1.5%;color: red;" id="result_false"></h2><br>
                        <h2 class="text_result" style="display: inline;"> <span class="glyphicon glyphicon-hand-right"></span>  点数:</h2><h2 style="display: inline;margin-left: 5%" id="result"></h2>
                     </div>
                      <?php if(Yii::$app->user->isGuest) { ?>

                          <a href="<?php echo Url::toRoute(['site/login']); ?>" class="btn btn-danger btn-lg" style="margin-left: 35%">
                            <span class="glyphicon glyphicon-forward"></span> Login để làm đề khác
                          </a>

                       <?php } ?>
                  </div>

                </div>
<script>
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
</script>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- <canvas id="canvas">
</canvas> -->
</body>
</html>