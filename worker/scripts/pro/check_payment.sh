#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://localhost/follows/src/index.php/payment/check_payment > /opt/lampp/htdocs/follows/worker/log/check-payment-${date}.log