FROM php:7.2-fpm
ADD grpc.sh /grpc.sh
RUN apt-get update && apt-get install -y -q git rake ruby-ronn zlib1g-dev automake autoconf autogen libtool shtool && apt-get clean
RUN /grpc.sh
RUN pecl install protobuf
RUN echo "extension=grpc.so" >> /usr/local/etc/php/conf.d/docker-php-ext-grpc.ini
RUN docker-php-ext-enable protobuf
CMD ["php-fpm"]
