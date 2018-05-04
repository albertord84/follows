#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/worker/scripts/index-do.php?id=5 >> /opt/lampp/htdocs/dumbu/worker/log/dumbo-worker5-${date}.log