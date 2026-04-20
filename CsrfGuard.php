<?php
// Класс для защиты от CSRF атак
class CsrfGuard
{

    // Генерирует случайный токен. Использует random_bytes для криптостойкости.
    public static function generate()
    {
        return bin2hex(random_bytes(32));
    }

    // Вставляет скрытое поле с токеном в форму.
    public static function embed()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = self::generate();
        }
        return '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
    }

    // Проверяет токен из формы против токена в сессии.
    public static function validate($inputToken)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['csrf_token'])) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $inputToken);
    }
}
