FROM php:8.3-apache

WORKDIR /var/www/html

# Mod Rewrite
RUN a2enmod rewrite

# Linux Library
RUN apt-get update -y && apt-get install -y \
    git \
    vim \
    curl \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev

# Composer
COPY --from=composer:2.2.6 /usr/bin/composer /usr/bin/composer

# PHP Extension
RUN docker-php-ext-install gettext intl pdo_mysql gd

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

RUN apt-get install -y libzip-dev \
    && docker-php-ext-install zip


# Install npm
RUN apt-get install -y wget

RUN wget https://nodejs.org/dist/v20.18.0/node-v20.18.0-linux-x64.tar.xz
RUN tar xvf node-v20.18.0-linux-x64.tar.xz
RUN cp -r node-v20.18.0-linux-x64/bin/* /bin/
RUN cp -r node-v20.18.0-linux-x64/include/* /usr/include/
RUN cp -r node-v20.18.0-linux-x64/lib/* /usr/lib/

RUN rm -r node-v20.18.0-linux-x64*

EXPOSE 80

