    <main>
      <h2>Регистрация</h2>
      <form class="form-control register" action="/user/register" method="post">
        <input type="text" name="firstname" value="" placeholder="Введите имя">
        <input type="text" name="secondname" value="" placeholder="Введите фамилию">
        <input type="email" name="email" value="" placeholder="Введите email">
        <input type="password" name="pass" value="" placeholder="Введите пароль">
        <button type="submit" name="button">Готово</button>
        <span>или вы можете</span>
        <a href="/user/login">войти</a>
      </form>
    </main>
