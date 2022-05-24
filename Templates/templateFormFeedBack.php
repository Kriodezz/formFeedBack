<!-- Шаблон с формой -->
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
          user-scalable=no,
          initial-scale=1.0,
          maximum-scale=1.0,
          minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Обратная связь</title>
</head>

<body>

<div class="container">
<!-- Передаём данные post запросом  -->
    <form action="/" method="post">

        <div class="mb-3">
            <label for="name" class="form-label">Введите своё имя</label>
            <input
                    class="form-control"
                    type="text"
                    name="name"
                    id="name"
                    value="<?php echo $_POST['name'] ?? ''; ?>"
                    placeholder="Ваше имя"
            >
            <div class="form-text"><?php echo $error1 ?? ''; ?></div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Ваш номер телефона</label>
            <input
                    class="form-control"
                    type="text"
                    name="phone"
                    id="phone"
                    value="<?php echo $_POST['phone'] ?? ''; ?>"
                    placeholder="Номер указывать без +7 (10 цифр)"
            >
            <div class="form-text"><?php echo $error2 ?? ''; ?></div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Ваш e-mail</label>
            <input
                    class="form-control"
                    type="text"
                    name="email"
                    id="email"
                    value="<?php echo $_POST['email'] ?? ''; ?>"
                    placeholder="Ваш адрес электронной почты"
            >
            <div class="form-text"><?php echo $error3 ?? ''; ?></div>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Оставьте комментарий</label>
            <textarea
                    class="form-control"
                    name="comment"
                    id="comment"
                    rows="5"
                    placeholder="Дополнительная информация (не обязательно)"
            ><?php echo $_POST['comment'] ?? ''; ?></textarea><br>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-secondary">Отправить</button>
        </div>

    </form>

</div>

</body>
</html>
