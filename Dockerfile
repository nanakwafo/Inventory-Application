FROM  php:7.2-fpm-alpine

RUN docker-php-ext-install pdo_mysql


RUN rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*

RUN apk update