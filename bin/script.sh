#!/bin/bash

mkdir ./media/20200418170352

echo "YTo0OntzOjk6InN0YXJ0VGltZSI7aToxNTg3MjI5NDMyO3M6NzoiZW5kVGltZSI7ZDoxNTg3MjI5NDkyO3M6MTE6ImltYWdlTnVtYmVyIjtkOjY7czoxMToiaW1hZ2VGb2xkZXIiO3M6MjI6Ii4vbWVkaWEvMjAyMDA0MTgxNzAzNTIiO30=" > ./running.lock

raspistill -t 60000 -tl 10000  -o ./media/20200418170352/img-%05d.jpg

# Time before takes picture and shuts down (miliseconds): 60000
# Timelapse mode (miliseconds): 10000

rm ./running.lock

