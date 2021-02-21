<?php
use tlab\shellScript;

require 'config.php';
$configuration = json_decode(file_get_contents("php://input"), true);

$script = new shellScript($configuration, _APP_DEMO_MODE);
$shellContent = $script->savePreviewScript();
header('Content-Type: application/json');
echo json_encode([
    'content' => $shellContent,
]);
