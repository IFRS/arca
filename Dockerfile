FROM php:7.2-apache

# Install PHP extensions & cron & git & unzip
RUN apt-get update && apt-get install -qq \
      libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      zlib1g-dev \
      rsyslog \
      git \
      unzip \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install \
      intl \
      mbstring \
      pdo_mysql \
      opcache \
      zip

# Install composer & php unit
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
      && curl https://phar.phpunit.de/phpunit.phar -L > phpunit.phar \
      && chmod +x phpunit.phar \
      && mv phpunit.phar /usr/local/bin/phpunit \
      && phpunit --version

# Change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf; \
	sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf; \
  a2enmod rewrite

WORKDIR /var/www/html

EXPOSE 80 443

COPY composer.json ./
COPY composer.lock ./

RUN composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --no-autoloader

COPY --chown=www-data:www-data ./ ./

RUN composer dump-autoload --optimize
