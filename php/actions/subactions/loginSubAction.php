<?php
include_once "./php/emailValidation.php";
/**
 * Ф-ция аутентификации пользователя
 */
function loginSubAction()
{
    $userEmail = dbEscape(trim(getPOST("userEmail")));  //Извлекаем email
    $userPassword = getPOST("userPassword"); //Извлекаем пароль

    //Если email не прошел валидацию
    if (!emailValidation($userEmail)) {
        setFlash("Incorrect Email", false);
        return;
    }

    //Извлекаем хэш пароля из базы
    $query = dbQuery("SELECT password FROM users WHERE email='" . $userEmail . "'");
    $result = mysqli_fetch_array($query, MYSQLI_NUM);
    $hash = $result[0];

    if (password_verify($userPassword, $hash)) { //если пароль верный
        $_SESSION["email"] = $userEmail; //в сессию записываем email

        //В базу записываем идентификатор сессии
        $queryString = "UPDATE users SET sessId='"
            . session_id()
            . "' WHERE email='"
            . $userEmail
            . "'";
        dbQuery("START TRANSACTION");
        dbQuery($queryString);
        dbQuery("COMMIT");

    } else {
        setFlash("Wrong data", false);
        return;
    }
}