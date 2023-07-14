FROM php:apache

RUN apt-get update && apt-get install -y \
    wget \
    unzip \
    curl \
    libzip-dev \
    libicu-dev \
    libxml2-dev \
    libnss3-dev \
    git

RUN docker-php-ext-install \
    intl \
    pdo_mysql \
    zip

RUN printf "\n" | pecl install redis xdebug

# Composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php

# NodeJS
RUN apt-get update && apt-get install curl software-properties-common -y
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install nodejs -y

# Yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update
RUN apt-get install yarn -y

RUN apt clean

# Apache config
COPY apache.conf /etc/apache2/sites-available/symfony.conf
RUN a2dissite 000-default && a2ensite symfony
RUN a2enmod rewrite

# PHP config
COPY php.ini /usr/local/etc/php/conf.d/zz-custom.ini

WORKDIR /var/www
