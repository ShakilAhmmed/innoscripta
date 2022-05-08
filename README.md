### Innoscripta

## Installation

```shell
   cp .env.example .env
```

#### Put Your Nginx Port and phpmyadmin port in .env and set DB_HOST as database also set DB_USERNAME and DB_PASSWORD

```dockerfile
   sudo docker-compose up -d 
   sudo docker exec -it innoscripta-application bash 
   composer install
   npm install
   php artisan key:generate
```
