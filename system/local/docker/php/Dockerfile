FROM php:8.1-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get install -y libzip-dev libjpeg62-turbo-dev libfreetype6-dev zlib1g-dev libpng-dev mariadb-client vim \
  && docker-php-ext-install zip pdo_mysql

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

#Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin


WORKDIR /var/www/html
