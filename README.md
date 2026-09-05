# sencha-works-app

Laravel 8 application for Sencha Works.

## Directory

```text
.
├── docker
│   ├── docker-compose.yml
│   └── php
│       ├── Dockerfile
│       └── entrypoint.sh
└── src
    └── Laravel application files
```

## Start

```bash
docker compose -f docker/docker-compose.yml up -d --build
```

Open the application:

```text
http://localhost:8000
```

## Database

Run migrations:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan migrate
```

Run seeders:

```bash
docker compose -f docker/docker-compose.yml exec app php artisan db:seed
```

## phpMyAdmin

Open phpMyAdmin:

```text
http://localhost:8080
```

Login:

```text
Server: mysql
Username: sencha
Password: secret
Database: sencha_works
```

For host-side database clients, connect to `127.0.0.1:3307`.

## Mail

Open the mail inbox:

```text
http://localhost:8025
```

## Stop

```bash
docker compose -f docker/docker-compose.yml down
```
