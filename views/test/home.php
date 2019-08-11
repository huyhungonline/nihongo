<?php 
use yii\helpers\Url;
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
    margin-left: 15%;
    padding-top: 2%;
   
 }

 .row {

   
 }
  .navbar-expand-sm {

      background: #F8F8FF;
      width: 100%;

    }
    .btn-primary {

        width: 100px;

    }
    .title {
      margin-left: 15%;
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
                 
                $(this).parent('div').children('div').data('checked',0);
          }

            

       });

       $("#myBtn").click(function(){
             
                var s = 2*ans_true;
                $.ajax({
                     url: '<?php echo Yii::$app->request->baseUrl. '/test/savescore' ?>',
                     type: 'post',
                     data: {
                               score: s, 
                               type : 2,
                              _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
                           },
                     success: function (data) {
                        alert(data.score);
                     }
                });

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

      .question_main {

           padding:20px 20px 20px 20px;
           background-color: #A9A9A9;
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

</head>
<body >
 

<div class="container">
  <br>
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

             <a href="<?php echo Url::toRoute(['test/index', 'level' => $level]); ?>" class="btn btn-info btn-lg">
              <span class="glyphicon glyphicon-forward"></span> Làm đề khác
            </a>

          <?php } ?>
       <div class="col-11 bg-infor " style="background-color:#B0C4DE;color: black">

              <h1 style="margin-left: 35%">言語知識(文法)・読解</h1>
            <h4 class="title">問題7 次の文の( ) に入れるのに最もよいものを1・2・3・4から一つ選びなさい。</h4>
              <?php  $i = 1; foreach($part7 as $p7) { ?>
  
            <div class="question" >
               <h4>Câu:<?php echo $i; ?> <?php echo $p7['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p7['answer1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p7['answer2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p7['answer3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p7['answer4']; ?></p></label>
                 <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p7['answer_true']; ?>">
               </div>
            </div>
            <?php $i++; } ?>
            <h4 class="title">問題8 次の文の__★__に入る最もよいものを1・2・3・4から一つ選びなさい。</h4>
              <?php  $i = 1; foreach($part8 as $p8) { ?>
  
            <div class="question" >
               <h4>Câu:<?php echo $i; ?> <?php echo $p8['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p8['answer1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p8['answer2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p8['answer3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p8['answer4']; ?></p></label>
                 <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p8['answer_true']; ?>">
               </div>
            </div>
            <?php $i++; } ?>
            <h4 class="title">問題9 次の文章を読んで、文章全体の内容を考えて、(50)から(54)の中に入る最もよいものを1・2・3・4から一つ選びなさい。</h4>

                <div style="margin-left: 15%;width: 80%;">
                    <h4 class="question_main"><?php echo $part9['question'];?></h4>
                </div>
               
            <div class="question" >
               <h4>50)</h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p9_q1['ans1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p9_q1['ans2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p9_q1['ans3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p9_q1['ans4']; ?></p></label>
                 <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p9_q1['ans_true']; ?>">
               </div>
            </div>
              <div class="question" >
               <h4>51)</h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p9_q2['ans1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p9_q2['ans2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p9_q2['ans3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p9_q2['ans4']; ?></p></label>
                 <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p9_q2['ans_true']; ?>">
               </div>
            </div>
              <div class="question" >
               <h4>52)</h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p9_q3['ans1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p9_q3['ans2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p9_q3['ans3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p9_q3['ans4']; ?></p></label>
                 <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p9_q3['ans_true']; ?>">
               </div>
            </div>
              <div class="question" >
               <h4>53)</h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p9_q4['ans1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p9_q4['ans2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p9_q4['ans3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p9_q4['ans4']; ?></p></label>
                 <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p9_q4['ans_true']; ?>">
               </div>
            </div>
              <div class="question" >
               <h4>54)</h4>
               <div data-checked="0">
                 <label class="checkbox-inline"><input type="checkbox" value="1"><p><?php echo $p9_q5['ans1']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><p><?php echo $p9_q5['ans2']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><p><?php echo $p9_q5['ans3']; ?></p></label>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><p><?php echo $p9_q5['ans4']; ?></p></label>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p9_q5['ans_true']; ?>">
               </div>
            </div>
                    
           <h4 class="title">問題10 つぎの(1)から(4)の文(ぶん)章(しょう)を読んで、質問に答えなさい。1. 答えは、 1・2・3・4から最もよいものを一つえらびなさい。</h4>
            <?php  $i = 1; foreach($part10 as $p10) { ?>
  
            <div class="question" >
               
                <div style="width: 90%;">
                    <h4 class="question_main" ><?php echo $p10['question'];?></h4>
                </div><br>
               <h4> <?php echo $p10['question_sub'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><h4><p><?php echo $p10['answer1']; ?></p></h4></label><br>
                 <label class="note" hidden ><p><?php echo $p10['note1']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><h4><p><?php echo $p10['answer2']; ?></p></h4></label><br>
                 <label class="note" hidden ><p><?php echo $p10['note2']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><h4><p><?php echo $p10['answer3']; ?></p></h4></label><br>
                 <label class="note" hidden ><p><?php echo $p10['note3']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><h4><p><?php echo $p10['answer4']; ?></p></h4></label><br>
                 <label class="note" hidden ><p><?php echo $p10['note4']; ?></p></label><br>
                 <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $p10['answer_true']; ?>">
               </div>
            </div>

            <?php $i++; } ?>

            <h4 class="title">問題10 つぎの(1)から(4)の文(ぶん)章(しょう)を読んで、質問に答えなさい。1. 答えは、 1・2・3・4から最もよいものを一つえらびなさい。</h4>
            <?php  $i = 1; foreach($mondai_list as $ml) { ?>
  
            <div class="question" >
               
                <div style="width: 90%">
                    <h4 class="question_main" ><?php echo $ml['content'];?></h4>
                </div><br><?php  $questions = $ml->getMondaisub();?>

               <?php foreach ($questions as $q) { ?>
               <h4> <?php echo $q['question'];?></h4>
               <div>
                 <label class="checkbox-inline"><input type="checkbox" value="1"><h4><p><?php echo $q['ans1']; ?></p></h4></label><br>
                 <label class="note" hidden ><p><?php echo $q['note1']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="2"><h4><p><?php echo $q['ans2']; ?></p></h4></label><br>
                 <label class="note" hidden ><p><?php echo $q['note2']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="3"><h4><p><?php echo $q['ans3']; ?></h4></p></label><br>
                 <label class="note" hidden ><p><?php echo $q['note3']; ?></p></label><br>
                 <label class="checkbox-inline"><input type="checkbox" value="4"><h4><p><?php echo $q['ans4']; ?></h4></p></label><br>
                 <label class="note" hidden ><p><?php echo $q['note4']; ?></p></label><br>
                 <div data-checked = "0"></div>
                 <input type="hidden" class="answer_true" name="answer_true" value="<?php echo $q['ans_true']; ?>">
               </div>
             <?php } ?>
            </div>

            <?php $i++; } ?>

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

</body>
</html>