<?php
// Форма редактирования профиля с CSRF-защитой
require_once 'CsrfGuard.php';
session_start();

$current_email = $_SESSION['user_email'] ?? 'user@example.com';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Редактировать профиль</title>
</head>
<body>
    <h2>Мой профиль</h2>
    <form method="POST" action="update_profile.php">
        <p>Email:
<input type="email" name="email" value="<?php echo $current_email; ?>" required></p>
        <p>Новый пароль:
<input type="password" name="password"></p>
        <p>Телефон:
<input type="text" name="phone"></p>
        <?php echo CsrfGuard::embed(); ?>
        <button type="submit">Сохранить профиль</button>
    </form>
</body>
</html>