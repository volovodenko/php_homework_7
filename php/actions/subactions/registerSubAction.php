<?php
include_once "./php/emailValidation.php";
/**
 * Ф-ция регистрации пользователя
 */
function registerSubAction()
{
    //Если длина пароля меньше 3-х символов
    if (mb_strlen(getPOST("userPassword")) <= 3) {
        setFlash("Password length must be more then 3 chars", false);
        return;
    }

    $userEmail = dbEscape(trim(getPOST("userEmail")));  //вытягиваем email
    $userPassword = password_hash(getPOST("userPassword"), PASSWORD_DEFAULT); //вытягиваем пароль

    //Если email не прошел валидацию
    if (!emailValidation($userEmail)) {
        setFlash("Incorrect Email", false);
        return;
    }

    //Запрос из базы на наличие аналогичного email
    $query = dbQuery("SELECT email FROM users WHERE email='" . $userEmail . "'");
    $result = mysqli_fetch_array($query, MYSQLI_NUM);

    //Если email найден
    if (isset($result[0])) {
        setFlash("E-mail already exists", false);
        return;
    }

    //Регистрация пользователя. Запись в базу email, password
    $queryString = "INSERT INTO users (email, password) VALUES ('"
        . $userEmail . "', '"
        . $userPassword
        . "')";

    dbQuery("START TRANSACTION");
    $query = dbQuery($queryString);
    dbQuery("COMMIT");

    $query
        ? setFlash("Successfully registered", true)
        : setFlash("Write error", false);
}