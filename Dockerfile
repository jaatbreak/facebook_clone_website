# Use PHP 8.2 with Apache as the base image
FROM php:8.2.12-apache

# Install mysqli extension
RUN apt-get update \
    && apt-get install -y \
        default-mysql-client \
        default-libmysqlclient-dev \
    && docker-php-ext-install mysqli

# Copy application files to the web server's document root
COPY . /var/www/html

# Copy the custom Apache configuration file
COPY facebook.conf /etc/apache2/sites-available/facebook.conf

# Enable the custom configuration and disable the default one
RUN a2dissite 000-default.conf \
    && a2ensite facebook.conf

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

