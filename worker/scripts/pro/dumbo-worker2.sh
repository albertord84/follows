#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/follows/worker/scripts/index-do.php?id=2 >> /opt/lampp/htdocs/follows/worker/log/dumbo-worker2-${date}.log