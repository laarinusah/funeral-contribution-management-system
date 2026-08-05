FROM php:8.2-apache

# Install MySQL extension for PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy project files into Apache web directory
COPY . /var/www/html/

EXPOSE 80
CMD ["apache2-foreground"]