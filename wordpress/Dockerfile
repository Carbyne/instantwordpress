FROM wordpress:4.8.0-php7.0-apache
RUN chown -R www-data:www-data /var/www/html
RUN echo "define('FS_METHOD', 'direct');" >> /usr/src/wordpress/wp-config-sample.php