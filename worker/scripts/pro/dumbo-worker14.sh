#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/worker/scripts/index-do.php?id=14 >> /opt/lampp/htdocs/dumbu/worker/log/dumbo-worker14-${date}.log