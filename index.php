<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Bot Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <div class="container">
        <?php
        $show_form = true;
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
                echo "<p id='message' style='display: " . (($show_form) ? 'block' : 'none') . "'>Для получения сертификата, ознакомьтесь с выводами и нажмите на кнопку 'Получить сертификат' по ссылке:</p>";
                echo "<a id='newLink' href='$new_link' style='display: " . (($show_form) ? 'block' : 'none') . "'>$new_link</a><br>";
                echo "<button id='generateAnother' style='display: " . (($show_form) ? 'block' : 'none') . "; margin-top: 20px;'>Сгенерировать еще</button>";
                $show_form = false;
            } else {
                echo "<p>Это не ссылка на интерактивный урок. Пожалуйста, отправьте корректную ссылку.</p>";
            }
        }
        ?>

        <h1 style="<?php echo ($show_form) ? 'display: block;' : 'display: none;'; ?> margin-bottom: 0;">Добро пожаловать на страницу Telegram бота!</h1>
        <form method="post" style="<?php echo ($show_form) ? 'display: block;' : 'display: none;'; ?>">
            <label for="link">Введите ссылку:</label><br>
            <input type="text" id="link" name="link"><br>
            <input type="submit" value="Отправить">
        </form>
    </div>

    <script>
        // Функция для обработки клика по кнопке "Сгенерировать еще"
        document.getElementById('generateAnother').addEventListener('click', function() {
            var newLink = document.getElementById('newLink');
            var generateAnother = document.getElementById('generateAnother');
            var message = document.getElementById('message');
            var h1 = document.querySelector('h1');
            var form = document.querySelector('form');

            // Скрываем обработанную ссылку, сообщение и кнопку "Сгенерировать еще"
            newLink.style.display = 'none';
            generateAnother.style.display = 'none';
            message.style.display = 'none';

            // Показываем строку "Добро пожаловать на страницу Telegram бота!" и форму для ввода ссылки
            h1.style.display = 'block';
            form.style.display = 'block';
        });
    </script>
</body>
</html>