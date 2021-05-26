FROM php:7.4-apache

COPY apache2-foreground /usr/local/bin/

COPY templates /var/apache2/templates

# COPY config/ /etc/apache2

RUN a2enmod proxy proxy_http
RUN a2ensite 000-*
