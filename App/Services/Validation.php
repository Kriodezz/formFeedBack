<?php
/*
 * Класс проверки введенных пользователем данных на валидность
 */

namespace App\Services;
use Exception;

class Validation
{
    protected array $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function isValidFormFeedBack()
    {
        /*
         * Коды ошибок:
         * 1 - связанные с name
         * 2 - связанные с phone
         * 3 - связанные с e-mail
         * Используются для отображения сообщений в шаблоне формы
         */

        if (empty($this->data['name'])) {
            throw new Exception('Необходимо указать Ваше имя', 1);
        }

        if (!preg_match('/^[\sA-zА-я]+$/u', $this->data['name'])) {
            throw new Exception('Имя может состоять только из букв', 1);
        }

        if (empty($this->data['phone'])) {
            throw new Exception('Необходимо указать Ваш номер телефона', 2);
        }

        if (!preg_match('/^[0-9]{10}$/', $this->data['phone'])) {
            throw new Exception(
                'Неверный формат телефонного номера. Проверьте правильность 
                введённого номера', 2
            );
        }

        if (empty($this->data['email'])) {
            throw new Exception('Необходимо указать Ваш e-mail', 3);
        }

        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception(
                'Неверный формат e-mail. Проверьте правильность 
                введённого адреса', 3);
        }

        return true;
    }
}
