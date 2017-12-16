# Test Project (MOVIES API)
	
## Install Instructions

/*** This is still in beta ***/
	

Copy files from Github

```git clone https://github.com/jonnyeggins/MoviesTestAPI.git```

Copy and Setup env file with your MYSQL details

``` cp .env.example .env```

Install database tables 

```php artisan migrate:install```

Install database dummy data

```php artisan db:seed```


** Default Token for API:** 	skdq90pokalsm4390weiojskm390weiosdklm29e0wioajslzk



## API Endpoints ##
#### Movies

- **`GET` /movies**
- **`GET` /movies/{id}**
- **`GET` /movies-by-genre/{genre_id}**
- **`POST` /movies**   
- **`PATCH` /movies/{id}**   
- **`DELETE` /movies/{id}**
   
### Actors 	
- **`GET` /actors**
- **`GET` /actors/{id}**
- **`GET` /actors-by-genre/{genre_id}**
- **`POST` /actors**
- **`PATCH` /actors/{id}**
- **`DELETE` /actors/{id}**

### Genres

- **`GET` /genres**
- **`GET` /genres/{id}**
- **`POST` /genres**
- **`PATCH` /genres/{id}**
- **`DELETE` /genres/{id}**


----------------------

> ## Example curl
>
> GET /api/v1/actors HTTP/1.1
>
>Host: 127.0.0.1:8000
>
>Authorization: Bearer skdq90pokalsm4390weiojskm390weiosdklm29e0wioajslzk
>
>Cache-Control: no-cache