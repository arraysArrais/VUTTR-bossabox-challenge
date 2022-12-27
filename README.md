
# VUTTR - (Very Useful Tools to Remember) Back End Challenge





## About
This is my response to BossaBox Backend [Challenge](https://www.notion.so/Back-end-0b2c45f1a00e4a849eefe3b1d57f23c6)

This application was developed using **PHP**, **Laravel Framework** and a **MySQL** database to persist data.

## Requirements
- PHP 8.1+
- Laravel 9+
- Composer 
- MySQL Database

## Usage
Run migrations to create all database structure needed by using the command below
```bash
 php artisan migrate
```
Then, populate database fields with factory/seeds:
```bash
 php artisan db:seed
```
Finally, run the server application
```bash
 php artisan serve
```

## API Documentation

### List all tools

```http
  GET /api/tools
```

#### Filter tools by tag

```http
  GET /api/tools?tag={tag}
```

| Query Param| Type     | Description                              |
| :----------| :--------| :----------------------------------------|
| `tag`      | `string` | **Optional**. The tag name that you want to filter|

### Create a new tool

```http
  POST /api/tools
```

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

### Update a new tool
```http
  PATCH /api/tools/{id}
```

| Route Param| Type     | Description                              |
| :----------| :--------| :----------------------------------------|
| `id`      | `number` | **Required**. The tool id that you want to update|

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


### Delete a new tool
```http
  DELETE /api/tools/{id}
```

| Route Param| Type     | Description                              |
| :----------| :--------| :----------------------------------------|
| `id`      | `number` | **Required**. The tool id that you want to delete|





## Roadmap
- [ ]  JWT Auth
- [ ]  API Blueprint/Swagger API Documentation