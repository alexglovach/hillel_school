FROM alpine:3.10

RUN apk --no-cache add php7 php7-fpm php7-mysqli php7-json php7-openssl php7-curl \
    php7-zlib php7-xml php7-phar php7-intl php7-dom php7-xmlreader php7-ctype php7-session \
    php7-mbstring php7-gd nginx supervisor curl

COPY nginx/info.conf /etc/nginx/conf.d/info.conf
RUN rm /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html

COPY nginx/info.php /var/www/html/index.php

EXPOSE 8880