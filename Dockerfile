FROM php:8.2.17-zts-alpine3.18

RUN apk update && apk add \
    git \
    curl \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip

RUN apk add --no-cache nodejs npm

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

RUN npm run build
CMD php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000