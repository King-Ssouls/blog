# Запуск приложения

```shell
git clone https://github.com/ghostITwe/my-blog.git

cd my-blog
cp .env.example .env
```

## Изменить в env переменные
```shell
SESSION_DRIVER=database -> file
CACHE_STORE=database -> file
```

## Установить зависимости
```shell
composer install
npm install
```

## Сгенерировать ключ и запустить миграции с сервером
```shell
php artisan key:generate
php artisan migrate
php artisan serve
```