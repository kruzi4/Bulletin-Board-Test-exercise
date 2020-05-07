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

    <link rel="stylesheet" href="style.css" />

    <script defer src="app.js"></script>
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

    <main>
      <h2>Войти в личный кабинет</h2>
      <form class="form-control login" action="" method="post">
        <input type="email" name="" value="" placeholder="Введите email">
        <input type="password" name="" value="" placeholder="Введите пароль">
        <button type="submit" name="button">Войти</button>
        <span>или вы можете</span>
        <a href="#">зарегестрироваться</a>
      </form>
    </main>
  </body>
</html>
