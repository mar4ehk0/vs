FROM php:8.1.4-fpm-alpine3.15  AS base-runtime

ENV PS1='\[\033[1;36m\][${DOCKER_USER-user}@\H] \[\033[1;34m\]\w\[\033[0;35m\] \[\033[1;36m\]# \[\033[0m\]'
#ENV HOME="/home/user"

ENV COMPOSER_ALLOW_SUPERUSER=1
#ENV COMPOSER_HOME="${HOME}/.composer"

ARG DOCKER_GROUP_NAME
ARG DOCKER_USER_UID
ARG DOCKER_USER
ARG DOCKER_USER_GID
ARG WEBROOT_PATH
ARG PUBLIC_PATH
ARG STORAGE_PATH
ARG APP_DOMAIN

# install composer, image page: <https://hub.docker.com/_/composer>
COPY --from=composer:2.2.6 /usr/bin/composer /usr/bin/composer

RUN addgroup -g $DOCKER_USER_GID $DOCKER_GROUP_NAME && \
    adduser -D -u $DOCKER_USER_UID $DOCKER_USER -G $DOCKER_GROUP_NAME && \
    mkdir -p $WEBROOT_PATH && \
    chown $DOCKER_USER: $WEBROOT_PATH

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

RUN docker-php-ext-install exif \
 && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
 && docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl 'http://pecl.php.net/get/redis-5.3.5.tgz' -o redis-5.3.5.tgz && pecl install redis-5.3.5.tgz \
 && rm -rf redis-5.3.5.tgz && rm -rf /tmp/pear \
 && docker-php-ext-enable redis

# make clean up
RUN  docker-php-source delete && apk del .build-deps

COPY ./docker/php/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

RUN sed -i "s|%DOCKER_USER%|$DOCKER_USER|" /usr/local/etc/php-fpm.d/zz-docker.conf \
    && sed -i "s|%DOCKER_GROUP_NAME%|$DOCKER_GROUP_NAME|" /usr/local/etc/php-fpm.d/zz-docker.conf

#RUN wget -O /usr/local/bin/php-fpm-healthcheck \
#https://raw.githubusercontent.com/renatomefi/php-fpm-healthcheck/master/php-fpm-healthcheck \
#&& chmod +x /usr/local/bin/php-fpm-healthcheck

WORKDIR $WEBROOT_PATH

FROM base-runtime AS develop-runtime
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

## install debuger
#RUN apk --no-cache add shadow autoconf make g++ \
# && curl 'http://pecl.php.net/get/xdebug-3.1.5.tgz' -o xdebug-3.1.5.tgz && pecl install xdebug-3.1.5.tgz \
# && rm -rf xdebug-3.1.5.tgz && rm -rf /tmp/pear \
# && docker-php-ext-enable xdebug
#COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini