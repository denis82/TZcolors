# Тестовое задание

## Как запустить
- Проверяем порты 80 и 3306, если заняты освобождаем.
- Должен быть установлен git 
- Должен быть установлен composer
- Должен быть установлен docker
- Должен быть установлен docker-compose

### Клонируем репо
```
git clone git@github.com:denis82/colorsTz.git
cd colorsTz/
```

### Качаем vendor
```
composer install
```

### Поднимаем контейнеры через yml
```
docker-compose up -d
php artisan migrate
```

### Накатываем миграции
```
php artisan migrate

если не сработает то так

docker-compose exec app php artisan migrate
```
Если все прошло без падений должно открыться на localhost.