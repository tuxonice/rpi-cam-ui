#!/bin/bash

cp -r assets/images dist/
ln -s ../app/heartbeat.php dist/heartbeat.php
ln -s ../app/preview.php dist/preview.php
ln -s ../app/timelapse.php dist/timelapse.php
