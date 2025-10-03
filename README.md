# IP Radio Streaming for Yealink T30P

Этот проект позволяет организовать вещание интернет-радио или локальных аудиопотоков 
на телефоны **Yealink T30P** с помощью `ffmpeg` и multicast (RTP).

##  Структура проекта
- `scripts/start_radio.sh` – запускает трансляцию (через ffmpeg)
- `scripts/stop_radio.sh` – останавливает трансляцию
- `web/radio.php` – PHP-скрипт управления (старт/стоп через веб-интерфейс)
- `config/t30p-provision.cfg` – конфигурация для автопровижининга телефонов Yealink

##  Использование
### 1. Запуск трансляции
```bash
./scripts/start_radio.sh <аудио_файл_или_URL>
```

Пример:
```bash
./scripts/start_radio.sh http://stream.example.com/radio.mp3
```

### 2. Остановка трансляции
```bash
./scripts/stop_radio.sh
```

### 3. Веб-интерфейс
Скопируйте `web/radio.php` на ваш веб-сервер.  
Через него можно управлять трансляцией (старт/стоп).

### 4. Настройка телефона
В `config/t30p-provision.cfg` укажите URL автопровижининга и IP/порт RTP.

## 4.1 Настройка телефона
Если не хотите использовать автонастройку
-В веб-морде выбираем " Клавиша DSS"(Dsskey)
Key(Выбираем любую) Type(XML Browser) Value(http://Адрес_Вашего_Сервера/xml/radio_menu.php) Label(Любое вам удобное название)

### Требования
- Linux (Debian/Ubuntu/CentOS)
- ffmpeg
- Web-сервер с PHP (для `radio.php`)

## Лицензия
BSD
