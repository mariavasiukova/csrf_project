<?php
// Форма создания объявления с CSRF-защитой
require_once 'CsrfGuard.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Создать объявление</title>
</head>
<body>
    <h2>Новое объявление</h2>
    <form method="POST" action="submit_ads.php">
        <p>Заголовок:
<input type="text" name="title" required></p>
        <p>Текст:
<textarea name="content" rows="5" cols="40" required></textarea></p>
        <?php echo CsrfGuard::embed(); ?>
        <button type="submit">Опубликовать</button>
    </form>
</body>
</html>