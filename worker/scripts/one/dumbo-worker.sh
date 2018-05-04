#!/bin/sh

parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )

cd "$parent_path"

date=$(date +%Y%m%d)

now=$(date +"%T")

curl http://127.0.0.1:30080/follows/worker/index.php >> /home/dumbuo5/public_html/follows/worker/log/dumbo-worker-${date}.log
#wget -O /home/dumbuo5/public_html/follows/worker/log/dumbo-worker-${date}.log http://127.0.0.1:30080/follows/worker/index.php

