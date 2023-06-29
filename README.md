# GasFlowControlManagerWEB
## Описание
Проект GasFlowControlManagerWEB представляет собой веб-приложение, разработанное на фреймворке Laravel, предназначенное для управления газовыми потоками. Однако, разработка данного проекта в настоящее время приостановлена.

![Пример работы приложения](https://github.com/Disooloo/GasFlowControlManagerWEB/blob/main/other/2023-06-29-13-50-30.gif?raw=true)

## Используемые технологии
Проект GasFlowControlManagerWEB использует следующие технологии:

- ![Laravel](https://github.com/laravel/art/blob/3e84b0e973abcbdf9f046f4a0f6e2e5a70c6e5f3/laravel-l-slant.png) Laravel - веб-фреймворк, который облегчает разработку веб-приложений на PHP.
- ![Yarn](https://github.com/yarnpkg/assets/blob/2f3e8f9f7f4ef68558ccfb05867a129fbd7633c7/yarn-kitten-full.png) Yarn - пакетный менеджер для управления зависимостями в проекте.
- ![PHP 8](https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1280px-PHP-logo.svg.png) PHP 8 - последняя стабильная версия языка программирования PHP.
- ![MySQL](https://upload.wikimedia.org/wikipedia/en/thumb/6/62/MySQL.svg/1200px-MySQL.svg.png) MySQL - реляционная база данных, используемая для хранения данных проекта.

## Установка и запуск
Для установки и запуска проекта GasFlowControlManagerWEB, выполните следующие шаги:

1. Клонируйте репозиторий с помощью команды:
``` git clone https://github.com/Disooloo/GasFlowControlManagerWEB.git```

2. Перейдите в каталог проекта:
``` cd GasFlowControlManagerWEB```

3. Установите зависимости с помощью Yarn:
``` yarn install```

4. Создайте файл `.env` и скопируйте содержимое файла `.env.example` в него:
``` cp .env.example .env ``

5. Сгенерируйте ключ приложения:
``` php artisan key:generate ```

6. Настройте подключение к базе данных в файле `.env`.
7. Выполните миграции базы данных:
``` php artisan migrate ```

8. Запустите веб-сервер разработки:
``` php artisan serve```

После выполнения этих шагов приложение GasFlowControlManagerWEB будет доступно по адресу `http://localhost:8000`.

## Дополнительная информация
- Видео-обзор приложения доступно на YouTube по ссылке: [https://youtu.be/ZZB2wGXyKpQ](https://youtu.be/ZZB2wGXyKpQ)

## Лицензия
Проект GasFlowControlManagerWEB распространяется под лицензией MIT. Подробную информацию можно найти в файле [LICENSE](https://github.com/Disooloo/GasFlowControlManagerWEB/blob/main/LICENSE).

---

![Laravel](https://github.com/laravel/art/blob/3e84b0e973abcbdf9f046f4a0f6e2e5a70c6e5f3/laravel-l-slant.png)
![Yarn](https://github.com/yarnpkg/assets/blob/2f3e8f9f7f4ef68558ccfb05867a129fbd7633c7/yarn-kitten-full.png)
![PHP 8](https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1280px-PHP-logo.svg.png)
![MySQL](https://upload.wikimedia.org/wikipedia/en/thumb/6/62/MySQL.svg/1200px-MySQL.svg.png)
