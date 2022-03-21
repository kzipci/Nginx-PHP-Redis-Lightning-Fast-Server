FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        build-essential \
        zlib1g-dev \
        g++ \
        git \
        libicu-dev \
        zip \
        libzip-dev \
        zip \
        python \
        curl \
        vim \
    && docker-php-ext-install intl opcache pdo pdo_mysql mysqli \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install tokenizer \
    && apt-get clean all

#redisin çalışabilmesi için gerekli olan kısımlar -->

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN mkdir /var/log/php
RUN touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log

RUN curl -sS https://getcomposer.org/installer | php

COPY php/composer.json ./
RUN php composer.phar install

# <--

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY php/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/project