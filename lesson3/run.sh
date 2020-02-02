#!/usr/bin/env bash
echo "run docker build"
docker build -t docker-nginx-php ./
echo "run docker run"
docker run -d -p 8880:80 docker-nginx-php
echo "container run complete"