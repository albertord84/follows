#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/worker/scripts/daily_report.php > /opt/lampp/htdocs/dumbu/worker/log/daily_report-${date}.log
