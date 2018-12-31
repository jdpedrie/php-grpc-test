FROM php:7.2-fpm
RUN apt-get update && apt-get install -y -q git rake ruby-ronn zlib1g-dev && apt-get clean
RUN pecl install grpc
RUN pecl install protobuf
RUN docker-php-ext-enable grpc protobuf
CMD ["php-fpm"]
