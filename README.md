# IP Radio Streaming for Yealink T30P

Этот проект позволяет организовать вещание интернет-радио или локальных аудиопотоков 
на телефоны **Yealink T30P** с помощью `ffmpeg` и multicast (RTP).

## 📂 Структура проекта
- `scripts/start_radio.sh` – запускает трансляцию (через ffmpeg)
- `scripts/stop_radio.sh` – останавливает трансляцию
- `web/radio.php` – PHP-скрипт управления (старт/стоп через веб-интерфейс)
- `config/t30p-provision.cfg` – конфигурация для автопровижининга телефонов Yealink

## 🚀 Использование
### 1. Запуск трансляции
```bash
./scripts/start_radio.sh <аудио_файл_или_URL>
