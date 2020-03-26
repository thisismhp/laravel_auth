# Laravel Authenticate middleware with except routes

A php class for laravel framework that add routes except to authenticate middleware

# Usage

In app/Http/Middleware/Authenticate.php change

use Illuminate\Auth\Middleware\Authenticate as Middleware;

with 

use LaravelAuthExcept\Authenticate as Middleware;

and fill except array like below :

$except = ['/foo', '/bar/' => ['GET', 'POST']];

we not support dynamic route yet. ('post/{id}');

#TODO

Add support for dynamic routes.