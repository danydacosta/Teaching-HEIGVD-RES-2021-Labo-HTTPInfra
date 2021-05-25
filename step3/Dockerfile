FROM php:7.4-apache


COPY config/ /etc/apache2

RUN a2enmod proxy proxy_http
RUN a2ensite 000-* 001-*
