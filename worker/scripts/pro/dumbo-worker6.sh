#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/worker/scripts/index-do.php?id=6 >> /opt/lampp/htdocs/dumbu/worker/log/dumbo-worker6-${date}.log