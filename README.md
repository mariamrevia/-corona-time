## The Coronatime App

The Coronatime App consists of several pages it offers visitors access to COVID-19 statistics from around the world. Users can choose their prefered lanugage Goergian or English and register and log in to access the dashboard page, upon registration, a user receives a confirmation email for verification. The app also includes a reset password functionality that enables users to recover their account.Once logged in, users are taken to the dashboard page, which provides worldwide statistics as well as country-specific data that can be sorted and filtered by order or country name. 

## Table of Contents
- Prerequisites
- Tech Stack
- Getting Started
- Migration
- Development
- Database diagram 

## Prerequisites
- PHP@8.2 and up
- MYSQL@8 and up
- npm@9 and up
- composer@2 and up

## Teck stack
- Laravel@10.5 - back-end framework
- Spatie Translatable - package for translation
- Tailwind CSS
- tailwind-scrollbar - package for styling scrollbar

## Getting started
1. First you need to clone Coronatime repository from github
```bash
https://github.com/RedberryInternship/mariam-revia-coronatime.git
```
2. Next run composer install in order to install all the dependencies.
```bash
composer install
```
3. Install all the JS dependencies:
```bash
npm install
```
and also 
```bash
npm run dev
```
4. Now we need to set our env file. Go to the root of your project and execute this command.
```bash
cp .env.example .env
```

should also provide .env file all the necessary environment variables:
 
 ## MYSQL

 >DB_CONNECTION=mysql

 >DB_HOST=127.0.0.1

 >DB_PORT=3306

 >DB_DATABASE=*****

 >DB_USERNAME=*****

 >DB_PASSWORD=*****

 ## Gmail SMTP 
 >MAIL_DRIVER=smtp

 >MAIL_HOST=smtp.gmail.com

 >MAIL_PORT=465

 >MAIL_USERNAME=Enter your Gmail address

 >MAIL_PASSWORD=*****

 >MAIL_ENCRYPTION=ssl

 >MAIL_FROM_NAME=Newsletter

5. Execute following in root of your project
```bash
  php artisan key:generate
```
this generates auth key

## Migration
Then migrating database
```bash
php artisan migrate
```
## Development
Run Laravel's built-in development server by executing:
```bash
 php artisan serve
 ```
On JS you may run:
```bash
 npm run dev
  ```

 ## Database diagram 
 ![diagram](https://i.ibb.co/QnP9Sxv/draw-SQL-covidstatistics-export-2023-05-01.png)
