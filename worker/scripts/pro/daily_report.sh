#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/follows/worker/scripts/daily_report.php > /opt/lampp/htdocs/follows/worker/log/daily_report-${date}.log
