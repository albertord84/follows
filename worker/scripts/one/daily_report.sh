#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://127.0.0.1:30080/dumbu/worker/scripts/daily_report.php >> /home/dumbuo5/public_html/dumbu/worker/log/daily_report-${date}.log
#wget -O /home/dumbuo5/public_html/dumbu/worker/log/daily_report-${date}.log   http://127.0.0.1:30080/dumbu/worker/scripts/daily_report.php