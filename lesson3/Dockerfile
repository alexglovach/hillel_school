FROM ubuntu

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get clean && apt-get -y update && apt-get install -y locales curl software-properties-common git

RUN apt-get install -y nginx nano

RUN add-apt-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y php7.3-bz2 php7.3-cli php7.3-curl php7.3-dev php7.3-fpm

COPY nginx/info.conf /etc/nginx/sites-available/default
COPY nginx/info.php /var/www/html/index.php


RUN echo '#!/bin/bash' >> /root/start.sh \
 && echo '/usr/sbin/service php7.3-fpm start' >> /root/start.sh \
 && echo '/usr/sbin/service nginx start' >> /root/start.sh \
 && echo 'tail -f /dev/null' >> /root/start.sh \
 && chmod +x /root/start.sh

WORKDIR /root

CMD ["./start.sh"]