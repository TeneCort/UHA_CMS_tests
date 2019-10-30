#FROM php:7.2

#RUN apt update && apt install -y apt-utils sendmail mariadb-client pngquant unzip zip libpng-dev libmcrypt-dev git \
#  curl libicu-dev libxml2-dev libssl-dev libcurl4 libcurl3-dev libsqlite3-dev libsqlite3-0
#RUN docker-php-ext-install mysqli bcmath gd intl xml curl pdo_mysql pdo_sqlite hash zip dom session opcache

#ENV APACHE_DOCUMENT_ROOT /var/www/html/public

#RUN a2enmod rewritelocalhost

FROM php:7.2-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./public/index.php" ]