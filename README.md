
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
$ mv .env.example .env

# Run migrations to create all database structure needed
$ php artisan migrate

# Populate database fields with factory/seeds
$ php artisan db:seed

# Run the server application
$ php artisan serve
```

## API Documentation

### Authentication
```bash
  POST /api/auth
```
| Body Params (form-data)| Type     | 
| :----------| :--------| 
| `email`      | `string` 
| `password`      | `string` 
<br/>

#### Response body example:
```bash
{
    "access-token": "8|Op9o5QmRFcXenwSbP5xefPFGpEP8c4wyLRYHX5Y9"
}
```
#### Authorization header is *required* for all APIs, usage example below:
```bash
{
    'Authorization': 'Bearer 8|Op9o5QmRFcXenwSbP5xefPFGpEP8c4wyLRYHX5Y9'
}
```
<br/>

   
## Routes

### List all tools
```bash
  GET /api/tools
```
<br/>
   
### Filter tools by tag
```bash
  GET /api/tools?tag={tag}
```

| Query Param| Type     | Description                              |
| :----------| :--------| :----------------------------------------|
| `tag`      | `string` | **Optional**. The tag name that you want to filter|
   
    
<br/>

### Create a new tool

```bash
  POST /api/tools
```
<br/>   

#### Required request headers:
```bash
{
    'Accept': 'application/json',
    'Content-Type': 'application/json'
}
```
   
#### Request body example:
```bash
{
        "title": "Tool",
        "link": "https://www.toolwebsite.com.br",
        "description": "Tool description",
        "tags": ["Tag 1", "Tag 2", "Tag 3"]
}
```
   
| Body Params| Type     | Description                              |
| :----------| :--------| :----------------------------------------|
| `title`      | `string` | **Required**. Tool title|
| `link`      | `string` | **Required**. Tool URL, must be a string containing a valid URL format|
| `description`      | `string` | **Required**. Tool description|
| `tags`      | `array(strings)` | **Required**. The tags for the tool record. All values inside the array must be strings|
   
   
<br/>

### Update tool

```bash
  PATCH /api/tools/{id}
```
  
| Route Param| Type     | Description                              |
| :----------| :--------| :----------------------------------------|
| `id`      | `number` | **Required**. The tool id that you want to update|
<br/>  
  
#### Request body example:
```bash
{
        "title": "Tool",
        "link": "https://www.toolwebsite.com.br",
        "description": "Tool description",
        "tags": ["Tag 1", "Tag 2", "Tag 3"]
}
```
| Body Params| Type     | Description                              |
| :----------| :--------| :----------------------------------------|
| `title`      | `string` | **Optional**. Tool title|
| `link`      | `string` | **Optional**. Tool URL, must be a string containing a valid URL format|
| `description`      | `string` | **Optional**. Tool description|
| `tags`      | `array(strings)` | **Optional**. The tags for the tool record. All values inside the array must be strings|
  
<br/>
  
### Delete tool
```bash
  DELETE /api/tools/{id}
```

| Route Param| Type     | Description                              |
| :----------| :--------| :----------------------------------------|
| `id`      | `number` | **Required**. The tool id that you want to delete|


<br/>


## Roadmap
- [x]  JWT Auth
- [ ]  API Blueprint/Swagger API Documentation