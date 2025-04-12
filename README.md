# SBI Laravel 

---

## ⚙ Установка

```bash
git clone 
cd sbi-laravel
composer install
cp .env.example .env
php artisan key:generate
``` 

## ⚙ Запуск

Локальный сервер

```bash
php artisan serve
```


## ⚙ Очередь
```
php artisan queue:work
```

📦 API-эндпоинты
Категории

```
GET /api/categories

POST /api/categories

GET /api/categories/{id}

PUT /api/categories/{id}

DELETE /api/categories/{id}

```
Товары

```
GET /api/products

POST /api/products

GET /api/products/{id}

PUT /api/products/{id}

DELETE /api/products/{id}

```
Экспорт товаров

```
GET /api/products-export
```
(файл появится в storage/app/public/products_export.xlsx)

Laravel 10+

Service/Repository Pattern

API Resource

Form Request

Queue (database)

Excel Export (maatwebsite/excel)

Unit-тесты
