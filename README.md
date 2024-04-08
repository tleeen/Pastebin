# Pastebin

Pastebin - это веб-приложение, которое позволяет пользователям загружать, сохранять и делиться текстовыми данными. Основная цель Pastebin - предоставить простой и удобный способ для обмена кодом, заметками или любым другим текстом между пользователями. Пользователи могут создавать "пасты" (paste - вставка), которые представляют собой текстовые фрагменты, и делиться ими с другими людьми, отправляя им ссылку на эти пасты. Pastebin широко используется разработчиками, системными администраторами и другими специалистами в области ИТ для обмена кодом, журналами ошибок и другой технической информацией.

----------

# Начало работы

## Установка
Клонируйте репозиторий
```sh
  git clone https://github.com/tleeen/Pastebin.git
```
### Docker
```sh
docker-compose up --build -d
```
Необходимо зайти в контейнер app
```sh
docker-compose exec app bash
```
### Laravel
Перейдите в каталог src
```sh
  cd src
```
Установите все зависимости с помощью composer
```sh
  composer install
```
Создайте файл .env и описшите окружение по примеру .env.example.
Главное указать следующие параметры
```sh
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=123
```

Для того, чтобы работала авторизация через гугл и яндекс, необходимо указать следующие параметры в .env
```sh
'GOOGLE_CLIENT_ID'=291201051689-bn20h6vqt5mus2iv177k5ahe04ont9li.apps.googleusercontent.com
'GOOGLE_CLIENT_SECRET'=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
'GOOGLE_REDIRECT_URI'=https://localhost:8876/auth/google/callback

'YANDEX_CLIENT_ID'=28f4d7bfde5b450ebc1baa866252c12e
'YANDEX_CLIENT_SECRET'=acccf00908f243d6bc2b46110b9b58f6
'YANDEX_REDIRECT_URI'=https://localhost:8876/auth/yandex/callback
```
Сгенерируйте новый ключ приложения
```sh
  php artisan key:generate
```
Сгенерируйте новый секретный ключ аутентификации JWT
```sh
  php artisan jwt:generate
```
Запустите миграции базы данных
```sh
  php artisan migrate
```
Инициализируйте панель Администратора voyager
```sh
php artisan voyager:install
```
Наконец запустите сиды
```sh
php artisan db:seed
```
