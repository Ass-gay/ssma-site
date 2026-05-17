FROM php:8.2-cli

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev

# Installer extensions PHP nécessaires
RUN docker-php-ext-install zip pdo pdo_mysql

# Installer composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# IMPORTANT : utiliser zip + ignore platform fix
RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 10000

CMD php -S 0.0.0.0:10000 -t public