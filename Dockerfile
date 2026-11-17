FROM php:8.2-cli AS dependencies

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libcurl4-openssl-dev \
        libicu-dev \
        libonig-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-install -j"$(nproc)" curl intl mbstring zip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader

FROM php:8.2-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# gd: Dompdf needs it to embed the PNG logos in certificates.
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libfreetype6-dev \
        libicu-dev \
        libjpeg62-turbo-dev \
        libonig-dev \
        libpng-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" gd mysqli intl mbstring zip \
    && a2enmod rewrite \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf \
        /etc/apache2/apache2.conf \
        /etc/apache2/conf-available/*.conf \
    && sed -ri -e 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf \
    && { echo 'memory_limit=512M'; echo 'upload_max_filesize=32M'; echo 'post_max_size=40M'; echo 'max_execution_time=120'; } \
        > /usr/local/etc/php/conf.d/rml.ini \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=dependencies /app/vendor ./vendor
COPY app ./app
COPY public ./public
COPY system ./system
COPY writable ./writable
COPY spark composer.json composer.lock env ./
COPY docker/entrypoint.sh /usr/local/bin/rml-entrypoint

# Strip CR in case the script was checked out with Windows line endings.
RUN sed -i 's/\r$//' /usr/local/bin/rml-entrypoint \
    && chmod +x /usr/local/bin/rml-entrypoint \
    && mkdir -p writable/cache writable/logs writable/session writable/uploads \
    && chown -R www-data:www-data writable

EXPOSE 80

ENTRYPOINT ["rml-entrypoint"]
CMD ["apache2-foreground"]
