<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Useful command:
```
## Setup:
php artisan sail:install
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
sail artisan migrate
sail artisan migrate:fresh --seed //Run migration from the beginning and run seeds
sail up
# sail artisan sail:publish //Add docker files into docker folder

sail artisan make:controller PostController --resource --model=Post
sail artisan vendor:publish --tag=laravel-pagination //Access to pagination template
sail artisan make:component PostItem //Generate class based view component
sail artisan storage:link //Create symblink to the public folder from the storage folder
sail artisan make:request PostCreateReques 
sail artisan queue:work //Listen for queues
sail artisan route:list --except-vendor
sail artisan make:policy //Auth, authorize policies generator
sail artisan make:mail

## Local variant
php artisan serve
php artisan make:migration create_posts_table
php artisan migrate

php artisan make:controller UserController
php artisan make:model Post
php artisan db:show
php artisan db:table

## Test
sail artisan db:seed //Run DatabaseSeeder
sail artisan db:seed --class=JobSeeder //Run concrete seeder


```

## Packages
- monolog/monolog for logging
- laravel breeze for authentication logic(Blade with Alpine.js )
- Pest for testing
- spatie/laravel-medialibrary for working with media files
- spatie/laravel-sluggable for generating slugs for models
- barryvdh/laravel-debugbar --dev for local debugging
### Frontent
- flowbite components: https://flowbite.com/docs/components/tabs/
- tailwincss.com for layout template:  https://tailwindcss.com/plus/ui-blocks/application-ui/application-shells/stacked 
- https://heroicons.com/ for SVG icons

### Inspired by @see 
- https://www.youtube.com/watch?v=MG1kt_wiIz0 
- https://www.youtube.com/watch?v=9O_WD5zQGxM&list=PL3VM-unCzF8hy47mt9-chowaHNjfkuEVz&index=10
