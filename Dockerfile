FROM php:7.2-apache

# Update system & Install PHP extensions
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
&& docker-php-ext-install mysqli pdo pdo_mysql gd mbstring bcmath

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install NPM for Node
RUN npm install


RUN a2enmod rewrite

RUN chmod 777 -R -c /var/www
