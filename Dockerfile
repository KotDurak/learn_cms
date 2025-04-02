FROM php:8.1

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug


WORKDIR /app
COPY . /appм

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

CMD ["php", "-S", "0.0.0.0:4000", "router.php"]