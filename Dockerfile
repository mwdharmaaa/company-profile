FROM php:8.3-cli-alpine

RUN apk add --no-cache \
    git \
    curl \
    sqlite \
    sqlite-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_sqlite zip pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN if [ ! -f .env ]; then cp .env.example .env; fi \
    && mkdir -p database storage bootstrap/cache \
    && touch database/database.sqlite \
    && composer install --no-interaction --prefer-dist --optimize-autoloader \
    && php artisan key:generate --force \
    && php artisan migrate --force \
    && php artisan db:seed --force \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
