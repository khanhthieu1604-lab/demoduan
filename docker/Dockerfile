FROM wyveo/nginx-php-fpm:php74

WORKDIR /var/www/html

# Copy packages
COPY . .
ADD docker/config/app.conf /etc/nginx/conf.d/default.conf

# Install packages
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN php artisan config:cache
RUN chmod -R 777 /var/www/html/storage/

EXPOSE 8080
