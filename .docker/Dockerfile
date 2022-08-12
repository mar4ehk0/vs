FROM php:8.1.4-cli-alpine3.15 AS base-runtime

ARG APP_DOMAIN="mydomain.com"

ENV PS1='\[\033[1;36m\][${DOCKER_USER-user}@\H] \[\033[1;34m\]\w\[\033[0;35m\] \[\033[1;36m\]# \[\033[0m\]'
ENV HOME="/home/user"

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_HOME="${HOME}/.composer"

# install roadrunner, image page: <https://hub.docker.com/r/spiralscout/roadrunner>
COPY --from=spiralscout/roadrunner:2.7.5 /usr/bin/rr /usr/bin/rr

# install composer, image page: <https://hub.docker.com/_/composer>
COPY --from=composer:2.2.6 /usr/bin/composer /usr/bin/composer

# create directory for application sources and roadrunner unix socket
RUN mkdir -p /var/run/rr ${COMPOSER_HOME}/cache /app \
    && chmod -R 775 "$HOME" /app \
    && chmod -R 777 /var/run/rr  ${COMPOSER_HOME}/cache \
    && chown -R www-data:www-data /app /var/run/rr

RUN set -x \
    # install permanent dependencies
    && apk add --no-cache  \
        libjpeg-turbo-dev \
        freetype-dev \
        libavif-dev \
        libwebp-dev \
        libpng-dev \
        libzip-dev \
        icu-dev \
        less \
        zip \
        libpq-dev \
        nodejs  \
        npm \
    # install build-time dependencies
    && apk add --no-cache --virtual .build-deps \
        autoconf \
        openssl \
        make \
        g++
    # install PHP extensions
RUN docker-php-ext-configure gd --with-avif --with-jpeg --with-webp --with-freetype &&  \
    CFLAGS="$CFLAGS -D_GNU_SOURCE" docker-php-ext-install -j$(nproc) \
     sockets \
     opcache \
     pcntl \
     intl \
     zip \
     gd

RUN docker-php-ext-install exif
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl 'http://pecl.php.net/get/redis-5.3.5.tgz' -o redis-5.3.5.tgz && pecl install redis-5.3.5.tgz \
 && rm -rf redis-5.3.5.tgz && rm -rf /tmp/pear \
 && docker-php-ext-enable redis

# install supercronic (for laravel task scheduling), project page: <https://github.com/aptible/supercronic>
RUN  wget -q "https://github.com/aptible/supercronic/releases/download/v0.1.12/supercronic-linux-amd64" \
         -O /usr/bin/supercronic \
    && chmod +x /usr/bin/supercronic \
    && mkdir /etc/supercronic \
    && echo '*/1 * * * * php /app/artisan schedule:run' > /etc/supercronic/laravel \
    # generate self-signed SSL key and certificate files
    && mkdir /etc/ssl/private \
    && openssl req -x509 -nodes -days 1095 -newkey rsa:2048 \
        -subj "/C=CA/ST=QC/O=Company, Inc./CN=${APP_DOMAIN}" \
        -addext "subjectAltName=DNS:${APP_DOMAIN}" \
        -keyout /etc/ssl/private/selfsigned.key \
        -out /etc/ssl/certs/selfsigned.crt \
    && chmod 644 /etc/ssl/private/selfsigned.key

# make clean up
RUN  docker-php-source delete && apk del .build-deps

WORKDIR /app

ENTRYPOINT []



FROM base-runtime AS develop-runtime

# install debuger
RUN apk --no-cache add shadow autoconf make g++ \
 && curl 'http://pecl.php.net/get/xdebug-3.1.5.tgz' -o xdebug-3.1.5.tgz && pecl install xdebug-3.1.5.tgz \
 && rm -rf xdebug-3.1.5.tgz && rm -rf /tmp/pear \
 && docker-php-ext-enable xdebug
COPY ./.docker/resources/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini



FROM base-runtime AS production-runtime

COPY ./.docker/resources/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# copy composer (json|lock) files for dependencies layer caching
COPY ./src/composer.* /app/

# install composer dependencies (autoloader MUST be generated later!)
RUN composer install -n --no-dev --no-cache --no-ansi --no-autoloader --no-scripts --prefer-dist

# copy application sources into image (completely)
COPY ./src /app/

RUN chown -R www-data:www-data /app/composer.*

RUN set -x \
    # generate composer autoloader and trigger scripts
    && composer dump-autoload -n --optimize \
    && php ./artisan storage:link