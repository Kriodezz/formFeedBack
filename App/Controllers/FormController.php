<?php

namespace App\Controllers;

use App\Models\FeedBackInformation;
use App\Services\Validation;
use Exception;
use App\Services\View;

class FormController
{
    //Метод, отображающий форму обратной связи
    public static function viewForm()
    {
        $view = new View(__DIR__ . '/../../Templates');
        $view->renderHtml('templateFormFeedBack.php');
    }

    //создание записи в БД
    public static function createFeedBack(array $post)
    {
        $view = new View(__DIR__ . '/../../Templates');
        try {
            //проверка данных на валидность
            $isValid = new Validation($post);
            $isValid->isValidFormFeedBack();

            //создание объекта
            $feedBack = new FeedBackInformation(
                $post['name'],
                '+7' . $post['phone'],
                $post['email'],
                htmlentities($post['comment'])
            );

            //сохранение в БД
            $feedBack->save();

            //вывод шаблона с сообщением об успешной отправке формы
            $view->renderHtml('templateFeedBackSuccess.php');

        } catch (Exception $e) {
            /*
             * в случае не валидности каких-либо данных переменной $error/Сode/ присваивается
             * значение с сообщением об ошибке и выводится в шаблон с формой
             */
            $view->renderHtml(
                'templateFormFeedBack.php',
                ['error' . $e->getCode() => $e->getMessage()],
                500
            );
        }

    }
}
