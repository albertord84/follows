#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/follows/worker/scripts/unfollow.php >> /opt/lampp/htdocs/follows/worker/log/unfollow-${date}.log




