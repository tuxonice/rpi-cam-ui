<?php
require __DIR__.'/../vendor/autoload.php';


/*
  # Basic
  with
  height
  rotation
  hflip
  vflip
  stats

  # Effects
  exposure
  awb
  imxfx

  # Transformations
  sharpness
  contrast
  brightness
  saturation
  ISO
  ev

  # Timelapse
  timeout
  timelapse

*/

//$script = new tlab\shellScript($_POST);
//$script->output();

//sleep(3); //simulating raspistill
echo('http://lorempixel.com/450/450/?t='.uniqid());
//$output = exec('raspistill -o images/img.jpg');
//echo('images/img.jpg?t='.uniqid());
