FROM php:7.4-fpm

# Install extensions
RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]