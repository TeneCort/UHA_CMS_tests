#FROM php:7.2

#RUN apt update && apt install -y apt-utils sendmail mariadb-client pngquant unzip zip libpng-dev libmcrypt-dev git \
#  curl libicu-dev libxml2-dev libssl-dev libcurl4 libcurl3-dev libsqlite3-dev libsqlite3-0
#RUN docker-php-ext-install mysqli bcmath gd intl xml curl pdo_mysql pdo_sqlite hash zip dom session opcache

#ENV APACHE_DOCUMENT_ROOT /var/www/html/public

#RUN a2enmod rewritelocalhost

FROM php:7.2-apache

RUN apt-get update 
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
RUN apt-get -y install sudo
COPY . /var/www/html/
WORKDIR ./public
RUN chmod -R 777 .
EXPOSE 80
