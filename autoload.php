<?php

//автозагрузка классов
spl_autoload_register(
    function ($class)
    {
        require __DIR__ . '/' . $class . '.php';
    }
);
