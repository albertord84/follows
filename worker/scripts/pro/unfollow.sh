#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/worker/scripts/unfollow.php >> /opt/lampp/htdocs/dumbu/worker/log/unfollow-${date}.log




