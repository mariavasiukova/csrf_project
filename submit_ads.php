<?php
// Обработчик формы создания объявления с проверкой CSRF
require_once 'CsrfGuard.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Проверка CSRF токена
    if (!CsrfGuard::validate($_POST['csrf_token'] ?? '')) {
        http_response_code(403);
        die("Ошибка 403. Неверный CSRF токен. Объявление не создано.");
    }
    
    // Токен верный - обрабатываем данные
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    
    echo "Объявление \"$title\" успешно создано.";
    
} else {
    echo "Доступ запрещён.";
}
?>



