@echo off
rem ########################################################################
rem Warning:                                                               #
rem This web server was designed to aid application development.           #
rem It may also be useful for testing purposes or for application          #
rem demonstrations that are run in controlled environments.                #
rem It is not intended to be a full-featured web server.                   #
rem It should not be used on a public network.                             #
rem Taken from http://php.net/manual/en/features.commandline.webserver.php #
rem ########################################################################

php -S 127.0.0.1:8000 -t public/ bin/router.php