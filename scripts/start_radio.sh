#!/bin/bash


pkill -f "ffmpeg.*239.10.10.10:5004"

ffmpeg -re -i "$1" -acodec g722 -ac 1 -ar 16000 -f rtp rtp://239.10.10.10:5004 > /dev/null 2>&1 &
