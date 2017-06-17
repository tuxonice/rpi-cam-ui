<?php
require __DIR__.'/../vendor/autoload.php';

//ini_set('display_errors',1);
//error_reporting(E_ALL);

$script = new tlab\shellScript($_POST);
$shellContent = $script->saveScript();
list($shellOutput, $previewImage) = $script->executeScript();

header('Content-Type: application/json');
echo json_encode(array('shellContent'=>$shellContent,'shellOutput' => $shellOutput,'previewImage'=>$previewImage));
