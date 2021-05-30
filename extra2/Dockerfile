FROM php:7.4-apache

# Copy apache2-foreground script + giving execute auth. in image
COPY apache2-foreground /usr/local/bin/
RUN chmod 755 /usr/local/bin/apache2-foreground

COPY templates /var/apache2/templates

RUN apt-get update
RUN apt-get install -y nano tcpdump

RUN a2enmod headers proxy proxy_http proxy_balancer lbmethod_byrequests
RUN a2ensite 000-*
