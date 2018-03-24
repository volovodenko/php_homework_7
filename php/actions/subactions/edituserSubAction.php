<?php
include_once "./php/emailValidation.php";
/**
 * Ф-ция редактирования данных пользователя
 */
function edituserSubAction()
{
    //Если длина пароля меньше 3-х символов
    if (mb_strlen(getPOST("newUserPassword")) <= 3) {
        setFlash("Password length must be more then 3 chars", false);
        return;
    }

    $oldUserEmail = dbEscape(trim(getCOOKIE("user")));
    $newUserEmail = dbEscape(trim(getPOST("newUserEmail")));
    $newUserPassword = password_hash(getPOST("newUserPassword"), PASSWORD_DEFAULT);

    //Если email не прошел валидацию
    if (!emailValidation($newUserEmail)) {
        setFlash("Incorrect Email", false);
        return;
    }

    //Проверяем если в базе уже существует $newUserEmail
    $query = dbQuery("SELECT email FROM users WHERE email='" . $newUserEmail . "'");
    $result = mysqli_fetch_array($query, MYSQLI_NUM);

    //Если есть
    if (isset($result[0])) {
        setFlash("E-mail already exists", false);
        return;
    }


    //Вытягиваем из базы email и идентификатор сесси старого пользователя
    $query = dbQuery("SELECT email, sessId FROM users WHERE email='" . $oldUserEmail . "'");
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $sessionId = $result["sessId"]; //Идентификатор сессии
    $email = $result["email"]; //email

    //Если email есть в базе
    if (isset($email)) {
        //Если файл сессии существует - удалеям
        file_exists("./session/sess_" . $sessionId) ? unlink("./session/sess_" . $sessionId) : null;
    } else {
        setFlash("User not found", false);
        return;
    }


    //Запрос на редактирование данных пользователя
    $queryString = "UPDATE users SET email='"
        . $newUserEmail
        . "', password='" . $newUserPassword
        . "' WHERE email='"
        . $oldUserEmail
        . "'";
    dbQuery("START TRANSACTION");
    $query = dbQuery($queryString);
    dbQuery("COMMIT");


    $query
        ? setFlash("Successfully updated", true)
        : setFlash("Edit error", false);
}