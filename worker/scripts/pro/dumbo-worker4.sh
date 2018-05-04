#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/worker/scripts/index-do.php?id=4 >> /opt/lampp/htdocs/dumbu/worker/log/dumbo-worker4-${date}.log