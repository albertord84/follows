#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/worker/scripts/recover-followed.php > /opt/lampp/htdocs/dumbu/worker/log/recover-${date}.log