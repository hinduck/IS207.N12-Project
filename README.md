<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

<!-- Banner -->
<p align="center">
  <a href="https://www.uit.edu.vn/" title="Trường Đại học Công nghệ Thông tin" style="border: none;">
    <img src="https://i.imgur.com/WmMnSRt.png" alt="Trường Đại học Công nghệ Thông tin | University of Information Technology">
  </a>
</p>

<h1 align="center"><b>Phát triển ứng dụng web - IS207.N12</b></h>

## GIỚI THIỆU MÔN HỌC

- **Tên môn học:** Phát triển ứng dụng web
- **Mã môn học:** IS207
- **Mã lớp:** IS207.N12
- **Năm học:** HK1 (2022 - 2023)
- **Giảng viên**: ThS Mai Xuân Hùng

# IS207.N12 - Group 16 - BaoThuFood eCommerce Website
### Members
| ID   | Full Name                        | Student ID     | Phone        | Performance  | Rate |
| --- |----------------------------|----------|------------|-----------|----------|
| 1 | [Nguyễn Hiền Đức - Hinduck](https://www.facebook.com/hinduck.0611) | 20520450 | 0937811400 | Leader, thiết kế hệ thống, thiết kế database, quản lý công việc chung, xử lý back-end, tìm hiểu chức năng nâng cao, viết báo cáo | 100% |
| 2 | [Nguyễn Huỳnh Vương Quốc - Coup](https://www.facebook.com/43quocnguyen) | 20521813 | 0797129609 | Thiết kế giao diện, viết front-end, hỗ trợ xây dựng database, viết báo cáo | 100% |
| 3 | [Nguyễn Bảo Anh - Banh](https://www.facebook.com/banh.2992) | 20521068 | 0866414791 | Hỗ trợ full-stack, viết báo cáo, thiết kế các chức năng nâng cao, đưa ra các yêu cầu cho hệ thống | 100% |


# Instruction set up Project
This is the guideline about setting up The BaoThuFood - eCommerce Website at localhost - A Project of Web Development Subject - IS207.N12 at The University of Information Technology.

## Applications need to run project

1. ### Xampp/Wamp
Xampp or Wamp is used as a local development server. But we recommend to install Xampp since it works with almost platforms like Mac, Linux, Windows, etc,...and Xampp also supports Perl, PHP, MySQL whereas WAMP supports only PHP & MySQL and is not available for Mac.
So, all the steps below will be instructed as using Xampp.
Link download Xampp: https://www.apachefriends.org/download.html
After installing, open "XAMPP Control Panel" and start two modules "Apache" and "MySQL". When two modules turns green it means XAMPP is available.
* If two modules that you have started doesn't turn to green (maybe yellow or red) that means you have some trouble in the default port (80).
* But it doesn't matter! You could solve this problem by the keyword "change XAMPP apache server port".

2. ### Visual Studio Code
VSCode is an IDE used to develop the website.
Link download VSCode: https://code.visualstudio.com/

3. ### Composer
A Dependency Manager for PHP
Link download Composer: https://getcomposer.org/download/

## How to running
1. ### Step 1:
* Go to the "xampp" folder that you have install in your computer (find in the main hard disk (C:)).
* Then go to "htdocs" folder and git clone the repo here (Usually C:/xampp/htdocs> git clone https://github.com/hinduck/IS207.N12-Project).

2. ### Step 2:
* Open the "IS207.N12-Project" folder that you have just cloned by VSCode, so you could edit codes from now.
* You can open this folder in after open VSCode or right click on the folder and choose "Open with VSCode".

3. ### Step 3:
* Open "xampp" on your browser (Ex: http://localhost/phpmyadmin).
* Create new Database with random name (Ex: web).
* Set DB collation as "utf8_unicode_ci".
* Choose "Import" database file: web.sql.
* Click "Go" if you don't want to change in database.
* After that, your database has been created.

4. ### Step 4:
* Open terminal in VSCode.
* Type: "composer install/update --ignore-platform-reqs" to install/update composer to running app.
* Type: "cp .env.example .env" to copy file ".env" from ".env.example".
* Edit DB_NAME in ".env" file as your database name in step 3.
* Running 3 commands:
    - "php artisan key:generate" to generate project's key.
    - "php artisan migrate" to migrate your database.
    - "php artisan serve" and open your browser with link appear in the command line.
* Now you can run project with database in localhost.
