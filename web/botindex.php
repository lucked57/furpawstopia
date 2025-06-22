<?php


$token = "6760292616:AAGIQ9bIC1y_eZSqL9-yquKTwP47nM-z3ig";
$link1 = "https://api.telegram.org/bot".$token;
$fulllink = "https://api.telegram.org/bot6760292616:AAGIQ9bIC1y_eZSqL9-yquKTwP47nM-z3ig";
$url = "https://api.telegram.org/bot6760292616:AAGIQ9bIC1y_eZSqL9-yquKTwP47nM-z3ig";

//https://api.telegram.org/bot6760292616:AAGIQ9bIC1y_eZSqL9-yquKTwP47nM-z3ig/setWebhook?url=https://week-api-bot.ru/web/botindex.php


require "telegrambot.php"; // подключаем telegrambot.php
$bot = new BOT(); // в переменную $bot создаем экземпляр нашего класса BOT
############################################################################
$output         = json_decode(file_get_contents('php://input'), true);  // Получим то, что передано скрипту ботом в POST-сообщении и распарсим

$chat_id        = @$output['message']['chat']['id'];                    // идентификатор чата
$user_id        = @$output['message']['from']['id'];                    // идентификатор пользователя
$username       = @$output['message']['from']['username'];              // username пользователя
$first_name     = @$output['message']['chat']['first_name'];            // имя собеседника
$last_name      = @$output['message']['chat']['last_name'];             // фамилию собеседника
$chat_time      = @$output['message']['date'];                          // дата сообщения
$message        = @$output['message']['text'];                          // Выделим сообщение собеседника (регистр по умолчанию)
$msg            = mb_strtolower(@$output['message']['text'], "utf8");   // Выделим сообщение собеседника (нижний регистр)

$callback_query = @$output["callback_query"];                           // callback запросы
$data           = $callback_query['data'];                              // callback данные для обработки inline кнопок

$message_id     = $callback_query['message']['message_id'];             // идентификатор последнего сообщения
$chat_id_in     = $callback_query['message']['chat']['id'];             // идентификатор чата
############################################################################
$message = mb_convert_case($message, MB_CASE_UPPER, "UTF-8");
$_POST = json_decode(file_get_contents('php://input'), true);
if(!empty(trim($_POST['target']))){
    if(trim($_POST['target']) == 'send_notification'){
        if(!empty(trim($_POST['id'])) && !empty(trim($_POST['message']))){
        $id = trim($_POST['id']);
        $message = trim($_POST['message']);
        $bot->sendMessage($url,$id, $message, [0]);
        echo "success";
    }
    else{
        header('HTTP/1.1 409 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'Необходимо заполнить все поля', 'code' => 1337)));
    }
    }
    
}
else{

    switch($message) { // в переменной $message содержится сообщение, которое мы отправляем боту.
    case '/START': $bot->sendMessage($url,$user_id, "Для доступа к данному разделу необходима авторизация, продолжить?", [['Да, пройти авторизацию', 'Нет']]); break;
    case 'TEST': $bot->sendMessage($url,$user_id, "Для доступа к данному разделу необходима авторизация, продолжить?", [['Да, пройти авторизацию', 'Нет']]); break;
    case 'GET_MY_ID': $bot->sendMessage($url,$user_id, "Ваш id: ".$user_id, [0]); break;

     default: $bot->sendMessage($url,$user_id, "Нет ответа", [0]);
}

}





?>