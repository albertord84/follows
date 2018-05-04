#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/dumbu/src/index.php/payment/check_payment > /opt/lampp/htdocs/dumbu/src/logs/check-payment-${date}.log