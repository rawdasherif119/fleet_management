## About Fleet-Management Setup And Solution Idea

**Setup**

After Installing, take a copy for .env.example to .env and fill out the system database connection

1 -
```sh
composer install
```

2-
```sh
php artisan migrate
```

3-
```sh
php artisan key:generate
```

4-
```sh
php artisan passport:install
```


7- To have a dummy data, run the seeders:
```sh
php artisan db:seed
```


9- Register User and login api are found in the postman collection 
Or you can use this user directly without register (olso exist as example in collection)
```sh
email:rawdaTest@gmail.com 
```
```sh
password:12345678:
```

10- Postman Collection: [Postman Collection](https://documenter.getpostman.com/view/18668876/UyxqD3rK).
***

