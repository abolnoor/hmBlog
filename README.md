<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About HMBlog

Laravel web application has a Blog system to manage articles and tags and user management, a website to display the posts and tag.
with 3 levels of authorization Role : Admin, Editor, Normal.

## Installation
0- cd in the project folder
1- > composer install
2- > php artisan migrate fresh 
    or import the db dump file, pre defiend users:
    email: admin@test.test password: 123123123
    email: editor@test.test password: 123123123
    email: normal@test.test password: 123123123
3- php artisan serve

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
