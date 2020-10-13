FROM php:7.2-apache

# Update system & Tools
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    apt-utils \
    wget \
    git \
    nano \
    iputils-ping \
    locales \
    imagemagick \
    graphicsmagick \
    ghostscript


# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql gd mbstring bcmath json xml mbstring


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*


# ======= composer =======
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set locales
RUN locale-gen en_US.UTF-8 en_GB.UTF-8 de_DE.UTF-8 es_ES.UTF-8 fr_FR.UTF-8 it_IT.UTF-8 km_KH sv_SE.UTF-8 fi_FI.UTF-8



RUN a2enmod rewrite

RUN chmod 777 -R -c /var/www
