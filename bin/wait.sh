#!/bin/bash

while inotifywait -e close_write script.sh; do sh ./script.sh& done
