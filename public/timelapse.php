<?php
use tlab\shellScript;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

require '../config/config.php';


// $configuration = json_decode(file_get_contents("php://input"), true);

$configuration["basicConfiguration"] = [
    "imageWidth" => 1200,
    "imageHeight" => 1200,
    "imageRotation" => 0,
    "hflip" => true,
    "vflip" => false,
];
  $configuration["effectsConfiguration"] = [
    "exposure" => "",
    "awb" => "",
    "imxfx" => "",
  ];

  $configuration["transformationsConfiguration"] = [
    "sharpness" => 30,
    "contrast" => 10,
    "brightness" => 55,
    "saturation" => 6,
    "iso" => 200,
    "ev" => 20,
  ];

  $configuration["timeLapseConfiguration"] = [
    "timeout" => 100,
    "timelapse" => 10,
  ];

$script = new shellScript($configuration, _APP_DEMO_MODE);
$shellContent = $script->saveTimelapseScript();
echo(nl2br($shellContent));
die;

