
# VUTTR - (Very Useful Tools to Remember) Back End Challenge





## About
This is my response to BossaBox Backend [Challenge](https://www.notion.so/Back-end-0b2c45f1a00e4a849eefe3b1d57f23c6)

This application was developed using **PHP**, **Laravel Framework** and a **MySQL** database to persist data.

## Requirements
- PHP 8.1+
- Laravel 9+
- Composer 
- MySQL Database

## Installation
```bash
# Clone the repo
$ git clone https://github.com/arraysArrais/VUTTR-bossabox-challenge.git

# Change the working directory
$ cd VUTTR-bossabox-challenge

# Update composer packages and generate autoload:
$ composer update
```

## Usage

```bash
# Use .env.example environment config
# Linux
$ mv .env.example .env
# Windows
$ ren .env.example .env

# Run migrations to create all database structure needed
$ php artisan migrate

# Populate database fields with factory/seeds
$ php artisan db:seed

# Run the server application
$ php artisan serve
```

## API Documentation

```bash
# Access the URL below in your browser to render Swagger UI and interact with the API's resources
localhost:3000/api/doc/
```
![App Screenshot](https://i.imgur.com/LfjCqZB.jpeg)


## Roadmap
- [x]  JWT Auth
- [x]  Swagger API Documentation