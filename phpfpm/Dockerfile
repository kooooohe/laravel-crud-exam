FROM php:7.4-fpm
RUN apt-get update \
&& apt-get install -y libpq-dev libmemcached-dev zlib1g-dev \
&& docker-php-ext-install pdo_mysql \
&& pecl install memcached-3.1.5 \
&& docker-php-ext-enable memcached
WORKDIR /app
