FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
curl \
wget \
git \
libfreetype6-dev \
libjpeg62-turbo-dev \
libxslt-dev \
libicu-dev \
libmcrypt-dev \
libpng12-dev \
libxml2-dev \

&& docker-php-ext-install -j$(nproc) iconv mcrypt mbstring mysqli pdo_mysql zip \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install xsl
RUN docker-php-ext-install soap

COPY nginx/info.php /var/www/html/index.php

COPY nginx/info.conf /etc/nginx/conf.d/info.conf
RUN rm /etc/nginx/conf.d/default.conf



EXPOSE 8880