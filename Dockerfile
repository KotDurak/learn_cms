FROM php:8.1

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-install zip pdo pdo_pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN usermod -u ${USER_ID} www-data && \
    groupmod -g ${GROUP_ID} www-data

WORKDIR /app
COPY . /app
RUN chown -R www-data:www-data /app

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

USER www-data
CMD ["php", "-S", "0.0.0.0:4000", "router.php"]