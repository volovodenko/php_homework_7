<?php
/**
 * Ф-ция удаления пользователя из базы
 */
function deluserSubAction()
{
    $userEmail = dbEscape(trim(getCOOKIE("user")));

    //Вытягиваем из базы email и идентификатор сесси данного пользователя
    $query = dbQuery("SELECT email, sessId FROM users WHERE email='" . $userEmail . "'");
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

    //Запрос на удаление пользователя с базы
    $queryString = "DELETE FROM users WHERE email='" . $userEmail . "'";
    dbQuery("START TRANSACTION");
    $query = dbQuery($queryString);
    dbQuery("COMMIT");

    $query
        ? setFlash("Successfully deleted", true)
        : setFlash("Delete error", false);
}