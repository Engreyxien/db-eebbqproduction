FROM richarvey/nginx-php-fpm:latest

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV DB_CONNECTION pgsql
ENV DB_HOST dpg-cqcsi5pu0jms73e46f80-a.singapore-postgres.render.com
ENV DB_PORT 5432
ENV DB_DATABASE db_eleloheproduction
ENV DB_USERNAME db_eleloheproduction_user
ENV DB_PASSWORD NzHKkT5bapWPHbVtEOsGzItYBKggQack

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]