FROM php:8.2.4-fpm
WORKDIR "/app"

RUN docker-php-ext-install pdo_mysql

RUN apt-get update \
#    && apt-get -y --no-install-recommends install php8.1-mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
