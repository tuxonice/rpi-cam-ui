#!/bin/bash

mkdir dist/images
cp src/assets/timelapse-running.png dist/images/
cp src/assets/timelapse-splash.png dist/images/
ln -s ../app/heartbeat.php dist/heartbeat.php
ln -s ../app/preview.php dist/preview.php
ln -s ../app/timelapse.php dist/timelapse.php
ln -s ../media dist/media
