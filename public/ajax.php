<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
require '../config/config.php';


$configuration = json_decode(file_get_contents("php://input"), true);
var_dump($configuration);

die;

/*
if ($isTimelapseRunning = tlab\shellScript::checkLockFile()) {
    $info = 'A timelapse is running!';
    $status = 'danger'; //info, success, warning, danger
    header('Content-Type: application/json');
    echo json_encode(array(
        'shellContent' => '',
        'previewImage' => '',
        'info' => $info,
        'status' => $status,
        'type' => '',
        'isTimelapseRunning' => $isTimelapseRunning
    ));
    die;
}
*/

$runType = (isset($_POST['type']) && $_POST['type'] == 'timelapse') ? 'timelapse' : 'preview';

$script = new tlab\shellScript($configuration, $runType, _APP_DEMO_MODE);
$shellContent = $script->saveScript();
//list($previewImage, $info, $status, $type) = $script->executeScript();
//sleep(6);
header('Content-Type: application/json');
echo json_encode(array(
    'shellContent' => $shellContent,
    //'previewImage' => $previewImage,
    //'info' => $info,
    //'status' => $status,
    'type' => $type,
    //'isTimelapseRunning' => $isTimelapseRunning
));
