<?php
require __DIR__.'/../vendor/autoload.php';


$script = new tlab\shellScript(array('hf'=>1,'rot'=>90,'vf'=>1));
$script->output();

//sleep(3); //simulating raspistill
echo('http://lorempixel.com/450/450/?t='.uniqid());
//$output = exec('raspistill -o images/img.jpg');
//echo('images/img.jpg?t='.uniqid());
