#!/bin/bash

mkdir ./media/20170703223715

echo "YTo0OntzOjk6InN0YXJ0VGltZSI7aToxNDk5MTE3ODM1O3M6NzoiZW5kVGltZSI7ZDoxNDk5MTE4ODM1O3M6MTE6ImltYWdlTnVtYmVyIjtkOjEwMDtzOjExOiJpbWFnZUZvbGRlciI7czoyMjoiLi9tZWRpYS8yMDE3MDcwMzIyMzcxNSI7fQ==" > ./running.lock

# Demo mode
sleep 10s
# raspistill -t 1000000 -tl 10000  -o ./media/20170703223715/img-%05d.jpg

# Time before takes picture and shuts down (miliseconds): 1000000
# Timelapse mode (miliseconds): 10000

rm ./running.lock

