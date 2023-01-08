
# VUTTR - (Very Useful Tools to Remember) Back End Challenge





## About
This is my response to BossaBox Backend [Challenge](https://www.notion.so/Back-end-0b2c45f1a00e4a849eefe3b1d57f23c6)

## Technologies used 
<br>![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) 
![LARAVEL](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white) 
![MYSQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)

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