#!/bin/bash

touch ./running.lock

raspistill -t 1000000 -tl 1000  -o media/img-%05d.jpg

# Time before takes picture and shuts down (miliseconds): 1000000
# Timelapse mode (miliseconds): 1000

rm ./running.lock

