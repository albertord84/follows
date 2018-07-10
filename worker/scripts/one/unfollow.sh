#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://127.0.0.1:30080/follows/worker/scripts/unfollow.php >> /home/dumbuo5/public_html/follows/worker/log/unfollow-${date}.log
# wget -O /home/dumbuo5/public_html/follows/worker/log/unfollow-${date}.log   http://127.0.0.1:30080/follows/worker/scripts/unfollow.php

