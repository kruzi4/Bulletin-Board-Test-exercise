    <main>
      <div class="err"></div>
      <h2>Войти в личный кабинет</h2>
      <form class="form-control login" action="/user/login" method="post">
        <input type="email" name="email" value="" placeholder="Введите email">
        <input type="password" name="password" value="" placeholder="Введите пароль">
        <button type="submit" name="button">Войти</button>
        <span>или вы можете</span>
        <a href="/user/register">зарегистрироваться</a>
      </form>
    </main>
