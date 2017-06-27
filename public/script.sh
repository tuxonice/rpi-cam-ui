#!/bin/bash

mkdir ./media/20170627234240

echo "YTo0OntzOjk6InN0YXJ0VGltZSI7aToxNDk4NjAzMzYwO3M6NzoiZW5kVGltZSI7ZDoxNDk4NjAzNzIwO3M6MTE6ImltYWdlTnVtYmVyIjtkOjEyMDtzOjExOiJpbWFnZUZvbGRlciI7czoyMjoiLi9tZWRpYS8yMDE3MDYyNzIzNDI0MCI7fQ==" > ./running.lock

# Demo mode
sleep 10s
# raspistill -t 360000 -tl 3000  -o media/img-%05d.jpg

# Time before takes picture and shuts down (miliseconds): 360000
# Timelapse mode (miliseconds): 3000

rm ./running.lock

