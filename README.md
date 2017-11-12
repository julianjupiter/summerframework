# Summer Framework
Summer Framework is a PHP MVC microframework. It is intended to be simple so that one can easily learn MVC in PHP. It does not include any external library or framework. There are a lot of boilerplates. The only magic is the simple routing which is inspired by AltoRouter.

## Cloning
To clone this project, simply execute the following command using Terminal:
```
$ git clone git://github.com/julianjupiter/summerframework.git
```
Or:
```
$ git clone https://github.com/julianjupiter/summerframework.git
```
You can also download it by clicking the **Clone or download** button.

## Running
To run this project, create database first:
```
CREATE DATABASE summerframework;
USE summerframework;
CREATE TABLE IF NOT EXISTS contact (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    mobile_no VARCHAR(11) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email_address VARCHAR(255) NOT NULL DEFAULT '',
    date_created DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id)
);
```
Go to the project directory:
```
$ cd summerframework
```
And execute **bin/server.sh** script. This will run the PHP built-in web server with port 8000 (can be changed to any available port) - as of PHP 5.4.0, the CLI SAPI provides a built-in web server.
```
$ ./bin/server.sh
```
This is the output in my personal machine:
```
...
PHP 7.0.22-0ubuntu0.16.04.1 Development Server started at Sun Nov 12 22:54:12 2017
Listening on http://127.0.0.1:8000
Document root is /home/julez/Workspace/php/summerframework/public
Press Ctrl-C to quit.
``` 
Open your browser and point it to http://127.0.0.1:8000.

## Adding Page
1. Add controller.
2. Add model.
3. Add views.
4. Add route.

For example, if you want create pages about Book, just copy existing example:
    - Controller/ContactController.php
    - Model/Contact.php
    - View/contact

And rename as:

    - Controller/BookController.php
    - Model/Book.php
    - View/book

Do edit the contents of the files acording to the requirements.

For the routes, edit index.php. By simply looking at existing routes, you can easily come up with routes for books.