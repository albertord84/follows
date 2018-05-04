#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/follows/worker/scripts/recover-followed.php > /opt/lampp/htdocs/follows/worker/log/recover-${date}.log