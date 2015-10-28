# AppBook

## Get started

### PHP

```
brew install php[version]
```

### Composer

```
brew install composer
composer install
composer update
```

### MySQL

```
brew install myqsl
mysql.server start
mysql.server stop
```

### Server

```
php app/console server:start
php app/console server:stop
```

### Create database and create/update schema

```
php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console doctrine:schema:update
```
