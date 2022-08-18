# laravel_simple_blog
<p> <b>This is a simple web application focusing of blog activies/actions</b>.<br><br>Laravel offers Better authentication and Authorization option such as Login, Registration, and Password Reset. You will be surprised to witness that Laravel does all this with the help of a single command. It also provides a simple way to organize authorization logic and control access to resources.<br>
Laravel helps you to stay from technical vulnerabilities ‘Security Vulnerabilities.’ A study by OWASP Foundation describes SQL injection, cross-site request forgery, cross-site scripting, etc. as the most critical web application security vulnerabilities.</br>
Laravel architecture is MVC-based, and this is something that makes Laravel the best PHP framework for website development.MVC architecture comes up with built-in functionalities that developers can use at their best while building your web app. Apart from this, MVC architecture provides better documentation, improved performance, and multiple built-in functionalities compared to other PHP frameworks.
</p>

# The following Laravel Concepts are Covered under this Projects
1. Registering users
2. Signing in after registration
3. Authenticated state
4. Logging in and Logout
5. Middleware(to archive authorization)
6. User/post relationship
7. Pagination(using Boostrap)
8. Seeding with model factories
9. Eager loading(to reduce number of query)
10. Blade components
11. Like count Eloquent relationship
12. Sending email(using mailtrap)
13. Soft deleting models

> This Project specification.

- Laravel Framework 8.8.2
- php version 8.4
- mysql  Ver 8.0.30
- boostrap 4.0
- Composer 2.3.10
- 

### Installation

1. Clone repo
   ```sh
   git clone https://github.com/your_username_/Project-Name.git
   ```
2. Run Composer install
   ```sh
   composer install
   ```
3. Copy .env.example to .env
    ```sh
   cp .env.example .env
   ```
4. Generate Key
    ```sh
   php artisan key:generate
   ```
5. add these configuration on .env file
    ```sh
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=blog
    DB_USERNAME=blog

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=1462162b6282d8
    MAIL_PASSWORD=ea91eb509f0e77
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=johndoe@gmail.com
   ```
6. Create Database named blog

8. install dbal package for database schema introspection and management.
    ```sh
   composer require doctrine/dbal
   ```


7. Run php artisan migrate to add tables into database
    ```sh
   php artisan migrate
   ```

8. Run php artisan serve to Start the application
    ```sh
   php artisan serve
   ```

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

