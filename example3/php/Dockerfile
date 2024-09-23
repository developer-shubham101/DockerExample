FROM php:7.4-apache

# Install MySQL extension for PHP
RUN docker-php-ext-install mysqli

# Enable mod_rewrite (optional, if you're using frameworks like Laravel)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html
