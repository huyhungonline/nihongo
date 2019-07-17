
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

body {
  background: linear-gradient(#000, #151515);
}
  </style>
  <script type="text/javascript">
      function login() {

         location.href = "http://localhungbk.com/login";

      }
/*=============================================================================*/  
/* Canvas Lightning v1
/*=============================================================================*/
var canvasLightning = function(c, cw, ch){
  
/*=============================================================================*/  
/* Initialize
/*=============================================================================*/
  this.init = function(){
    this.loop();
  };    
  
/*=============================================================================*/  
/* Variables
/*=============================================================================*/
  var _this = this;
  this.c = c;
  this.ctx = c.getContext('2d');
  this.cw = cw;
  this.ch = ch;
  this.mx = 0;
  this.my = 0;
  
  this.lightning = [];
  this.lightTimeCurrent = 0;
  this.lightTimeTotal = 50;
  
/*=============================================================================*/  
/* Utility Functions
/*=============================================================================*/        
this.rand = function(rMi, rMa){return ~~((Math.random()*(rMa-rMi+1))+rMi);};
this.hitTest = function(x1, y1, w1, h1, x2, y2, w2, h2){return !(x1 + w1 < x2 || x2 + w2 < x1 || y1 + h1 < y2 || y2 + h2 < y1);};
  
/*=============================================================================*/   
/* Create Lightning
/*=============================================================================*/
  this.createL= function(x, y, canSpawn){                   
    this.lightning.push({
      x: x,
      y: y,
      xRange: this.rand(5, 30),
      yRange: this.rand(5, 25),
      path: [{
        x: x,
        y: y    
      }],
      pathLimit: this.rand(10, 35),
      canSpawn: canSpawn,
      hasFired: false
    });
  };
  
/*=============================================================================*/   
/* Update Lightning
/*=============================================================================*/
  this.updateL = function(){
    var i = this.lightning.length;
    while(i--){
      var light = this.lightning[i];                        
      
      
      light.path.push({
        x: light.path[light.path.length-1].x + (this.rand(0, light.xRange)-(light.xRange/2)),
        y: light.path[light.path.length-1].y + (this.rand(0, light.yRange))
      });
      
      if(light.path.length > light.pathLimit){
        this.lightning.splice(i, 1)
      }
      light.hasFired = true;
    };
  };
  
/*=============================================================================*/   
/* Render Lightning
/*=============================================================================*/
  this.renderL = function(){
    var i = this.lightning.length;
    while(i--){
      var light = this.lightning[i];
      
      this.ctx.strokeStyle = 'hsla(0, 100%, 100%, '+this.rand(10, 100)/100+')';
      this.ctx.lineWidth = 1;
      if(this.rand(0, 30) == 0){
        this.ctx.lineWidth = 2; 
      }
      if(this.rand(0, 60) == 0){
        this.ctx.lineWidth = 3; 
      }
      if(this.rand(0, 90) == 0){
        this.ctx.lineWidth = 4; 
      }
      if(this.rand(0, 120) == 0){
        this.ctx.lineWidth = 5; 
      }
      if(this.rand(0, 150) == 0){
        this.ctx.lineWidth = 6; 
      } 
      
      this.ctx.beginPath();
      
      var pathCount = light.path.length;
      this.ctx.moveTo(light.x, light.y);
      for(var pc = 0; pc < pathCount; pc++){    
        
        this.ctx.lineTo(light.path[pc].x, light.path[pc].y);
        
        if(light.canSpawn){
          if(this.rand(0, 100) == 0){
            light.canSpawn = false;
            this.createL(light.path[pc].x, light.path[pc].y, false);
          } 
        }
      }
      
      if(!light.hasFired){
        this.ctx.fillStyle = 'rgba(255, 255, 255, '+this.rand(4, 12)/100+')';
        this.ctx.fillRect(0, 0, this.cw, this.ch);  
      }
      
      if(this.rand(0, 30) == 0){
        this.ctx.fillStyle = 'rgba(255, 255, 255, '+this.rand(1, 3)/100+')';
        this.ctx.fillRect(0, 0, this.cw, this.ch);  
      } 
      
      this.ctx.stroke();
    };
  };
  
/*=============================================================================*/   
/* Lightning Timer
/*=============================================================================*/
  this.lightningTimer = function(){
    this.lightTimeCurrent++;
    if(this.lightTimeCurrent >= this.lightTimeTotal){
      var newX = this.rand(100, cw - 100);
      var newY = this.rand(0, ch / 2); 
      var createCount = this.rand(1, 3);
      while(createCount--){                         
        this.createL(newX, newY, true);
      }
      this.lightTimeCurrent = 0;
      this.lightTimeTotal = this.rand(30, 100);
    }
  }
    
/*=============================================================================*/   
/* Clear Canvas
/*=============================================================================*/
    this.clearCanvas = function(){
      this.ctx.globalCompositeOperation = 'destination-out';
      this.ctx.fillStyle = 'rgba(0,0,0,'+this.rand(1, 30)/100+')';
      this.ctx.fillRect(0,0,this.cw,this.ch);
      this.ctx.globalCompositeOperation = 'source-over';
    };
  
/*=============================================================================*/   
/* Resize on Canvas on Window Resize
/*=============================================================================*/
$(window).on('resize', function(){
  _this.cw = _this.c.width = window.innerWidth;
  _this.ch = _this.c.height = window.innerHeight;  
});
    
/*=============================================================================*/   
/* Animation Loop
/*=============================================================================*/
  this.loop = function(){
        var loopIt = function(){
      requestAnimationFrame(loopIt, _this.c);
      _this.clearCanvas();
      _this.updateL();
      _this.lightningTimer();
      _this.renderL();  
    };
    loopIt();                   
  };
  
};

/*=============================================================================*/   
/* Check Canvas Support
/*=============================================================================*/
var isCanvasSupported = function(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
};

/*=============================================================================*/   
/* Setup requestAnimationFrame
/*=============================================================================*/
var setupRAF = function(){
  var lastTime = 0;
  var vendors = ['ms', 'moz', 'webkit', 'o'];
  for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x){
    window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
    window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
  };
  
  if(!window.requestAnimationFrame){
    window.requestAnimationFrame = function(callback, element){
      var currTime = new Date().getTime();
      var timeToCall = Math.max(0, 16 - (currTime - lastTime));
      var id = window.setTimeout(function() { callback(currTime + timeToCall); }, timeToCall);
      lastTime = currTime + timeToCall;
      return id;
    };
  };
  
  if (!window.cancelAnimationFrame){
    window.cancelAnimationFrame = function(id){
      clearTimeout(id);
    };
  };
};          

/*=============================================================================*/   
/* Define Canvas and Initialize
/*=============================================================================*/
$(window).load(function(){  
  if(isCanvasSupported){
    var c = document.getElementById('canvas');
    var cw = c.width = window.innerWidth;
    var ch = c.height = window.innerHeight; 
    var cl = new canvasLightning(c, cw, ch);                
    
    setupRAF();
    cl.init();
  }
});
  </script>
</head>
<body>

<div class="cont">
 
 <canvas id="canvas">
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
  </canvas>
</div>
