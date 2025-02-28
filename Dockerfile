FROM php:8.1

WORKDIR /app
COPY . /app

CMD ["php", "-S", "0.0.0.0:4000", "router.php"]