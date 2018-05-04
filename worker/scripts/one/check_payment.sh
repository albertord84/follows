#!/bin/sh

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://127.0.0.1:30080/dumbu/src/index.php/payment/check_payment >> /home/dumbuo5/public_html/dumbu/src/logs/check-payment-${date}.log
#wget -O /home/dumbuo5/public_html/dumbu/src/logs/check-payment-${date}.log   http://dumbu.one/dumbu/src/index.php/payment/check_payment