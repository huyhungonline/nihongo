<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<style type="text/css">
	ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}
.order{
	margin-top: 1%;
	padding-bottom: 2%;
}

.img_class {

	 width: 100%;
	 height: 100%;
	 float: left;
}
.infor {
	margin-top: 2%;
	padding-top: 1%;
	color: #006400;

}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript">
	  $(document).ready(function(){
           
             $(".order").each(function() {
                    
                    var status      = $(this).children('input').val();
                    var i = 0;
                    $(this).children('ol').children('li').each(function() {
                           
                      if(i<status){
                        
                         $(this).addClass('progtrckr-done');
                         
                      }else{

                         $(this).addClass('progtrckr-todo');
                      }
                      
                      i++;

                    });


             });

	   });

</script>
<body>
	<div class="row">
	
      <div class="col-md-12">
      <?php   foreach ($results as $result) { ?>
        <div style="background-color: #8FBC8F;">
	      	<div class="row infor">
	      			<div class="col-md-2">
	      			<?php echo Html::img('@web/assets/img/a1.jpg', ['class' => 'img_class']); ?>
	      		    </div>
		      		<div class="col-md-6">
		      			<h4>Mặt hàng: Điện thoại thông minh</h4>
		      			<h4>Ngày đặt: 16/6/2019</h4>
		      			<h4>Người nhận: Phạm Thị Huyền Trang</h4>
		      		</div>
	      	</div>
	      		
	      	<div class="order">
	      		
	      		<input type="hidden" id="status" value="<?php echo  $result['status']  ?>">
				<ol class="progtrckr" data-progtrckr-steps="5">
				    <li >Chờ xác nhận</li>
				    <li >Đã xác nhận</li>
				    <li >Đang đợi chuyển khoản</li>
				    <li >Đã chuyển khoản</li>
				    <li >Hoàn tất</li>
				</ol>
	      	</div>
      	</div>
	<?php } ?>
	 </div>
	
	</div>
</body>
