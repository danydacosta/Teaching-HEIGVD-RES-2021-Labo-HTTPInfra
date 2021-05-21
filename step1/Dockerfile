FROM ubuntu:latest
MAINTAINER Dany da Costa  <danydc@comac.ch>

# Install apache, PHP
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt install -y apache2 php php-cli php-fpm php-json php-common php-mysql \
 php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath

# Enable apache mods.
RUN a2enmod proxy_fcgi setenvif
RUN a2enconf php7.4-fpm
RUN a2enmod socache_shmcb
RUN a2enmod ssl
RUN a2enmod proxy
RUN a2enmod proxy_http
RUN a2enmod proxy_balancer
RUN a2enmod lbmethod_byrequests
RUN a2enmod rewrite

# Copy the html files
COPY ./public-html/ /var/www/html/

EXPOSE 80

# By default start up apache in the foreground
CMD ["apachectl", "-D", "FOREGROUND"]
