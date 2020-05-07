<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Тестовое задание - Главная</title>

    <link
      href="https://fonts.googleapis.com/css?family=Montserrat&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="/assets/style.css" />

    <script defer src="/assets/app.js"></script>
  </head>

  <body class="light">
    <!-- Navbar -->
    <nav class="navbar">
      <ul class="navbar-nav">
        <li class="nav-item"><a href="/index.php">Главная</a></li>

        <!-- Dropdown -->

        <li class="nav-item has-dropdown">
          <a href="#">Тема</a>
          <ul class="dropdown">
            <li class="dropdown-item">
              <a id="light" href="#">светлая</a>
            </li>
            <li class="dropdown-item">
              <a id="dark" href="#">тёмная</a>
            </li>
            <li class="dropdown-item">
              <a id="solar" href="#">красочно</a>
            </li>
          </ul>
        </li>

        <li class="nav-item"><a href="/login.php">Войти</a></li>
        <li class="nav-item"><a href="/register.php">Регистрация</a></li>
      </ul>
    </nav>
    <header>
      <h1>Bulletin Board</h1>

      <p>Сайт объявлений</p>
    </header>

    <container>
      <section>
        <h2>Личная информация</h2>
        <div class="settings">
          <div class="form-control form-name">
            <span>Ваше имя</span>
            <input type="text" name="" value="" placeholder="Константин">
            <button type="submit" name="button">Изменить</button>
          </div>
          <div class="form-control form-email">
            <span>Ваш email</span>
            <input type="text" name="" value="" placeholder="admin@gmail.com">
            <button type="submit" name="button">Изменить</button>
          </div>

          <div class="form-control form-pass">
            <span>Ваш пароль</span>
            <input type="password" name="" value="" placeholder="Старый пароль">
            <input type="password" name="" value="" placeholder="Новый пароль">
            <button type="submit" name="button">Изменить</button>
          </div>

        </div>
      </section>

      <section>
        <div class="add-adverb">
          <h2>Добавить объявление</h2>
          <form class="form-control" action="" method="post">
            <input type="text" name="title" value="" placeholder="Введите заголовок">
            <textarea name="name" rows="4" cols="80" placeholder="Введите текст объявления"></textarea>
            <button type="submit" name="button">Добавить</button>
          </form>
        </div>
      </section>
    </container>
  </body>
</html>
