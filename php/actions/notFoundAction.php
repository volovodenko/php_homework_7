<?php
/**
 * Ф-ция обработки данных для страницы 404
 */
function notFoundAction()
{
    header("HTTP/1.1 404 Not Found");
    view("404", [], 'template');
}