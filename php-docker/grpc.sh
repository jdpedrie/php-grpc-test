#!/bin/bash

git clone https://github.com/jdpedrie/grpc.git
cd grpc
git checkout channel-debugging
git submodule update --init
make
make install
cd src/php/ext/grpc
phpize
./configure
make
make install
mv modules/grpc.so /usr/local/etc/php/conf.d/grpc.so
cd ../../../../../
rm -rf grpc
