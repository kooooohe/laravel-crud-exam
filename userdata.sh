#!/bin/bash

cd /home/ec2-user/exam

docker-compose -f docker-compose.ec2.yml up -d

sleep 5

while true
do
  docker exec -it exam_php_1 php artisan
  if [[ $? -eq 0 ]] ; then
    break
  else
    sleep 5
  fi
done

docker exec -it exam_php_1 php artisan migrate:status | awk -F '|' '{print $4}' | tr -d ' ' | grep 1

if [[ $? -eq 1 ]] ; then
  docker exec -it exam_php_1 php artisan migrate:fresh --seed
fi
