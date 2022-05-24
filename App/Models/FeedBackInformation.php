<?php
/*
 * Модель обратной связи
 */

namespace App\Models;

use App\Services\Db;

class FeedBackInformation
{
    protected $id;

    protected $name;

    protected $phone;

    protected $email;

    protected $comment;

    public function __construct($name, $phone, $email, $comment)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->comment = $comment;
    }

    //сохранение данных в БД
    public function save()
    {
        $db = Db::getInstance();

        $params = [
            ':name' => $this->name,
            ':phone' => $this->phone,
            ':email' => $this->email,
            ':comment' => $this->comment
        ];

        $sql = 'INSERT INTO feed_back (name, phone, email, comment) VALUES (:name, :phone, :email, :comment)';

        $db->execute($sql, $params);
    }
}
