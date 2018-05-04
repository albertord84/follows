#!/bin/sh

parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )

cd "$parent_path"

date=$(date +%Y%m%d)

now=$(date +"%T")

#curl http://localhost/dumbu/worker/index.php > ../worker/log/dumbo-worker-${date}.log
curl http://localhost/dumbu/worker/index.php > /opt/lampp/htdocs/dumbu/worker/log/dumbo-worker-${date}.log
