FROM php:8

# Install system dependencies
RUN apt-get update && apt-get install -y git

#install swoole
RUN pecl install swoole

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# lib to watch
RUN npm install --save-dev chokidar

# Set working directory
WORKDIR /app