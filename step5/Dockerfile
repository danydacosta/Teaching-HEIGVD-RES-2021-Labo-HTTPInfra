FROM php:7.4-apache

COPY apache2-foreground /usr/local/bin/

COPY templates /var/apache2/templates

RUN a2enmod proxy proxy_http
RUN a2ensite 000-*
