<?php

//подключаем файл автозагрузки классов
require_once __DIR__ . '/autoload.php';

use App\Controllers\FormController;

//если массив $_POST пуст, выводится форма обратной связи, если не пуст - создается запись в БД
if (!empty($_POST)) {
    FormController::createFeedBack($_POST);
} else {
    FormController::viewForm();
}
