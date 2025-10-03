<?php
header("Content-Type: text/xml; charset=UTF-8");

$action = $_GET['action'] ?? '';

$stations = [
    "rock"     => "http://nashe1.hostingradio.ru/rock-128.mp3",
    "jazz"     => "http://jazzfm.hostingradio.ru/jazz-128.mp3",
    "retro"    => "http://retroserver.streamr.ru:8043/retro128",
    "nashe"    => "http://nashe1.hostingradio.ru/nashe-128.mp3",
    "energy"   => "http://ic7.101.ru:8000/v1_1",
    "rusradio" => "http://ic7.101.ru:8000/v3_1",
    "europa"   => "http://ep256.hostingradio.ru:8052/europaplus256.mp3",
    "classic"  => "http://icecast.vgtrk.cdnvideo.ru/rrzonam_mp3_192kbps",
    "chanson"  => "http://chanson.hostingradio.ru:8041/chanson128.mp3"
];

$message = "Неизвестная команда";

// стопим прошлый поток
exec("pkill -f 'ffmpeg.*239.10.10.10:5004'");

if (isset($stations[$action])) {
    $url = $stations[$action];
    exec("/var/www/html/start_radio.sh " . escapeshellarg($url) . " > /dev/null 2>&1 &");
    $message = "Запущено: " . strtoupper($action);
} elseif ($action === "stop") {
    $message = "Радио остановлено";
}

echo <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<YealinkIPPhoneExecute Beep="no">
  <ExecuteItem URI="http://Адрес_Вашего_Сервера/xml/radio_menu.php"/>
</YealinkIPPhoneExecute>
XML;

