#!/bin/sh

cd `dirname $0`
cd ..

php -S 127.0.0.1:8000 -t public/ bin/router.php
