# image using php 8.2 with apache web
FROM php:8.2.12-apache

# Install mysqli extension
RUN apt-get update \
    && apt-get install -y \
        default-mysql-client \
        default-libmysqlclient-dev \
    && docker-php-ext-install mysqli

# Copy application files to the web server's document root
COPY . /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
