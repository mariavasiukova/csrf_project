<?php
// Обработчик формы обновления профиля с проверкой CSRF
require_once 'CsrfGuard.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Проверка CSRF токена
    if (!CsrfGuard::validate($_POST['csrf_token'] ?? '')) {
        http_response_code(403);
        die("Ошибка 403. Неверный CSRF токен. Профиль не обновлён.");
    }
    
    // Токен верный - обновляем данные
    $new_email = htmlspecialchars($_POST['email']);
    $new_password = $_POST['password'];
    $new_phone = htmlspecialchars($_POST['phone']);
    
    $_SESSION['user_email'] = $new_email;
    
    echo "Профиль успешно обновлён.
";
    echo "Новый email: $new_email
";
    echo "Телефон: $new_phone
";
    if (!empty($new_password)) {
        echo "Пароль изменён.
";
    }
    
} else {
    echo "Доступ запрещён.";
}
?>



