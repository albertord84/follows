#!/bin/sh

parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )

cd "$parent_path"

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://127.0.0.1:30080/dumbu/worker/index.php >> /home/dumbuo5/public_html/dumbu/worker/log/dumbo-worker-${date}.log
#wget -O /home/dumbuo5/public_html/dumbu/worker/log/dumbo-worker-${date}.log http://127.0.0.1:30080/dumbu/worker/index.php

