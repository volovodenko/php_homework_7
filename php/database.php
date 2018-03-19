<?php
/**
 * @return mysqli
 * Соединение с базой
 */
function dbConnect()
{
    static $connection;

    if (!$connection) {
        $connection = mysqli_connect(
            config("dbHost"),
            config("dbUser"),
            config("dbPassword"),
            config("dbName"),
            3306
        )
        or exit(mysqli_connect_error());
    }

    return $connection;
}

/**
 * @param $query
 * @return bool|mysqli_result
 * Запрос из базы
 */
function dbQuery($query)
{
    $connection = dbConnect();

    return mysqli_query($connection, $query);
}


/**
 * @param $string
 * @return string
 * Экранирование строки запроса
 */
function dbEscape($string)
{
    $connection = dbConnect();

    return mysqli_real_escape_string($connection, $string);
}