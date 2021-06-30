# Blog App

A demo project for the Intro to Laravel Short Course.

## Getting started
- Clone the project from Gitlab into your machine.
	```bash
	$ git clone <project_url>
	```
- Navigate through the root directory of the project.
	```bash
	$ cd blog-app
	```
- Download and install all required packages and dependencies.
	```bash
	$ composer update
	$ npm install
	```
- Create a copy of `.env.example` to `.env` file.
	```bash
	$ cat .env.example > .env
	```
- Create a new application key.
	```bash
	$ php artisan key:generate
	```
- Update the `.env` file of the database configuration.
	```
	DB_DATABASE=blog_app_db
	```
- Create a new `blog_app_db` in `phpMyAdmin` client  
	**NOTE:** XAMPP Control Panel must rin the `Apache` and `MySQL` modules.
- Run the database migrations.
	```bash
	$ php artisan migrate
	```
- Run the application server and build tool for the client.
	```bash
	$ npm run watch-poll
	$ php artisan serve
	```

---
Created by John Michael Culaban