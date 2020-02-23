FROM  php:7.2-fpm-alpine

RUN docker-php-ext-install pdo_mysql
RUN apt-get install php7.2-gd

RUN rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*

RUN apk update