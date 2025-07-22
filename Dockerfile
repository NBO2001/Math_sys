# Stage 1: Composer dependencies
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Stage 2: Runtime com PHP 8 e Apache
FROM php:8.2-apache

# Copia o Composer para o ambiente de runtime
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala git, zip, unzip e extensões PHP necessárias
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        zip \
        libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*


# Configura o DocumentRoot
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf && \
    a2enmod rewrite

# Copia o vendor do stage anterior
COPY --from=vendor /app/vendor /var/www/html/vendor

# Copia o restante do código
COPY . /var/www/html

RUN composer update
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress 


EXPOSE 80
CMD ["apache2-foreground"]
