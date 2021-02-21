<?php

require 'config.php';
header('Content-Type: application/json');
$status = tlab\shellScript::getLockFileContents();
echo($status);
