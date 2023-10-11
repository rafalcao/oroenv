
## Orocommerce Training

### Terminal
Inside this directory, clone the repository

```bash
  git clone https://github.com/oroinc/trainings.git
```

Turn on the environment in docker

```bash
  docker-compose up -d
```

### DB
You can download <a href="doc:introduction" target="https://dbeaver.io/download/">DBeaver</a> to manage database.<br>
Using this data configuration
```
  Hostname: 127.0.0.1
  Port: 5432
  User: orocommerce
  Password: oro
  DB: oro
  
  (jdbc:postgresql://127.0.0.1:5432/oro)  
```

Run the command below on the postgres database

```bash
  CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
```

### Project Dir
Add the configuration files to the root of the "training" project

`.env-app.local`
```bash
ORO_ENV=dev
ORO_DB_URL=postgres://orocommerce:oro@postgres:5432/oro?sslmode=disable&charset=utf8&serverVersion=13.7
ORO_DB_DSN=postgres://orocommerce:oro@postgres:5432/oro?sslmode=disable&charset=utf8&serverVersion=13.7
ORO_MAILER_DSN=smtp://mailhog:1025

ORO_SEARCH_ENGINE_DSN=orm:?prefix=oro_search
ORO_WEBSITE_SEARCH_ENGINE_DSN=orm:?prefix=oro_website_search

```

`.env-app.local.php`
```php
<?php

// This file was generated by running "composer dump-env dev"

return array (
  'ORO_ENV' => 'dev',
  'ORO_SECRET' => 'ThisTokenIsNotSoSecretChangeIt',
  'ORO_DB_URL' => 'postgres://orocommerce:oro@postgres:5432/oro?sslmode=disable&charset=utf8&serverVersion=13.7',
  'ORO_DB_DSN' => 'postgres://orocommerce:oro@postgres:5432/oro?sslmode=disable&charset=utf8&serverVersion=13.7',
  'ORO_MAILER_DSN' => 'smtp://mailhog:1025',
  'ORO_SEARCH_URL' => 'orm:',
  'ORO_SEARCH_ENGINE_DSN' => 'orm:?prefix=oro_search',
  'ORO_WEBSITE_SEARCH_ENGINE_DSN' => 'orm:?prefix=oro_website_search',
  'ORO_SESSION_DSN' => 'native:',
  'ORO_WEBSOCKET_SERVER_DSN' => '',
  'ORO_WEBSOCKET_FRONTEND_DSN' => '',
  'ORO_WEBSOCKET_BACKEND_DSN' => '',
  'ORO_MQ_DSN' => 'dbal:',
  'ORO_JPEGOPTIM_BINARY' => '',
  'ORO_PNGQUANT_BINARY' => '',
  'ORO_REDIS_URL' => 'redis://redis:6379',
  'ORO_REDIS_CACHE_DSN' => 'redis://redis:6379/1',
  'ORO_REDIS_DOCTRINE_DSN' => 'redis://redis:6379/2',
  'ORO_REDIS_LAYOUT_DSN' => 'redis://redis:6379/3',
  'ORO_MAINTENANCE_LOCK_FILE_PATH' => '%kernel.project_dir%/var/cache/maintenance_lock',
);

```


### Back to terminal

Access the php container

```bash
  docker exec -it php-82 bash
```

Composer Install

```bash
  composer install -vvv
```

Oro Install

```bash
  bin/console oro:install --user-name=admin --user-email=admin@admin.com --application-url=http://127.0.0.1 --user-firstname=John  --user-lastname=Due --user-password=admin --organization-name=Oro --env=dev --sample-data=y --timeout=0
```

Check if my Trainings Bundle exists

```bash
php bin/console debug:container --parameter=kernel.bundles --format=json | grep Training
```

List the migrations to be installed

```bash
bin/console oro:migration:load --dry-run
```

Install migrations

```bash
bin/console oro:migration:load --force
```

List of fixtures

```bash
bin/console oro:migration:data:load --dry-run
```

Install fixtures

```bash
bin/console oro:migration:data:load
```

Update Entities

```bash
bin/console oro:entity-config:update
```
