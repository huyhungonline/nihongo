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

                     var money = document.getElementById("input_money").value;
                     var rate = document.getElementById("ratemoney").value;
                     var total = money*rate;
                     var result = formatMoney(total, decimalCount = 2, decimal = ".", thousands = ",");

                  
                     $("#ketqua").text(result+"VND");


                     }

      function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
          try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

            const negativeSign = amount < 0 ? "-" : "";

            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;

            return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
          } catch (e) {
            console.log(e)
          }
        };
        document.getElementById("b").addEventListener("click", event => {
          document.getElementById("x").innerText = "Result was: " + formatMoney(document.getElementById("d").value);
        });

</script>
<body style="background-color: #8FBC8F;">
  <div class="content">
            <h1 style="margin-left: 30%;padding-top: 2%"> Chuyển đổi tiền Nhật-Việt</h1>

                <div class="row">
                  <h4>Tỷ giá hôm nay: 1円 : <?php echo $exchange_rate; ?> VND</h4>
                  <h4>Tỷ giá hôm nay: 1USD : <?php echo $exchange_rate; ?> VND</h4>
                  <div id="change_money" class="col-md-7 col-md-offset-1">
                      <h4 style="margin-left: 10%">Nhập vào ô phía dưới để xem trước số tiền sẽ nhận được </h4>
                      <h4 class="text-sm-left" style="margin-left: 15%"> <input  onkeyup="myFunction()" id="input_money" type="input" value ="0"> X 
                        <span id="rate" ><?php echo $exchange_rate; ?></span> = <span id="ketqua">0VND</span>
                      </h4>
                  </div>
                  <input type="hidden" id="ratemoney" value="<?php echo $exchange_rate; ?>">
                 
                </div>
               
  </div>
</body>
