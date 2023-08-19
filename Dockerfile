FROM phpswoole/swoole:5.0.1-php8.2-alpine
ENV APP_HOME=/var/www
COPY . $APP_HOME
WORKDIR $APP_HOME
RUN composer install
EXPOSE 9501
ENTRYPOINT ["php", "server.php"]