<?php
require '../config/config.php';

if ($isTimelapseRunning = tlab\shellScript::checkLockFile()) {
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
	<link href="resources/css/custom.css" rel="stylesheet">
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
        <label for="sharpness">Image sharpness</label> <span id="sharpness-value"> 0 </span>
        <input type="range" min="-100" max="100" class="form-control-range" name="sharpness" id="sharpness" value="0">
        <p class="help-block">Sets the sharpness of the image (-100 - 100). 0 is the default.</p>
      </div>

      <div class="form-group">
        <label for="contrast">Image contrast</label> <span id="contrast-value"> 0 </span>
		<input type="range" min="-100" max="100" class="form-control-range" name="contrast" id="contrast" value="0">
        <p class="help-block">Sets the contrast of the image (-100 - 100). 0 is the default.</p>
      </div>

      <div class="form-group">
        <label for="brightness">Image brightness </label> <span id="brightness-value"> 50 </span>
        <input type="range" min="0" max="100" class="form-control-range" name="brightness" id="brightness" value="50">
        <p class="help-block">Sets the brightness of the image. 50 is the default. 0 is black, 100 is white.</p>
      </div>

      <div class="form-group">
        <label for="saturation">Image saturation</label> <span id="saturation-value"> 0 </span>
		<input type="range" min="-100" max="100" class="form-control-range" name="saturation" id="saturation" value="0">
        <p class="help-block">Sets the colour saturation of the image (-100 - 100). 0 is the default.</p>
      </div>

	  <div class="form-group">
        <label for="ISO">Capture ISO</label> <span id="ISO-value"> 100 </span>
        <input type="range" min="100" max="800" class="form-control-range" name="ISO" id="ISO" value="100" step="10">
        <p class="help-block">Sets the ISO to be used for captures (100 - 800).</p>
      </div>

	  <div class="form-group">
        <label for="ev">EV compensation</label> <span id="ev-value"> 0 </span>
        <input type="range" min="-10" max="10" class="form-control-range" name="ev" id="ev" value="0">
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

        <div class="checkbox">
            <label>
                <input name="process-video" id="process-video" type="checkbox" value="1" >
                Process Video
            </label>
        </div>

        <div class="form-group">
            <label for="mencoder-vcodec">Codec</label>
            <select class="form-control" name="mencoder-vcodec" id="mencoder-vcodec">
                <option value="mpeg4">Mpeg 4</option>
            </select>
            <p class="help-block">Set Codec</p>
        </div>

        <div class="form-group">
            <label for="mencoder-aspect">Video Aspect Ratio</label>
            <select class="form-control" name="mencoder-aspect" id="mencoder-vcodec">
                <option value="16/9">16/9</option>
                <option value="4/3">4/3</option>
            </select>
            <p class="help-block">Video Aspect Ratio</p>
        </div>

  		//mencoder -nosound -ovc lavc -lavcopts vcodec=mpeg4:aspect=16/9:vbitrate=8000000 -vf scale=1920:1080 -o timelapse6.avi -mf type=jpeg:fps=8 mf://@stills.txt
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
	<script src="dist/bundle.js"></script>
  </body>
</html>
