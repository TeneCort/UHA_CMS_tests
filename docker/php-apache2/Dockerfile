#FROM php:7.2

#RUN apt update && apt install -y apt-utils sendmail mariadb-client pngquant unzip zip libpng-dev libmcrypt-dev git \
#  curl libicu-dev libxml2-dev libssl-dev libcurl4 libcurl3-dev libsqlite3-dev libsqlite3-0
#RUN docker-php-ext-install mysqli bcmath gd intl xml curl pdo_mysql pdo_sqlite hash zip dom session opcache

#ENV APACHE_DOCUMENT_ROOT /var/www/html/public

#RUN a2enmod rewritelocalhost

FROM php:7.3-apache
#Install git
RUN apt-get update \
    && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
#Install Composer
#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
#RUN php composer-setup.php --install-dir=. --filename=composer
#RUN mv composer /usr/local/bin/
COPY . /var/www/html/
EXPOSE 80