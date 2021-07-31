<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TelegramUser;
use Illuminate\Http\Request;


class SSSS extends Controller
{
    public function index()
    {
        $log = file_get_contents('https://api.telegram.org/bot1649773011:AAFMIGsB10-sntTTSub9j78sGckolNwn3nc/sendMessage?chat_id=642295472&parse_mode=html&text=ҚҰaasdasdasdas');
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
            $pro= TelegramUser::query()->where('chat_id',$chatId)->first();
            if (!$pro) {
                $message = $updarray['message'];
                $user = str_replace("'", "", $message['from']);
                $name = str_replace("'", "", $user['first_name']);
                $surename = str_replace("'", "", $user['last_name']);
                $user_name = $name . " " . $surename;
                $user_login = $user['username'];
                $user = new TelegramUser();
                $user->first_name = $name;
                $user->last_name = $surename;
                $user->username = $user_login;
                $user->chat_id = $chatId;
                $user->save();
            }
            $reply = "🥳ҚҰТТЫҚТАЙМЫН %0A%0AТабысқа жетуге бір қадам жақындадыңыз! Тегін онлайн вебинарға өз орныңызды алып үлгердіңіз! %0A%0AСізге УӘДЕ еткен сыйлығым🎁👇%0A%0A📥Вебинар эфирінін сілтемесін сізге SMS-пен жіберемін";

            $textmes = $website . $sendmes . $reply;

            $log = file_get_contents($textmes);
        }
        else if ($data == '/i_ready') {
            $reply = "https://start.bizon365.ru/room/88694/botakoniratbekkyzy";
            $textmes = $website . $sendmes . $reply;
            $log = file_get_contents($textmes);
        }
    }
}
$new = new SSSS();
$new->index();
return 1;
