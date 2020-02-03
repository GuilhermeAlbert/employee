<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## About Employee

This project contains the back-end of the application. Check the release notes:

- [Laravel soft deletes](https://laravel.com/docs/5.8/eloquent#soft-deleting): Virtual destroy your data of database.

- [Redis](https://redis.io/documentation) Cache: Manage the cache with the NoSQL database Redis.

- [Image cache](http://image.intervention.io/use/cache)/image resize: Make a resize of the image but keep the aspect ratio of this. Also save the image in cache.

- [Unit tests](https://laravel.com/docs/master/http-tests) to check the feature branch.

- Complete resource CRUD with the RESTful API patters:

    `GET`: Index - Get all resources

    `GET`: Show - Get a specific resource

    `POST`: Store - Save a new resource

    `PUT/PATCH`: Update - Update a specific resource

    `DELETE`: Destroy - Delete a specific resource

- [Form request](https://laravel.com/docs/master/validation) for validate the request data.

- [Rules](https://laravel.com/docs/master/validation#custom-validation-rules) to validate specific system rules.

- [Resources](https://laravel.com/docs/master/eloquent-resources) to send the API response.

- [Command](https://github.com/GuilhermeAlbert/employee/blob/master/app/Console/Commands/CacheClear.php) to clear all application cache: `php artisan clear:all`

- API documentation with [Swagger Open API anotation](https://swagger.io/). Endpoint: `/api/documentation`

- Package of translation files: Messages in english and portuguese.

- [Passport](https://laravel.com/docs/master/passport) to authenticate on API.

----

## Getting Started
Perform configuration of the development environment using a web server, database, and PHP dependencies.

### Linux: Ubuntu 16.04 LTS
Perform the installation of Apache, MySQL, PHP and their modules.

```shell
sudo apt-get update
```

Install all necessary dependencies:

```shell
sudo apt-get install php7.2 php7.2-cli php7.2-common php7.2-xml php7.2-mbstring php7.2-pgsql php7.2-mysql php7.2-curl php7.2-gd php7.2-json curl -y
```

And then install the redis cache and php graphics extension.

```shell
sudo apt-get php-redis php-gd
```

Verify PHP version  `php -v`


```
PHP 7.2.17-1+ubuntu16.04.1+deb.sury.org+3 (cli) (built: Apr 10 2019 10:50:19) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.2.17-1+ubuntu16.04.1+deb.sury.org+3, Copyright (c) 1999-2018, by Zend Technologies
```

Start apache `sudo systemctl start apache2 && systemctl status apache2`

For installation of laravel, you first have to have the composer on your machine, if you can not download an executable from it and install the composer without too much trouble on your machine.

Click on the link to download:

```shell 
https://getcomposer.org/
```

With the composer on your Windows machine, we will install our utility, the Laravel Installer. First open your command prompt, just use the key combination `CTRL + R` and in the window that appears enter: `cmd`. After that press `ENTER` to open the prompt.

With the prompt open, type and execute the command below:

```shell 
composer global require "laravel/installer"
```

To access the application files, you need to download the repository in GitHub.


## Project installation

Perform cloning of the repository through GitHub:

```shell 
git clone https://github.com/GuilhermeAlbert/employee.git
```

Navigate through the folders on your computer until you reach the cloned folder:

```shell 
cd employee
```

Use the *composer* to perform the installation:

```shell 
composer install
```

Use the Node package Manager to install dependencies:

```shell 
npm install
```

You will need to configure the `.env` file for the project by setting the connection values to the database and if necessary, creating a new hash key.

```shell
cp .env.example .env
```

```shell
php artisan key:generate
```

## Creating database:
Create the database in your MySQL database manager environment:

```sql
CREATE DATABASE employee;
```

Use migrations to create the database tables:

```shell
php artisan migrate
```

Run all database factory fake data:

```shell
php artisan db:seed
```

Run this command to install passport auth:

```shell
php artisan passport:install
```

## Starting server
Start displaying the application from the server:

```shell
php artisan serve
```

If everything is correct, when running `php artisan serve` in the terminal, something like:

```
Laravel development server started: <http://127.0.0.1:8000>
```

----

## Unit tests

You can run the unit tests following the test docs above:

Use the following commands to run unit tests. 

##### Specific test

To run a specific tests, use the following command: 

`./vendor/bin/phpunit --filter testGetSuccess ./tests/Unit/IndexFuncionarioTest`.

`./vendor/bin/phpunit --filter testGetFail ./tests/Unit/IndexFuncionarioTest`.

You can see all possible unit tests here: [https://github.com/GuilhermeAlbert/employee/tree/master/tests/Unit](https://github.com/GuilhermeAlbert/employee/tree/master/tests/Unit)

Explaining: 

**`testGetSuccess`**: Method name.

**`./tests/Unit/IndexFuncionarioTest`**:  Class name.

##### All tests

To run all tests, use the following command: `./vendor/bin/phpunit`.
