    <main>
      <h2>Регистрация</h2>
      <form class="form-control register" action="/user/register" method="post">
        <div class="error"><?=$err?></div>
        <input type="text" name="firstname" value="<?=$inputFirst?>" placeholder="Введите имя" required >
        <input type="text" name="secondname" value="<?=$inputSecond?>" placeholder="Введите фамилию" required >
        <input type="email" name="email" value="<?=$inputEmail?>" placeholder="Введите email" required >
        <div class="password">
          <input type="password" id="password-input" placeholder="Введите пароль" name="pass" value="<?=$inputPass?>" required >
          <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
        </div>
        <button type="submit" name="button">Готово</button>
        <span>или вы можете</span>
        <a href="/user/login">войти</a>
      </form>
    </main>
