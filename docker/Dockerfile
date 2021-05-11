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
#RUN npm install --save-dev chokidar

# Set working directory
WORKDIR /app

# Parallel install
#RUN composer global require hirak/prestissimo

RUN composer create-project laravel/laravel apis --prefer-dist

WORKDIR /app/api

CMD ["sleep", "1000"]

# RUN cd api && \
# 	composer require laravel/octane && \
# 	chmod +x artisan && \
# 	php artisan octane:install
# 
# RUN composer require spiral/roadrunner && \
# 	./vendor/bin/rr get-binary && \
# 	chmod u+x rr
# 
# CMD ["php", "artisan", "octane:start"]