FROM php:8.0-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get install -y libzip-dev libxrender-dev libfontconfig1 libfontconfig1-dev fontconfig libjpeg62-turbo-dev libxext6 xfonts-75dpi xfonts-base libjpeg62-turbo-dev libfreetype6-dev zlib1g-dev libpng-dev fonts-ipafont mariadb-client vim \
  && docker-php-ext-install zip pdo_mysql

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

#Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

#PDF関係
ADD https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6.1-2/wkhtmltox_0.12.6.1-2.bullseye_arm64.deb /usr/local/src/
RUN dpkg -i /usr/local/src/wkhtmltox_0.12.6.1-2.bullseye_arm64.deb

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/html
