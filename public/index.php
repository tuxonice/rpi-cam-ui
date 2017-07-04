<?php
require 'config.php';


if($isTimelapseRunning = tlab\shellScript::checkLockFile()) {
	$lockFileContents = tlab\shellScript::getLockFileContents();
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>UI for Raspberry Pi Camera</title>

    <!-- Bootstrap core CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/custom.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="resources/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="resources/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Rasperry Pi Camera UI</a>
        </div>        
      </div>
    </nav>

    <div class="container">
      
      <?php if(_APP_DEMO_MODE) { ?>
      <div class="row">
		<div class="col-md-12" style="background-color:#ff9933; text-align:center; padding:5px 0">
			Demo mode
		</div>		  
      </div>
      <?php } ?>
      
      <div class="row">
      <div class="col-md-6">
		  <div><b>Raspberry Time:</b> <span id="serverTime"></span></div>
		  </div>
		  <div class="col-md-6">
			  <div><b>Browser Time:</b> <span id="browserTime"></span></div>
		  </div>
      </div>
      
      
      <div class="row">
        <div class="col-md-6">

		  
          <h2>Preview</h2>
          <?php 
			if($isTimelapseRunning) {
				$img = 'timelapse-running.png';
			} else {
				$img = 'timelapse-splash.png';
			}
          ?>
          <img id="live-image-placeholder" src="resources/images/<?php echo($img);  ?>" class="img-responsive" alt="Responsive image">
          
          <?php if(!$isTimelapseRunning) { ?>
          <div style="margin-top:10px;"><button type="button" class="btn btn-primary btn-lg " id="live-image"
			data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Getting Image">Preview Image</button>
		  </div>	
			<?php } ?>
          

        </div>
        <div class="col-md-6">
		
          <h2>Configuration</h2>
        <form id="configData">
			<input type="hidden" name="type" id="type" value="preview"/>
          <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic</a></li>
    <li role="presentation"><a href="#effects" aria-controls="effects" role="tab" data-toggle="tab">Effects</a></li>
    <li role="presentation"><a href="#transformations" aria-controls="transformations" role="tab" data-toggle="tab">Transformations</a></li>
    <li role="presentation"><a href="#shell" aria-controls="shell" role="tab" data-toggle="tab">Shell Script</a></li>
    <li role="presentation"><a href="#timelapse-tab" aria-controls="timelapse-tab" role="tab" data-toggle="tab">Timelapse</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="basic" style="margin-top:20px; margin-bottom:20px;">

    	<div class="form-group">
    		<label for="width">Image Width</label>
    		<input type="text" class="form-control" id="width" name="width">
    		<p class="help-block">Image width</p>
  		</div>
  		<div class="form-group">
    		<label for="height">Image Height</label>
    		<input type="text" class="form-control" id="height" name="height">
    		<p class="help-block">Image height</p>
  		</div>
  		<div class="form-group">
    		<label for="rotation">Image Rotation</label>
    		<select class="form-control" id="rotation" name="rotation">
  				<option value="">No rotation</option>
  				<option value="90">90 Degrees</option>
  				<option value="180">180 Degrees</option>
  				<option value="270">270 Degrees</option>
			</select>
  		</div>
  		<div class="checkbox">
  		<label>
    		<input name="hflip" id="hflip" type="checkbox" value="1" >
    		Horizontal flip
  		</label>
		</div>
		<div class="checkbox">
  		<label>
    		<input name="vflip" id="vflip" type="checkbox" value="1">
    		Vertical flip
  		</label>
		</div>

		</div>

    <div role="tabpanel" class="tab-pane" id="effects" style="margin-top:20px; margin-bottom:20px;">
    	<div class="form-group">
    		<label for="exposure">Exposure mode</label>
    		<select class="form-control" id="exposure" name="exposure">
    		<option value="">Use automatic exposure mode (default)</option>
   			<option value="night">Select setting for night shooting</option>
   			<option value="nightpreview">nightpreview</option>
   			<option value="backlight"> Select setting for backlit subject</option>
   			<option value="spotlight">Spotlight</option>
   			<option value="sports"> Select setting for sports (fast shutter etc.)</option>
   			<option value="snow"> Select setting optimised for snowy scenery</option>
   			<option value="beach"> Select setting optimised for beach</option>
   			<option value="verylong"> Select setting for long exposures</option>
   			<option value="fixedfps"> Constrain fps to a fixed value</option>
   			<option value="antishake"> Antishake mode</option>
   			<option value="fireworks"> Select setting optimised for fireworks</option>
			</select>
    		<p class="help-block">Set exposure mode (not all of these settings may be implemented, depending on camera tuning)</p>
  		</div>
  		<div class="form-group">
    		<label for="awb">Automatic White Balance (AWB) mode</label>
    		<select class="form-control" name="awb" id="awb">
    		<option value="">Automatic mode (default)</option>
    		<option value="off">Turn off white balance calculation</option>
    		<option value="sun">Sunny mode (between 5000K and 6500K)</option>
    		<option value="cloud">Cloudy mode (between 6500K and 12000K)</option>
    		<option value="shade">Shade mode</option>
    		<option value="tungsten">Tungsten lighting mode (between 2500K and 3500K)</option>
    		<option value="fluorescent">Fluorescent lighting mode (between 2500K and 4500K)</option>
    		<option value="incandescent">Incandescent lighting mode</option>
    		<option value="flash">Flash mode</option>
    		<option value="horizon">Horizon mode</option>
    		</select>
    		<p class="help-block">Modes for which colour temperature ranges (K) are available have these settings in brackets</p>
  		</div>
  		<div class="form-group">
    		<label for="imxfx">Image effect</label>
    		<select class="form-control" name="imxfx" id="imxfx">
    		<option value="">No effect (default)</option>
    		<option value="negative">Invert the image colours</option>
    		<option value="solarise">Solarise the image</option>
    		<option value="posterise">Posterise the image</option>
    		<option value="whiteboard">Whiteboard effect</option>
    		<option value="blackboard">Blackboard effect</option>
    		<option value="sketch">Sketch effect</option>
    		<option value="denoise">Denoise the image</option>
    		<option value="emboss">Emboss the image</option>
    		<option value="oilpaint">Oil paint effect</option>
    		<option value="hatch">Hatch sketch effect</option>
    		<option value="gpen">Graphite sketch effect</option>
    		<option value="pastel">Pastel effect</option>
    		<option value="watercolour">Watercolour effect</option>
    		<option value="film">Film grain effect</option>
    		<option value="blur">Blur the image</option>
    		<option value="saturation">Colour saturate the image</option>
    		<option value="colourswap">Colourswap (not fully implemented)</option>
    		<option value="washedout">Washedout (not fully implemented)</option>
    		<option value="colourpoint">Colourpoint (not fully implemented)</option>
    		<option value="colourbalance">colourbalance (not fully implemented)</option>
    		<option value="cartoon">Cartoon (not fully implemented)</option>
    		</select>
    		<p class="help-block">Set an effect to be applied to the image</p>
  		</div>
    </div>

    <div role="tabpanel" class="tab-pane" id="transformations" style="margin-top:20px; margin-bottom:20px;">

      <div class="form-group">
        <label for="sharpness">Image sharpness</label>
        <select class="form-control" name="sharpness" id="sharpness">
          <?php for($i=-100; $i<=-1; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
          <option value="" selected="selected">0</option>
          <?php for($i=1; $i<=100; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
        </select>
        <p class="help-block">Sets the sharpness of the image (-100 - 100). 0 is the default.</p>
      </div>

      <div class="form-group">
        <label for="contrast">Image contrast</label>
      <select class="form-control" name="contrast" id="contrast">
        <?php for($i=-100; $i<=-1; $i++){ ?>
        <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
        <?php } ?>
        <option value="" selected="selected">0</option>
        <?php for($i=1; $i<=100; $i++){ ?>
        <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
        <?php } ?>
      </select>
        <p class="help-block">Sets the contrast of the image (-100 - 100). 0 is the default.</p>
      </div>

      <div class="form-group">
        <label for="brightness">Image brightness</label>
        <select class="form-control" name="brightness" id="brightness">
          <?php for($i=0; $i<=49; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
          <option value="" selected="selected">50</option>
          <?php for($i=51; $i<=100; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
        </select>
        <p class="help-block">Sets the brightness of the image. 50 is the default. 0 is black, 100 is white.</p>
      </div>

      <div class="form-group">
        <label for="saturation">Image saturation</label>
        <select class="form-control" name="saturation" id="saturation">
          <?php for($i=-100; $i<=-1; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
          <option value="" selected="selected">0</option>
          <?php for($i=1; $i<=100; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
        </select>
        <p class="help-block">Sets the colour saturation of the image (-100 - 100). 0 is the default.</p>
      </div>

      <div class="form-group">
        <label for="ISO">Capture ISO</label>
        <select class="form-control" name="ISO" id="ISO">
          <option value="" selected="selected">100</option>
          <?php for($i=110; $i<=800; $i+=10){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
        </select>
        <p class="help-block">Sets the ISO to be used for captures (100 - 800).</p>
      </div>

      <div class="form-group">
        <label for="ev">EV compensation</label>
        <select class="form-control" name="ev" id="ev">
          <?php for($i=-10; $i<=-1; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
          <option value="" selected="selected">0</option>
          <?php for($i=1; $i<=10; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
        </select>
        <p class="help-block">Set EV compensation (-10 - 10). Default is 0.</p>
      </div>

    </div>


    <div role="tabpanel" class="tab-pane" id="timelapse-tab" style="margin-top:20px; margin-bottom:20px;">

    	<div class="form-group">
    		<label for="timeout">Total Duration (in seconds)</label>
    		<input type="text" class="form-control" id="timeout" name="timeout" value="">
  		</div>

  		<div class="form-group">
    		<label for="timelapse">Image step (in seconds)</label>
    		<input type="text" class="form-control" id="timelapse" name="timelapse" value="">
  		</div>
  		
  		<?php if(!$isTimelapseRunning) { ?>
  		<div style="margin-top:10px;"><button type="button" class="btn btn-primary btn-lg " id="run-timelapse"
			data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Timelapse running">Run Timelapse</button>
		</div>
		<?php } ?>	
  		
    </div>
    
    
    <div role="tabpanel" class="tab-pane" id="shell" style="margin-top:20px; margin-bottom:20px;">

    	  <div class="form-group">
            <textarea class="form-control" id="shellScript" rows="8" readonly="readonly"></textarea>
          </div>

    </div>
    
  </div>

</div>

  			
		  </form>
       </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
        		<div id="info-box" class="alert alert-success" role="alert" style="margin-top:20px"></div>
		</div>
	  </div>
	  <?php 
		if($isTimelapseRunning) { ?>
		<div class="row">
			<div class="col-md-12">
        		<div class="alert alert-danger" role="alert" style="margin-top:20px">
					There is a timelapse running<br/>
					Start Time: <?php echo date("H:i:s", $lockFileContents['startTime']); ?><br/>
					End Time: <?php echo date("H:i:s", $lockFileContents['endTime']); ?><br/>
					Images: <?php echo $lockFileContents['imageNumber']; ?><br/>
					Image Folder: <?php echo $lockFileContents['imageFolder']; ?><br/>
					
        		</div>
			</div>
	    </div>
	  <?php } ?>
      
      <hr>
      

      <footer>
        <p></p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="resources/assets/js/vendor/jquery.min.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="resources/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
		
	var timeDiff = 0;
		
	function startTime() {
		
		var browserNow = new Date();
		var h = browserNow.getHours();
		var m = browserNow.getMinutes();
		//var s = browserNow.getSeconds();
		m = checkTime(m);
		//s = checkTime(s);
		$("#browserTime").html(h + ":" + m);
		
		var serverNow = new Date(Math.floor(Date.now()) + (timeDiff * 1000));
		var h = serverNow.getHours();
		var m = serverNow.getMinutes();
		//var s = serverNow.getSeconds();
		m = checkTime(m);
		//s = checkTime(s);
		$("#serverTime").html(h + ":" + m);
		
		//Update click every 60 seconds
		var t = setTimeout(startTime, 60000);
	}
	
	function checkTime(i) {
		if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		return i;
	}	
		
		
    $(function(){
		
		timeDiff = Math.floor(Date.now() / 1000) - Math.floor(<?php echo(time()); ?>);
		console.log(timeDiff);
		
		startTime();

		$("#live-image").on('click', function(e) {
			$("#type").val('preview');
			$("#live-image").button('loading');
			$("#configData").submit();
			$("#live-image").button('reset');
		});


		$("#run-timelapse").on('click', function(e){
			
			var timeout = $("#timeout").val();
			var timelapse = $("#timelapse").val();
			
			if(timeout == '' || timelapse == '') {
				alert('erro');
				return;
			}
			
			
			$("#type").val('timelapse');
			$("#configData").submit();
		});


		$("#configData").submit(function(e) {
			//console.log($("#configData").serialize());
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: $("#configData").serialize(), // serializes the form's elements.
				success: function(data, status, xhr)
				{
					if(data.isTimelapseRunning) {
						$("#info-box").removeClass().addClass("alert").addClass("alert-"+data.status).html(data.info).show(); 
						return; 
					}
					$("#live-image-placeholder").attr('src',data.previewImage);
					$("#shellScript").val(data.shellContent);
					if(data.type == 'timelapse') {
						$("#info-box").removeClass().addClass("alert").addClass("alert-"+data.status).html(data.info).show();          
					}					
				}
			});

			e.preventDefault(); // avoid to execute the actual submit of the form.
		});

		$('#myTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})
    });
    </script>
  </body>
</html>
