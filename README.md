# Simple API

## Description

This repository is a simple PHP API structure from [Simple MVC](https://github.com/WildCodeSchool/simple-mvc).

It uses some cool vendors/libraries such as Grumphp.
For this one, just a simple example where users can choose one of their databases and see tables in it.

## Steps

1. Clone the repo from Github.
2. Run `composer install`.
3. Create *config/db.php* from *config/db.php.dist* file and add your DB parameters. Don't delete the *.dist* file, it must be kept.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PWD', 'your_db_password');
```
4. Import `simple-mvc.sql` in your SQL server,
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.
7. From this starter kit, create your own web application.

This project is for DEV and POC only. If you want to use it in production, please configure Access-Control-Allow-Origin in index.php 

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`

## URLs availables

* [GET] - Items list at [localhost:8000/item/all](localhost:8000/item/all) (To approch a restful semantic, index (in simple-mvc) has been replaced by all)
* [GET] - Item details [localhost:8000/item/index/show/:id](localhost:8000/item/show/2)
* [PUT] - Item edit [localhost:8000/item/index/edit/:id](localhost:8000/item/edit/2)
* [POST] - Item add [localhost:8000/item/index/add](localhost:8000/item/add) 
* [DELETE] - Item deletion [localhost:8000/item/index/delete/:id](localhost:8000/item/delete/2)


