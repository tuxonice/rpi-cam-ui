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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Rasperry Pi Camera UI</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Preview</h2>
          <img id="live-image-placeholder" src="http://placehold.it/450x450" class="img-responsive" alt="Responsive image">

        </div>
        <div class="col-md-6">
          <h2>Configuration</h2>
        <form id="configData">
          <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic</a></li>
    <li role="presentation"><a href="#effects" aria-controls="effects" role="tab" data-toggle="tab">Effects</a></li>
    <li role="presentation"><a href="#transformations" aria-controls="transformations" role="tab" data-toggle="tab">Transformations</a></li>
    <li role="presentation"><a href="#timelapse" aria-controls="timelapse" role="tab" data-toggle="tab">Timelapse</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="basic" style="margin-top:20px; margin-bottom:20px;">

    	<div class="form-group">
    		<label for="width">Image Width</label>
    		<input type="text" class="form-control" id="width" name="with">
    		<p class="help-block">Example block-level help text here.</p>
  		</div>
  		<div class="form-group">
    		<label for="height">Image Height</label>
    		<input type="text" class="form-control" id="height" name="height">
    		<p class="help-block">Example block-level help text here.</p>
  		</div>
  		<div class="form-group">
    		<label for="rotation">Image Rotation</label>
    		<select class="form-control" id="rotation" name="rotation">
  				<option value="0">0 Degrees</option>
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

		<div class="checkbox">
  		<label>
    		<input type="checkbox" name="stats" id="stats" value="1">
    		Display image statistics
  		</label>
		</div>
    </div>

    <div role="tabpanel" class="tab-pane" id="effects" style="margin-top:20px; margin-bottom:20px;">
    	<div class="form-group">
    		<label for="exposure">Exposure mode</label>
    		<select class="form-control" id="exposure" name="exposure">
    		<option value="auto">use automatic exposure mode</option>
   			<option value="night">Select setting for night shooting</option>
   			<option value="nightpreview">nightpreview</option>
   			<option value="backlight"> select setting for backlit subject</option>
   			<option value="spotlight">spotlight</option>
   			<option value="sports"> select setting for sports (fast shutter etc.)</option>
   			<option value="snow"> select setting optimised for snowy scenery</option>
   			<option value="beach"> select setting optimised for beach</option>
   			<option value="verylong"> select setting for long exposures</option>
   			<option value="fixedfps"> constrain fps to a fixed value</option>
   			<option value="antishake"> antishake mode</option>
   			<option value="fireworks"> select setting optimised for fireworks</option>
			</select>
    		<p class="help-block">Example block-level help text here.</p>
  		</div>
  		<div class="form-group">
    		<label for="awb">Automatic White Balance (AWB) mode</label>
    		<select class="form-control" name="awb" id="awb">
    		<option value="auto">automatic mode (default)</option>
    		<option value="off">turn off white balance calculation</option>
    		<option value="sun">sunny mode (between 5000K and 6500K)</option>
    		<option value="cloud">cloudy mode (between 6500K and 12000K)</option>
    		<option value="shade">shade mode</option>
    		<option value="tungsten">tungsten lighting mode (between 2500K and 3500K)</option>
    		<option value="fluorescent">fluorescent lighting mode (between 2500K and 4500K)</option>
    		<option value="incandescent">incandescent lighting mode</option>
    		<option value="flash">flash mode</option>
    		<option value="horizon">horizon mode</option>
    		</select>
    		<p class="help-block">Modes for which colour temperature ranges (K) are available have these settings in brackets</p>
  		</div>
  		<div class="form-group">
    		<label for="imxfx">Image effect</label>
    		<select class="form-control" name="imxfx" id="imxfx">
    		<option value="none">No effect (default)</option>
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
          <option value="0" selected="selected">0</option>
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
        <option value="0" selected="selected">0</option>
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
          <option value="50" selected="selected">50</option>
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
          <option value="0" selected="selected">0</option>
          <?php for($i=1; $i<=100; $i++){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
        </select>
        <p class="help-block">Sets the colour saturation of the image (-100 - 100). 0 is the default.</p>
      </div>

      <div class="form-group">
        <label for="ISO">Capture ISO</label>
        <select class="form-control" name="ISO" id="ISO">
          <option value="100" selected="selected">100</option>
          <?php for($i=110; $i<=800; $i+=10){ ?>
          <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
          <?php } ?>
        </select>
        <p class="help-block">Sets the ISO to be used for captures (100 - 800).</p>
      </div>

      <div class="form-group">
        <label for="ev">EV compensation</label>
        <input type="text" class="form-control" id="ev" name="ev" value="0">
        <p class="help-block">Sets the EV compensation of the image. Default is 0.</p>
      </div>

    </div>


    <div role="tabpanel" class="tab-pane" id="timelapse" style="margin-top:20px; margin-bottom:20px;">

    	<div class="form-group">
    		<label for="timeout">Total Duration (in seconds)</label>
    		<input type="text" class="form-control" id="timeout" name="timeout" value="0">
  		</div>

  		<div class="form-group">
    		<label for="timelapse">Image step (in seconds)</label>
    		<input type="text" class="form-control" id="timelapse" name="timelapse" value="0">
  		</div>

    </div>
  </div>

</div>
  			<button type="submit" class="btn btn-primary btn-lg " id="live-image"
			data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Image">Get Image</button>
		  </form>
       </div>
      </div>

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
    $(function(){




$("#configData").submit(function(e) {

  var url = "ajax.php"; // the script where you handle the form input.

  console.log($("#configData").serialize());

  $.ajax({
         type: "POST",
         url: url,
         data: $("#configData").serialize(), // serializes the form's elements.
         success: function(data)
         {
             console.log(data); // show response from the php script.
         }
       });

  e.preventDefault(); // avoid to execute the actual submit of the form.
});




/*
		$("#live-image").on('click',function(){
		  var $this = $(this);
		  $this.button('loading');
  		  $.ajax({
			  method: "POST",
			  url: "ajax.php"
			})
			  .done(function( image ) {
			    $("#live-image-placeholder").attr('src',image);
			    $this.button('reset');
			});
		});
*/

		$('#myTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})
    });
    </script>
  </body>
</html>
