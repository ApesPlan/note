FROM php:7.3-fpm-alpine

RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    curl-dev \
    imagemagick-dev \
    libtool \
    libxml2-dev \
    postgresql-dev \
    sqlite-dev

# Install production dependencies
RUN apk add --no-cache \
    bash \
    curl \
    g++ \
    gcc \
    git \
    imagemagick \
    libc-dev \
    libpng-dev \
    make \
    mysql-client \
    nodejs \
    nodejs-npm \
    yarn \
    openssh-client \
    postgresql-libs \
    rsync \
    zlib-dev \
    libzip-dev

# Install PECL and PEAR extensions
RUN pecl install \
    imagick

# Install and enable php extensions
RUN docker-php-ext-enable \
    imagick
RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-install \
    curl \
    iconv \
    mbstring \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    pdo_sqlite \
    pcntl \
    tokenizer \
    xml \
    gd \
    zip \
    bcmath
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN wget https://getcomposer.org/installer
RUN php installer
RUN mv composer.phar /usr/local/bin/composer

# Install PHP_CodeSniffer
RUN composer global require "squizlabs/php_codesniffer=*"

##################

COPY ./custom/ /data
WORKDIR /data
RUN composer install

#################

RUN apk add nginx
RUN apk add openrc
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./bash/start.bash /data/start.bash

RUN chmod -R 777 /data/storage

WORKDIR /data
RUN chmod 777 start.bash

CMD ["bash","start.bash"]
