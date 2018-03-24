<?php
/**
 * @param string $key
 * @return mixed|null
 * Базовый конфиг
 */
function config($key = "")
{
    $config = [
        //параметры базы mysql
        "dbName" => "crud",
        "dbUser" => "root",
        "dbPassword" => "12345",
        "dbHost" => "localhost",

        //меню
        "menu" => [
            "home" => "Home",
            "tour" => "Tour",
            "product" => "Product",
            "features" => "Features",
            "enterprise" => "Enterprise",
            "support" => "Support",
            "pricing" => "Pricing",
            "crud" => "CRUD"
        ],

        //список зарегистрированных акций
        "action" => [
            "home",
            "tour",
            "product",
            "features",
            "enterprise",
            "support",
            "pricing",
            "crud",
            "login",
            "register",
            "logout",
            "deluser",
            "edituser"
        ],

    ];

    return isset($config[$key]) ? $config[$key] : Null;
}