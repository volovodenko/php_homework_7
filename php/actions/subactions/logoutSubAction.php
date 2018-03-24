<?php
/**
 * Ф-ция выхода пользователя
 */
function logoutSubAction()
{
    session_unset(); //удаляем все данные из сессии
}