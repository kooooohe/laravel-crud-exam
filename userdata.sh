#!/bin/bash

cd /home/ec2-user/exam

docker-compose -f docker-compose.ec2.yml up -d

sleep 5

while true
do
  docker exec exam_php_1 php artisan
  if [[ $? -eq 0 ]] ; then
    echo 'Docker Containers are running'
    break
  else
    echo 'waiting'
    sleep 5
  fi
done

echo 'writing cache'
docker exec exam_php_1 php artisan command:write-key-value-to-cache executingHost ${HOSTNAME}

echo 'waiting'
sleep 5

echo 'migrate'
docker exec exam_php_1 php artisan command:migrate-without-overlapping ${HOSTNAME}