#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/worker/scripts/index-do.php?id=8 >> /opt/lampp/htdocs/dumbu/worker/log/dumbo-worker8-${date}.log