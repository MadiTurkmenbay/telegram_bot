<?php

$dbhost = "srv-pleskdb47.ps.kz:3306";
$dbuser = "linguaco_otan";
$dbpass = "Ror_404l";
$dbname = "linguaco_otan";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->query("SET NAMES 'utf8'");


$token = '1649773011:AAFMIGsB10-sntTTSub9j78sGckolNwn3nc';
$website = "https://api.telegram.org/bot" . $token;
$content = file_get_contents("php://input");
$updarray = json_decode($content, true);;

if ($updarray['callback_query'] != 0) {
    $data = $updarray['callback_query']['data'];
    $chatId = $updarray['callback_query']['message']['chat']['id'];
    $messageid = $updarray['callback_query']['message']['message_id'];
    $callback_query_id = $updarray['callback_query']['id'];
    $first_name = $updarray['callback_query']['message']['from']['first_name'];
    $last_name = $updarray['callback_query']['message']['from']['last_name'];
    $username = $updarray['callback_query']['message']['from']['username'];
    $first_name = str_replace("'", "", $first_name);
    $last_name = str_replace("'", "", $last_name);
    $username = str_replace("'", "", $username);
} else {
    $text = $updarray['message']['text'];
    $chatId = $updarray['message']['chat']['id'];
    $messageid = $updarray['message']['message_id'];
    $first_name = $updarray['message']['from']['first_name'];
    $last_name = $updarray['message']['from']['last_name'];
    $username = $updarray['message']['from']['username'];
    $first_name = str_replace("'", "", $first_name);
    $last_name = str_replace("'", "", $last_name);
    $username = str_replace("'", "", $username);
}
$sendmes = "/sendMessage?chat_id=$chatId&parse_mode=html&text=";
$answerQuery = "/answerCallbackQuery?callback_query_id=$callback_query_id&text=Таңдау жасалды";
$sendSticer = "/sendSticker?chat_id=$chatId&sticker=";
$sendaudio = "/sendAudio?chat_id=$chatId&audio=";
$sendvideo = "/sendVideo?chat_id=$chatId&video=";
$sendphoto = "/sendPhoto?chat_id=$chatId&photo=";
$senddoc = "/sendDocument?chat_id=$chatId&document=";
$editmes = "/editMessageText?chat_id=$chatId&message_id=$messageid&parse_mode=html&text=";
if (!$chatId) {
    return 0;
}
if ($text == '/start') {
    $pro = $mysqli->query("SELECT `chat_id` FROM `telegram_users` WHERE `chat_id` = $chatId");
    $row = $pro->fetch_assoc();
    $pro = $row['chat_id'];
    if ($pro != $chatId) {
        $message = $updarray['message'];
        $user = str_replace("'", "", $message['from']);
        $name = str_replace("'", "", $user['first_name']);
        $surename = str_replace("'", "", $user['last_name']);
        $user_name = $name . " " . $surename;
        $user_login = $user['username'];
        $mysqli->query("INSERT INTO `telegram_users` (`chat_id`,`first_name`,`last_name`,`username`) VALUES ('$chatId','$name','$surename','$user_login')");
    }
    $reply = "Бәрекелді!%0A%0AСіз вебинарға тіркелдіңіз!Вебинарға 1 сағат қалғанда және 10 минут қалғанда осы жерге сілтеме жібереміз!%0A%0AУақытыңызды қазірден бастап жоспарлап қойыңыз!%0A%0A«Ойыңды өргерт, өміріңді өзгерт» бестселлер кітабының авторы, халықаралық кәсіби коуч, мыңдаған адамдардың өмірін өзгерткен Камшат Бекжігітова ханымның вебинарына жазылуыңызға 2-ақ күн қалды.%0A%0AВебинар Сізге не боладыі:%0A%0A -Өзгеріс формуласын меңгересіз;%0A- Тек өте пайдалы ақпарат және білім!%0A- Біздің вебинардағы мақсатымыз сіздің кем дегенді 10 % жақсы жаққа өзгерту!%0A%0AБұнымен әлі біткен жоқ! Вебинарға жазылғаныңыз үшін тегін бонус аласыз. Үлгеріп қалыңыз, орындар саны шектеулі. Төмендегі файлды бонус ретінде ұсынамыз";

    $textmes = $website . $sendmes . $reply;
    $textmes2 = $website . $senddoc . 'https://test.aimile.kz/ФОРМУЛА.pdf';

    $log = file_get_contents($textmes);
    $log = file_get_contents($textmes2);

    return 1;
} else if ($data == '/i_ready') {
    $reply = "https://start.bizon365.ru/room/88694/botakoniratbekkyzy";
    $textmes = $website . $sendmes . $reply;
    $log = file_get_contents($textmes);
    return 1;
}
