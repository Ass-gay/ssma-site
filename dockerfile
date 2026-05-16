FROM php:8.2-cli

COPY . /app

WORKDIR /app

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=10000
