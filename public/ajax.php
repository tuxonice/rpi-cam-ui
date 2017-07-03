<?php
require 'config.php';

if($isTimelapseRunning = tlab\shellScript::checkLockFile()) {
	$info = 'A timelapse is running!';
	$status = 'danger'; //info, success, warning, danger
	header('Content-Type: application/json');
	echo json_encode(array('shellContent'=>'', 'previewImage'=>'', 'info'=>$info, 'status' => $status, 'type' => '', 'isTimelapseRunning' => $isTimelapseRunning));
	die;
}


$runType = (isset($_POST['type']) && $_POST['type'] == 'timelapse') ? 'timelapse' : 'preview';

$script = new tlab\shellScript($_POST, $runType, _APP_DEMO_MODE);
$shellContent = $script->saveScript();
list($previewImage, $info, $status, $type) = $script->executeScript();

header('Content-Type: application/json');
echo json_encode(array('shellContent'=>$shellContent, 'previewImage'=>$previewImage, 'info'=>$info, 'status' => $status, 'type' => $type, 'isTimelapseRunning' => $isTimelapseRunning));
