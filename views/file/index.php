<?php
use yii\helpers\Url;
?>
<style type="text/css">
  .navbar-expand-sm {

      background: #FFE4E1;
      width: 100%;

    }
	#username {
		width: 400px;
	}
	#id {
		width: 100px;
		margin-left: 26%;
	}
	#my-form {

		  border: 2px solid red;
          border-radius: 4px;
          padding-top: 5%;
          padding-bottom: 5%;
          background: #f7f7f7;
	}
	.custom-file-input::-webkit-file-upload-button {
          visibility: hidden;
    }
	.custom-file-input::before {
	  content: 'Chọn file tải lên';
	  display: inline-block;
	  background: linear-gradient(top, #f9f9f9, #e3e3e3);
	  border: 1px solid #999;
	  border-radius: 3px;
	  padding: 5px 8px;
	  outline: none;
	  white-space: nowrap;
	  -webkit-user-select: none;
	  cursor: pointer;
	  text-shadow: 1px 1px #fff;
	  font-weight: 700;
	  font-size: 10pt;
	}
	.custom-file-input:hover::before {
	  border-color: black;
	}
	.custom-file-input:active::before {
	  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
	}
	.custom-file-input {

	  display:none;
	}
	.custom-input {
		/*margin-left: 5%;*/
	}
	#change_money {
    background-image: linear-gradient(to right, #90EE90 , #90EE90 );
    width: 80%;
    height: 20%;
    border-radius:5px;

  }
  .content {
    padding-left: 10%;
    padding-right: 10%;
    background-image: linear-gradient(to right,#FEFEDF, #FEFEDF);
    color: green;
    border-radius:5px;
  }
</style>
<?php
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<script type="text/javascript">

       function myFunction() {

                     var x = document.getElementById("input_money").value;
                    
                    
                     var someValue = $("#rate").text();
                     
                     // var result = parseInt(x)*parseInt(someValue, 10);
                     var result = x;
                     var lenght = result.toString().length;
                     var first = '';
                     var last  = '';
                     var text   = '';
                     if(lenght>3){
                     
                        first = result.substring(0, lenght%3);
                      
                        last  = result.substring(lenght%3+1, lenght);
                       
                        // for (var i = last.length; i >= 3; i--) {
                           
                        //       if(i%3==0){
                               
                        //          text = last.substring(i-3,i)+',' + text;
                        //       }
                             
                        
                        // }
                     }
                     
                     if (text == '') {
                       text = result;
                     }
                     $("#ketqua").text(first+text+"VND");


                     }

</script>
<body style="background-color: #8FBC8F;">
  <div class="content">
            <h1 style="margin-left: 30%;padding-top: 2%"> Sàn Giao Dịch Nhật - Việt </h1>

                <div class="row">
                  <h4>Tỷ giá hôm nay: 1円 : <?php echo $exchange_rate; ?> VND</h4>
                  <h4>Tỷ giá hôm nay: 1USD : <?php echo $exchange_rate; ?> VND</h4>
                  <div id="change_money" class="col-md-7 col-md-offset-1">
                      <h4 style="margin-left: 10%">Nhập vào ô phía dưới để xem trước số tiền sẽ nhận được </h4>
                      <h4 class="text-sm-left" style="margin-left: 15%"> <input  onkeyup="myFunction()" id="input_money" type="input" value ="0"> X 
                        <span id="rate" ><?php echo $exchange_rate; ?></span> = <span id="ketqua">0VND</span>
                      </h4>
                  </div>

                 
                </div>
                <div class="row">
                	<h3>Hướng dẫn</h3>
                	<p class="text-sm-left">+Click vào đây để gửi tiền về Việt Nam.<a href="<?php echo Url::toRoute(['/upload']); ?>"><input class="btn-primary" type="button" value ="Gửi tiền về Việt Nam"></a></p>
                	<p class="text-sm-left">+Click vào đây đề bán tiền Man.<input class="btn-primary" type="button" value ="Bán tiền Yên"></p>
                	<p class="text-sm-left">+Sau khi chuyển khoản bạn cần upload hóa đơn lên hệ thống.</p>
                	<p class="text-sm-left">+Gửi tiền vào ngày 26 hàng tháng sẽ giúp bạn tiết kiệm 70% chi phí gửi.</p>
                	
                </div>
                <div class="row">
                	<table class="table table-striped w-auto">

              <!--Table head-->
              <thead>
                <tr>
                  <th>#</th>
                  <th>Số tiền chuyển </th>
                  <th>Phí dịch vụ</th>
                  <th>Lưu ý</th>
                  <th>Thời gian nhận được tiền</th>
                 
                </tr>
              </thead>
              <!--Table head-->

              <!--Table body-->
              <tbody>
              	 <tr>
                  <th scope="row">1</th>
                  <td>1,000 - 30,000</td>
                  <td>¥400</td>
                  <td></td>
                  <td>1 ngày</td>
                
                </tr>
                <tr class="table-info">
                  <th scope="row">2</th>
                  <td>30,001 - 250,000</td>
                  <td>¥1,000</td>
                  <td>Nếu gửi ngày 29 giảm 50% phí gửi</td>
                  <td></td>
                 
                </tr>
               <tr>
                  <th scope="row">3</th>
                  <td>250,001 - 1,000,000</td>
                  <td>¥1,750</td>
                  <td>nếu gửi ngày 29 giảm 70% giá gửi</td>
                  <td></td>
                 
                </tr>
               
              </tbody>
              <!--Table body-->


                  </table>
              </div>
  </div>
</body>
