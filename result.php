<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $link = $_POST["link"];
            // Проверяем, что ссылка содержит datalesson.ru
            if (strpos($link, 'datalesson.ru') !== false) {
                // Извлекаем session_id из ссылки
                $parts = parse_url($link);
                parse_str($parts['query'], $query);
                $session_id = $query['session_id'];
                
                // Формируем новую ссылку
                $new_link = "https://mu.datalesson.ru/9-11/conclusions?session_id=" . $session_id;
                
                // Выводим сообщение с новой ссылкой
                echo "<p>Для получения сертификата, ознакомьтесь с выводами и нажмите на кнопку 'Получить сертификат' по ссылке:</p>";
                echo "<a href='$new_link'>$new_link</a><br>";
            } else {
                echo "<p>Это не ссылка на интерактивный урок. Пожалуйста, отправьте корректную ссылку.</p>";
            }
        }
        ?>
    </div>
</body>
</html>