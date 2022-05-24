<?php
/*
 * Класс работы с БД
 */

namespace App\Services;


class Db
{
    protected static $instance;

    protected \PDO $dbh;

    private function __construct()
    {
        //конфигурацию подключения берем из файла
        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];

        $this->dbh = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->dbh->exec('SET NAMES UTF8');
    }

    //создание объекта класса, используя паттерн singleton
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //запрос к БД
    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
    }
}
