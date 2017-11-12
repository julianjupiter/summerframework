#!/bin/sh

##########################################################################
# Warning:                                                               #
# This web server was designed to aid application development.           #
# It may also be useful for testing purposes or for application          #
# demonstrations that are run in controlled environments.                #
# It is not intended to be a full-featured web server.                   #
# It should not be used on a public network.                             #
# Taken from http://php.net/manual/en/features.commandline.webserver.php #
##########################################################################

/usr/bin/php -S 127.0.0.1:8000 -t public/ bin/router.php