<?php
/**
 * @param $email
 * @return bool
 * Валидация email
 */
function emailValidation($email) {
    return preg_match("/^(([a-zA-Z0-9_\-.]+)@([a-zA-Z0-9\-]+)\.[a-zA-Z0-9\-.]+$)/", $email)
        ? true
        : false;
}